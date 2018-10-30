<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Quiz extends CI_Controller {
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
				'quiz' => $this->query->quiz_cat()
			);
			$this->load->view('admin/quiz',$data);


		}
	}

	// // quiz templates
	// public function mod1_quiz(){
	// 	$this->load->view('quiz/mod1_quiz');
	// }


	public function question($category_id, $level_id)
	{
		$temp1= $this->query->questioner($level_id,$category_id);
		// $temp1=1;

		// $tempp = $this->query->get_template();

		$data = array(
			'level_id' => $level_id,
			// 'id' =>$level_id,$category_id,
			'template_num' => $this->query->get_template(),
			'question' => $this->query->questioner($level_id,$category_id),
			'question_image' => $this->query->questioner($level_id,$category_id),
			'category_id' => $category_id,
		);

		$this->load->view('templates/temp_lessons');
		$this->load->view('question',$data);



	}




	public function create()
	{
		$data = array(
			// 'category' => $this->db->order_by('id', 'asc')->get_where('category'),
			'category' => $this->category->cat(),

			'level' => $this->db->order_by('id', 'asc')->get_where('level')
		);
		$this->load->view('admin/quiz-create',$data);
	}


	public function post()
	{
		// IF THE ANSWER IS CORRECT IT WILL DISPLAY THE MODAL
		if(isset($_POST['check_question'])){
			if($_POST['check_question'] == 0){
					echo 'error';
			}else{
					$this->load->view('answer');

			}
		}
		// END check_question

		if(isset($_POST['delete_question'])){
			$this->query->delete_question($_POST['delete_question']);
		}


		if(isset($_POST['question'])){
			$attr = array(
				'question' => $_POST['question'],
				'category_id' => $_POST['category_id'],
				'question_image' => $_POST['question_image'],
				'background' => $_POST['background'],
				'template_num' => $_POST['template_num'],

				'level_id' => $_POST['level_id'],

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

			// // FOR QUIZ_ANSWER

		 // $attr = array(
			// 	'quiz_id' => $lastid,
			// 	'answer' => $_POST['answer'][0],
			// );
			// $this->db->insert('quiz_answer', $attr);
			redirect(base_url().'quiz');

		}
	}


	// public function edit_quiz($id)
	// {
	//
	// 		$data = array(
	// 			'id' => $id,
	//
	// 		);
	//
	// 		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
	// 			{
	// 				redirect('auth', 'refresh');
	// 			}
	// 			if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
	// 			{
	// 				redirect('auth', 'refresh');
	// 		}
	// 		//
	// 		// $quiz = $this->query->quiz_edit($id)->row();
	//
	//
	// 			// $this->db->insert('quiz', $attr);
	// 			// $lastid = $this->db->insert_id();
	//
	// 					// $this->db->where('id', $this->input->quiz_edit('id'));
	// 					// return $this->db->update('quiz', $data);
	// 					// $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'edit_quiz',$attr);
	//
	//
	// 					//
	// 					// $data = array(
	// 					// 	'question' => $_POST['question'],
	// 					// 	'category_id' => $_POST['category_id'],
	// 					// 	'question_image' => $_POST['question_image'],
	// 					// 	'background' => $_POST['background'],
	// 					// 	'template_num' => $_POST['template_num'],
	// 					//
	// 					// 	'level_id' => $_POST['level_id'],
	// 					// 	'user_id' => $this->user_id
	// 					// );
	//
	// 					$data = array(
	// 		        'id' => $id,
	// 		        // 'lesson' =
	// 		        'less' => $this->lesson->lessons($id),
	// 		        'l' => $this->lesson->lesson_names($id),
	// 		        'category' => $this->db->order_by('id', 'asc')->get_where('category'),
	// 		        'categ_id_val' => $this->lesson->lesson_categ($id),
	// 		        'lesson' => $this->lesson->lesson_by_id($id),
	// 		        'lesson_examples' => $this->lesson->lesson_examples_by_id($id)
	//
	//
	// 		        // 'lesson'= $id,
	// 		        // 'lesson' =>  $this->db->get_where('lesson', $id),
	// 		        // 'id' => $this->lesson->lesson($id),
	//
	// 		    			// 'category' => $this->db->order_by('id', 'asc')->get_where('category')
	// 		    		);
	//
	// 					$this->load->view('auth/edit_quiz',$data);
	//
	//
	// }

	public function edit_quiz($id)
	{
		$data = array(
			'id' => $id,
			'category' => $this->category->cat(),

			// 'category' => $this->db->order_by('id', 'asc')->get_where('category'),
			'categ_id_val' => $this->query->quiz_categ($id),
			'level' => $this->db->order_by('id', 'asc')->get_where('level'),

			'level_id_val' => $this->query->quiz_level($id),

			'quiz' => $this->query->quiz_by_id($id),
			'quiz_choices' => $this->query->quiz_choices_by_id($id)
			);
		$this->load->view('auth/edit_quiz',$data);



	}

	public function update()
	{

		if(isset($_POST['check_question'])){
			if($_POST['check_question'] == 0){
					echo 'error';
			}else{
					$this->load->view('answer');

			}
		}
		// END check_question

		if(isset($_POST['delete_question'])){
			$this->query->delete_question($_POST['delete_question']);
		}


		if(isset($_POST['question'])){
			$attr = array(
				'question' => $_POST['question'],
				'category_id' => $_POST['category_id'],
				'question_image' => $_POST['question_image'],
				'background' => $_POST['background'],
				'template_num' => $_POST['template_num'],

				'level_id' => $_POST['level_id'],

				'user_id' => $this->user_id
			);
			$this->db->update('quiz', $attr, array('id' => $_POST['id']));

			// $this->db->insert('quiz', $attr);
			// $lastid = $this->db->insert_id();


			$quiz_id = $_POST['quiz_image_id'];
			$img= $_POST['imgid'];

			foreach($img as $index=> $img){

			// foreach($_POST['imgid'] as $img){

				$attr = array(
					'img_id' => $img,
					// 'is_correct' =>$ans
				);

				$this->db->update('quiz_image', $attr, array('id' =>$quiz_id[$index]));

			// $this->db->insert('quiz_image', $attr);
			}

			// // FOR QUIZ_ANSWER

		 // $attr = array(
			// 	'quiz_id' => $lastid,
			// 	'answer' => $_POST['answer'][0],
			// );
			// $this->db->insert('quiz_answer', $attr);
			redirect(base_url().'quiz');

		}


	}









// from post function,
	public function c_answer()
	{

			// IF THE ANSWER IS CORRECT IT WILL DISPLAY THE MODAL
			if(isset($_POST['check_question'])){
				if($_POST['check_question'] == 0){
						// echo 'error';
				}else{
						$this->load->view('answer');

				}
			}
	}


	public function gallery($id)
	{
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

	public function img_list_search_edit($search_image)
	{


			$data = array(
				// 'method' => 'img_list_search',
				'img_list_search' => $this->query->search_img($search_image)

			);
			 // print_r($data);
			 // exit();
			// redirect('admin/media',$data, 'refresh');

			$this->load->view('admin/media_search_edit',$data);
	}

	// EDIT
		public function img_list_edit()
		{
				$data = array(
					'method' => 'img_list',
					'img_list' => $this->db->order_by('id', 'desc')->get_where('images')
				);
				$this->load->view('admin/media_edit',$data);
		}
	//

	// EDIT
		public function gallery_edit($id)
		{
			$data = array(
				'method' => 'index',
				'id' => $id
			);

			$this->load->view('admin/media_edit',$data);

		}
		//



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
		}else if($extension == 'mp4' || $extension == 'mkv' || $extension == 'mov' || $extension == '3gp'|| $extension == 'flv' || $extension == 'm4v'){
					$location = 'videos';
				}
				else if($extension == 'mp3' || $extension == 'wav' || $extension == 'wma' || $extension == 'vgm'|| $extension == 'pls' || $extension == 'm3u'){
						$location = 'audio';

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

			if($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png' || $extension == 'gif'){
				$attribute = array(
					'user_id' => $this->user_id,
					'img_name' => $fileName,
					'original_name' => $original_filename,
				);
				$this->db->insert('images',$attribute);

			}else if($extension == 'mp4' || $extension == 'mkv' || $extension == 'mov' || $extension == '3gp'|| $extension == 'flv' || $extension == 'm4v'){
				// video attributes
							$attributes = array(
								'user_id' => $this->user_id,
								'vid_name' => $fileName,
								'original_name' => $original_filename,
							);
							$this->db->insert('videos',$attributes);
					}else if($extension == 'mp3' || $extension == 'wav' || $extension == 'wma' || $extension == 'vgm'|| $extension == 'pls' || $extension == 'm3u'){
						// video attributes

									$attributes = array(
										'user_id' => $this->user_id,
										'audio_name' => $fileName,
										'original_name' => $original_filename,
									);
									$this->db->insert('audio',$attributes);
							}



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


	// public function videoupld()
  //   {
  //      $this->load->helper('string');
  //      $config['upload_path'] = 'assets/uploads_videos'; # check path is correct
  //      $config['max_size'] = '1000000000000000';  #102400000
  //      $config['allowed_types'] = 'mp4'; # add video extenstion on here
  //      $config['overwrite'] = FALSE;
  //      $config['remove_spaces'] = TRUE;
  //      $video_name =$_FILES['video_image']['name'];
  //      $config['file_name'] = $video_name;
  //      $this->load->library('upload', $config);
  //      $this->upload->initialize($config);
  //      if ( ! $this->upload->do_upload('video_image'))
  //      {
  //           echo 'fail';
  //           return;
  //           //redirect('Admin/video_upload');
  //       }
  //       else
  //       {
  //           $data = array('upload_data' => $this->upload->data());
  //           $this->load->view('upload_success', $data);
  //           $url = 'assets/uploads_videos'.$video_name;
  //           $this->Admin_model->videoupld($url);
  //           redirect('admin/upload');
  //       }
  //   }


}
