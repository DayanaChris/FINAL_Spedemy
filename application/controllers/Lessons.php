<?php
  class Lessons extends CI_Controller{

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



  	public function lesson_menu()
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
          'category' => $this->category->cat_user(),

    			// 'category' => $this->db->order_by('id', 'asc')->get_where('category'),
          // 'category' => $this->db->order_by('id', 'asc')->get_where('category')
          'lesson' => $this->lesson->lesson_table(),

    		);
    		$this->load->view('admin/lesson',$data);
  		}
  	}


    public function lesson_example($id,$lesson_name){

      $data= array(
        'ids' => $this->lesson->display_lesson_example_images_all($id),

        'idss' => $this->lesson->modal_lesson($id),

        'id' => $this->lesson->display_lesson_example_images($id),
        'lesson_name' => $lesson_name,
        'lesimg' => $this->lesson->display_lesson_image($id),
        'images' => $this->lesson->display_lesson_image($id),
        'example' => $this->lesson->display_lesson_example_image(),

      );

      // if($data->num_rows>)
        if($data['id']->num_rows() > 0){
          $value = $data['id']->row();

        // echo($value->id);
        // $this->load->view('answer');
        // $this->load->view('lessons/modal_lesson_example');
        $this->load->view('lessons/modal_lesson_example', $data);

        // echo $data['id'];
      }else{
        echo "-1";
      }

      }

