<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Question extends CI_Controller {
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
				'quiz' => $this->db->order_by('id', 'asc')->get_where('quiz')
			);
      $this->load->view('admin/quiz',$data);

		}

	}

  public function create()
	{
		$data = array(
			'is_edit' => false,
      'category' => $this->db->order_by('id', 'asc')->get_where('category'),
      'level' => $this->db->order_by('id', 'asc')->get_where('level')
		);
    $this->load->view('admin/quiz-create',$data);
	}


	public function edit($id){
		$data = array(
			'is_edit' => true,
			'quiz_details' => $this->db->get_where('quiz', array('id' => $id)),
      'quiz_image_details' => $this->db->get_where('quiz_image', array('id' => $id)),

		);
		$this->load->view('admin/quiz-create',$data);
	}


  public function post()
  {
    if(isset($_POST['check_question'])){
      if($_POST['check_question'] == 0){
          echo 'error';
      }else{
          $this->load->view('answer');

      }
    }
    if(isset($_POST['delete_question'])){
			$this->query->delete_question($_POST['delete_question']);
		}

    if(isset($_POST['question'])){
      $attr = array(
        'question' => $_POST['question'],
        'category_id' => $_POST['category_'],
        'question_image' => $_POST['question_image'],
        'background' => $_POST['background'],
        'template_num' => $_POST['template_num'],

        'level_id' => $_POST['level'],

        'user_id' => $this->user_id
      );
      $this->db->insert('quiz', $attr);
      $lastid = $this->db->insert_id();


      // default value, pag ang i click sa radio button mao to ang correct answer then ma change ang value to 1
      $count = 0;
      $answr = $_POST['answer'][0];
      foreach($_POST['imgid'] as $img){
        if($count == $answr){
          $ans = 1;
        }else{
          $ans = 0;
        }

      // INSERT TO QUIZ_IMAGE TABLE
        //if($count == )
        $attr = array(
          'quiz_id' => $lastid,
          'img_id' => $img,
          'is_correct' =>$ans
        );

        $count++;
      $this->db->insert('quiz_image', $attr);
      }

      redirect(base_url().'quiz');

    }








    // EDIT A CATEGORY
    if(isset($_POST['question_name_edit'])){
      $attr = array(
				'question' => $_POST['question_name_edit'],
				'category_id' => $_POST['category_edit'],
				'question_image' => $_POST['question_image_edit'],
				'background' => $_POST['background_edit'],
				'template_num' => $_POST['template_num'],

				'level_id' => $_POST['level_edit'],

				'user_id' => $this->user_id
			);
			$this->db->insert('quiz', $attr);
			$lastid = $this->db->insert_id();


			// default value, pag ang i click sa radio button mao to ang correct answer then ma change ang value to 1
			$count = 0;
			$answr = $_POST['answer'][0];
			foreach($_POST['imgid'] as $img){
				if($count == $answr){
					$ans = 1;
				}else{
					$ans = 0;
				}

			// INSERT TO QUIZ_IMAGE TABLE
				//if($count == )
				$attr = array(
					'quiz_id' => $lastid,
					'img_id' => $img,
					'is_correct' =>$ans
				);

				$count++;
			$this->db->insert('quiz_image', $attr);
			}
      redirect('category');
    }

  }



  public function gallery($id){
    $data = array(
      'method' => 'index',
      'id' => $id
    );
    $this->load->view('admin/media',$data);
  }

  public function img_list() {
    $data = array(
      'method' => 'img_list',
      'img_list' => $this->db->get_where('images')
    );
    $this->load->view('admin/media',$data);
  }

  public function upload() {
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
