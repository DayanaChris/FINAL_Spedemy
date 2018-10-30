<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {
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

	public function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else{

			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');



			$data = array(
				'video' => $this->video->videos(),
        'category' => $this->video->video_cat(),

			);
			$this->load->view('admin/videos',$data);


		}




	}

	public function create()
	{
		$data = array(
			// 'is_edit' => false
      'video' => $this->video->videos(),
      'category' => $this->video->video_cat(),


		);
		$this->load->view('admin/video-create',$data);
	}

  public function post()
  {
        if(isset($_POST['delete_video'])){
          $this->video->delete_video($_POST['delete_video']);
        }
        if(isset($_POST['video_name'])){
            $attr = array(
              'user_id' => $this->user_id,
              'video_name' => $_POST['video_name'],
              'video_link' => $_POST['video_link'],
              'video_category_id' => $_POST['video_category_id'],
            );
            $this->db->insert('video', $attr);
            redirect(base_url().'videos');
          }
  }

  public function edit_video($id)
  {
    $data = array(
      'id' => $id,
      'category' => $this->video->video_cat(),
      'categ_id_val' => $this->video->lesson_categ($id),
      'video' => $this->video->videos_by_id($id),
      );


    $this->load->view('auth/edit_video',$data);



  }

  public function update(){

    if(isset($_POST['delete_video'])){
      $this->video->delete_video($_POST['delete_video']);
    }
    if(isset($_POST['video_name'])){
        $attr = array(
          // 'user_id' => $this->user_id,
          'video_name' => $_POST['video_name'],
          'video_link' => $_POST['video_link'],
          'video_category_id' => $_POST['video_category_id'],
        );
        // $this->db->insert('video', $attr);
        $this->db->update('video', $attr, array('id' => $_POST['id']));

        redirect(base_url().'videos');
      }


  }
  // 
  // public function video_menu(){
  //
  //   if (!$this->ion_auth->logged_in())
  //   {
  //     // redirect them to the login page
  //     redirect('auth/login', 'refresh');
  //   }
  //
  //     $data = array(
  //       'category' => $this->category->cat_user(),
  //
  //       'cat' => $this->db->get_where('category'),
  //
  //     );
  //     $this->load->view('lessons_video', $data);
  //
  // }


  public function videos_menu(){
    if (!$this->ion_auth->logged_in())
    {
      // redirect them to the login page
      redirect('auth/login', 'refresh');
    }


    $this->load->view('videos/videos_menu' );
  }


  public function lessons_video(){
    $data = array(
      'vid_lesson' => $this->video->vid_user(),

      // 'cat' => $this->db->get_where('category'),

    );
    $this->load->view('videos/lessons_video' , $data);
  }
  public function storyseries(){
    $data = array(
      'vid_lesson' => $this->video->vid_user_SING(),

      // 'cat' => $this->db->get_where('category'),

    );
    $this->load->view('videos/storyseries' , $data);
  }
  public function singalong(){
    $data = array(
      'vid_lesson' => $this->video->vid_user_STORY(),

      // 'cat' => $this->db->get_where('category'),

    );
    $this->load->view('videos/singalong' , $data);
  }


}
