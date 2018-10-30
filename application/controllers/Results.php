<?php
  class Results extends CI_Controller{


    public function __construct()
  	{
  		parent::__construct();
  		if (!$this->ion_auth->logged_in() ){
  			redirect(base_url().'login', 'refresh');
  		}

  		$this->user_id = $this->session->userdata('user_id');
  		$group = $this->ion_auth->get_users_groups($this->user_id)->result();
  		$this->group_id = $group[0]->id;
  	}




    public function result_page(){
      $this->load->view('results');
    }

    public function post(){
      $attrs = array(

        // 'quiz_id' => $_POST['quiz_id'];
         'score' => $_POST['final_score'],
         'total_time' =>$_POST['total_time'],
         'average_speed' =>$_POST['average_speed'],
         'accuracy' =>$_POST['accuracy'],
         'attempts' =>$_POST['attempts'],
         'user_id' => $this->user_id,
         'category_id' =>$_POST['category_id'],
         'level_id' =>$_POST['level_id'],
         'remarks' =>$_POST['remarks'],

       );

       $this->db->insert('results', $attrs);
       redirect(base_url().'tally');
       // redirect to tally board

    }

    public function tally(){
      if (!$this->ion_auth->logged_in())
      {
        // redirect them to the login page
        redirect('auth/login', 'refresh');
      }

      else{

        // set the flash data error message if there is one


        $data = array(

          'resultsALL' => $this->result->resultsALL(),

          'result' => $this->result->results(),
          'result_mod' => $this->result->result_mods(),
          'result_dif' => $this->result->result_difs(),


        );
        $this->load->view('tally',$data);


      }
    }


    public function tally_admin(){
      if (!$this->ion_auth->logged_in())
      {
        redirect('auth/login', 'refresh');
      }
      else if (!$this->ion_auth->is_admin())
      {
        return show_error('You must be an administrator to view this page.');
      }
      else{

        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');


        $data = array(
          'result' => $this->result->results(),
          'result_mod' => $this->result->result_mods(),
          'result_dif' => $this->result->result_difs(),
          // resultsALL
          'resultsALL' => $this->result->resultsALL(),

          // 'result_teacher' => $this->result->result_teacher(),


        );
        $this->load->view('tally_admin',$data);


      }
    }






  }