// FOR LESSON
    public function index2()
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
          'category' => $this->db->order_by('id', 'asc')->get_where('category')
        );
        $this->load->view('admin/lesson',$data);
      }
    }


    public function submenu_alphabets(){
      $data['title'] = 'ALPHABETS';

      $this->load->view('templates/temp_lessons');
      $this->load->view('lessons/submenu_alphabets', $data);
    }



    public function submenu_actionwords(){
      $this->load->view('templates/temp_lessons');
      $this->load->view('lessons/submenu_actionwords');
    }


    public function category_menu(){

      if (!$this->ion_auth->logged_in())
  		{
  			// redirect them to the login page
        redirect('auth/login', 'refresh');
  		}

        $data = array(
          'category' => $this->category->cat(),

          'cat' => $this->db->get_where('category'),
          'category' => $this->category->cat_user(),
          'categoryAll' => $this->category->cat_all(),


          'cat' => $this->db->get_where('category'),


        );
        $this->load->view('category_menu', $data);


    }

    public function category($id){
      $data = array(
        'id' => $id,
        'cat' => $this->category->cat_title($id)

      );
      $this->load->view('templates/temp_lessons');
      $this->load->view('lessons/submenu_numbers', $data );
    }

    public function lesson($id){

        if (!$this->ion_auth->logged_in())
        {
          // redirect them to the login page
          redirect('auth/login', 'refresh');
        }
        if ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
       {
           $data = array(
             'id' => $id,
             // 'template_num' => $this->query->get_template(),
             'lesimgS' => $this->lesson->display_lesson_image_admin_SAMPLE( $id),
             'imagesS' => $this->lesson->display_lesson_image_admin_SAMPLE($id),
             'lesimg' => $this->lesson->display_lesson_image( $id),
             'images' => $this->lesson->display_lesson_image($id),
             'example' => $this->lesson->display_lesson_example_image(),

           );
           $this->load->view('templates/temp_alphabets');
           $this->load->view('lessons/lesson_alphabets',$data);
           // $this->load->view('lessons/modal_lesson_example');

       }
        else {
          $data = array(
            'id' => $id,
            // 'template_num' => $this->query->get_template(),
            'lesimgS' => $this->lesson->display_lesson_image_admin_SAMPLE( $id),
            'imagesS' => $this->lesson->display_lesson_image_admin_SAMPLE($id),
            'lesimg' => $this->lesson->display_lesson_image( $id),
            'images' => $this->lesson->display_lesson_image($id),
            'example' => $this->lesson->display_lesson_example_image(),
          );
          $this->load->view('templates/temp_alphabets');
          $this->load->view('lessons/lesson_alphabets',$data);
          // $this->load->view('lessons/modal_lesson_example');

        }
      }

      // lesson routes
          // public function lesson_alphabets(){
          //         if (!$this->ion_auth->logged_in())
          //     		{
          //     			// redirect them to the login page
          //           redirect('auth/login', 'refresh');
          //     		}
          //         else {
          //           $data = array(
          //             'template_num' => $this->query->get_template(),
          //             'lesimg' => $this->lesson->lessons_display($cat),
          //             'question_image' => $this->lesson->lessons_display($cat),
          //
          //           );
          //           $this->load->view('templates/temp_alphabets');
          //           $this->load->view('lessons/lesson_alphabets',$data);
          //         }
          // }


    public function levels($id){
      $data = array(
        'id' => $id,
        'level' => $this->db->get_where('level'),
        'category_id' => $id,
      );
      $this->load->view('templates/temp_lessons');
      $this->load->view('levels',$data);
    }

    public function sing_vid_menu(){
      $this->load->view('sing_vid_menu');
    }
    public function aasample(){
      $this->load->view('lessons/aasample');
    }


    public function submenu_colors(){
      $this->load->view('templates/temp_lessons');
      $this->load->view('lessons/submenu_colors');
    }

    public function submenu_expressions(){
      $this->load->view('templates/temp_lessons');
      $this->load->view('lessons/submenu_expressions');
    }

    public function submenu_shapes(){
      $this->load->view('templates/temp_lessons');
      $this->load->view('lessons/submenu_shapes');
    }



        public function lesson_vowels(){
          $this->load->view('templates/temp_alphabets');

          $this->load->view('lessons/lesson_vowels');
        }

        public function lesson_actionwords(){
          $this->load->view('templates/temp_alphabets');
          $this->load->view('lessons/lesson_actionwords');
        }
                  public function action_words(){
                    $this->load->view('templates/temp_alphabets');
                    $this->load->view('lessons/action_words');
                  }

        public function lesson_colors(){
          $this->load->view('lessons/lesson_colors');
        }

        public function lesson_expressions(){
          $this->load->view('templates/temp_alphabets');
          $this->load->view('lessons/lesson_expressions');
        }
              public function expression_happy(){ $this->load->view('templates/temp_alphabets'); $this->load->view('lessons/expression_happy'); }


        // public function lesson_numbers(){
        //   $this->load->view('templates/temp_alphabets');
        //   $this->load->view('lessons/lesson_numbers');
        // }
              public function numbers(){ $this->load->view('templates/temp_alphabets'); $this->load->view('lessons/numbers'); }


        public function lesson_shapes(){
          $this->load->view('lessons/lesson_shapes');
        }


    // CRUD

    public function create()
  	{
  		$data = array(
  			// 'category' => $this->db->order_by('id', 'asc')->get_where('category')diri
        'category' => $this->category->cat(),

  		);
  		$this->load->view('admin/lesson-create',$data);
  	}


    public function post()
  	{
          if(isset($_POST['delete_lesson'])){
            $this->lesson->delete_lesson($_POST['delete_lesson']);
          }
      		if(isset($_POST['cat_id'])){
              $attr = array(
                'user_id' => $this->user_id,
        				'cat_id' => $_POST['cat_id'],
              );
        			$this->db->insert('lesson', $attr);
        			$lastid = $this->db->insert_id();

        			foreach($_POST['imgid'] as $img){
        				$attr = array(
        					'lesson_id' => $lastid,
        					'img_id' => $img,
        					'lesson_name' => $_POST['lesson_name'],
                  'user_id' => $this->user_id,
                  'cat_id' => $_POST['cat_id'],
        				);
                $this->db->insert('lesson_image', $attr);
                $lastid_lesson = $this->db->insert_id();
              }


              $imgEx= $_POST['imgidEx'];
              $lessonEx= $_POST['lessonEx'];
              // INSERT TO LESSON EXAMPLE
              foreach($imgEx as $index=> $imgE){
                $attr_ex = array(
                  'lesson_id' => $lastid,
                  'img_id' => $imgE,
                  'lesson_example_name' => $lessonEx[$index],
                );
                $this->db->insert('lesson_example', $attr_ex);
                $lastid_lesson_ex = $this->db->insert_id();
                }
              $attrs = array(
                 'lesson_image_id' =>$lastid_lesson,
                 'lesson_example_id' =>$lastid_lesson_ex,
                 'user_id' => $this->user_id
               );
               $this->db->insert('lesson_manager', $attrs);
        			redirect(base_url().'lesson');
  		      }
  	}


    public function edit_lesson($id)
  	{
      $data = array(
        'id' => $id,
        'category' => $this->category->cat(),

        // 'category' => $this->db->order_by('id', 'asc')->get_where('category'),
        'categ_id_val' => $this->lesson->lesson_categ($id),
        'lesson' => $this->lesson->lesson_by_id($id),
        'lesson_examples' => $this->lesson->lesson_examples_by_id($id)
    		);


  		$this->load->view('auth/edit_lesson',$data);



  	}

    public function update(){

              if(isset($_POST['delete_lesson'])){
                $this->lesson->delete_lesson($_POST['delete_lesson']);
              }


              if(isset($_POST['cat_id'])){


                  $attr = array(
                    'cat_id' => $_POST['cat_id'],
                  );
                  $this->db->update('lesson', $attr, array('id' => $_POST['id']));
                  $lastid =$this->db->affected_rows();
                  foreach($_POST['imgid'] as $img){
                    $attr = array(
                      'img_id' => $img,
                      'lesson_name' => $_POST['lesson_name'],
                      'cat_id' => $_POST['cat_id'],
                    );
                    $this->db->update('lesson_image', $attr, array('id' => $_POST['id']));
                  }
                  $imgEx= $_POST['imgidEx'];
                  $lessonEx= $_POST['lessonEx'];
                  $lesson_example_id = $_POST['lesson_example_id'];

                  // print_r($_POST['id']);
                  // exit();

                  foreach($imgEx as $index=> $imgE){
                    $attr_ex = array(
                      'img_id' => $imgE,
                      'lesson_example_name' => $lessonEx[$index],
                    );
                    // print_r($attr_ex);
                    // exit();
                    $this->db->update('lesson_example', $attr_ex, array('id' => $lesson_example_id[$index]));

                    }

                  redirect(base_url().'lesson');
                }
    }






    public function gallery($id){
      $data = array(
        'method' => 'index',
        'id' => $id
      );
      $this->load->view('admin/media',$data);
    }


    public function img_list_search($search_image)
  	{


  		$data = array(
  			// 'method' => 'img_list_search',
  			'img_list_search' => $this->query->search_img($search_image)

  		);
  		 // print_r($data);
  		 // exit();
  		// redirect('admin/media',$data, 'refresh');

  		$this->load->view('admin/media_search',$data);
  	}


    public function img_list()
  	{
  			$data = array(
  				'method' => 'img_list',
  				'img_list' => $this->db->order_by('id', 'desc')->get_where('images')
  			);
  			$this->load->view('admin/media',$data);
  	}




    public function upload()
    {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        @set_time_limit(5 * 60);

        $path_parts = pathinfo($_FILES["file"]["name"]);
        $extension = $path_parts['extension'];
        $location = 'files';
          if($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png' || $extension == 'gif'){
            $location = 'images';
          }else if($extension == 'mp4'){
                $location = 'videos';
              }


        $targetDir = 'assets/uploads';
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds
        if (!file_exists($targetDir)) {
          @mkdir($targetDir);
        }

        $fileName = date('djNBis').'.'.$extension;
        $original_filename = $_FILES["file"]["name"];
        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $save = '';
        $origname = '';
        // Remove old temp files
        if ($cleanupTargetDir) {
          if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
          }
          while (($file = readdir($dir)) !== false) {
            $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
            if ($tmpfilePath == "{$filePath}.part") {
              continue;
            }
            if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
              @unlink($tmpfilePath);
            }
          }
          $save = $fileName;
          $origname = $original_filename;

          $attribute = array(
            'user_id' => $this->user_id,
            'img_name' => $fileName,
            'original_name' => $original_filename,
          );
          $this->db->insert('images',$attribute);


      // video attributes
          $attributes = array(
            'user_id' => $this->user_id,
            'vid_name' => $fileName,
            'original_name' => $original_filename,
          );
          $this->db->insert('videos',$attributes);
          sleep(1);

          closedir($dir);
        }
        if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
          die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }
        if (!empty($_FILES)) {
          if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
          }
          if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
          }
        } else {
          if (!$in = @fopen("php://input", "rb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
          }
        }
        while ($buff = fread($in, 4096)) {
          fwrite($out, $buff);
        }
        @fclose($out);
        @fclose($in);
        // Check if file has been uploaded
        if (!$chunks || $chunk == $chunks - 1) {
          rename("{$filePath}.part", $filePath);
        }
        if($jobid != NULL){
          $attay = array(
            'rename_file_name' => $save,
            'orig_file_name' => $origname,
          );
        }else{
          $attay = array(
            'rename_file_name' => $save.',',
            'orig_file_name' => $origname.'-_-',
          );
        }
        die(json_encode($attay));
    }


  }
