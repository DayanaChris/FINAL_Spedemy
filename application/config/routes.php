<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route = array(
	'default_controller' 		=> 'welcome',
	'404_override' 					=> '',
	'translate_uri_dashes' 	=> FALSE,
	'user'									=> 'auth',
	// 'quiz'									=> 'quiz',

	'login' 								=> 'auth/login',
	'register' 								=> 'auth/register',
	'auth/create_user' 								=> 'auth/create_user',

	'create_group' 								=> 'auth/create_group',


	// 'quiz'									=> 'quiz',

	'landing_page'					=> 'pages/landing_page',
	'about'									=> 'pages/about',
	'contact'								=> 'pages/contact',
	'levels/(:num)'					=> 'lessons/levels/$1',
	'sing-a-long'						=> 'lessons/sing_vid_menu',

	'results' 							=>  'results/result_page',

	'tally_admin' 							=>  'results/tally_admin',
	'tally' 							=>  'results/tally',






	'add-category' 					=> 'category/create',
	'add-level' 						=> 'level/create',
	'add-video' 						=> 'videos/create',


	'add-question' 					=> 'question/create',

	'add-question' 					=> 'quiz/create',
	'add-lesson' 						=> 'lessons/create',
	'edit-category/(:num)' 	=> 'category/edit/$1',
	'edit-video/(:num)' 	=> 'videos/edit_video/$1',

	'edit-level/(:num)' 		=> 'level/edit/$1',
	'edit_group/(:num)' 		=> 'auth/edit_group/$1',



	// 'edit-quiz/(:num)' 	 		=> 'quiz/edit/$1',

	'edit_lesson/(:num)' 			=> 'lessons/edit_lesson/$1',

	'edit_quiz/(:num)' 			=> 'quiz/edit_quiz/$1',


	'category_menu' 				=>  'lessons/category_menu',

	'lesson' 								=>  'lessons/lesson_menu',

	'lesson/(:num)'					=> 'lessons/lesson/$1',

	'group' 								=>  'auth/group',


	'videos_menu' 					=>  'videos/videos_menu',
	'videos/Lesson' 				=>  'videos/lessons_video',
	'videos/StorySeries' 		=>  'videos/storyseries',
	'videos/SingALong' 			=>  'videos/singalong',

// num = number
// any = text

	'question/(:num)/(:num)'		=> 'quiz/question/$1/$2',




	'upload' 					=> 'upload/index',


	// 'add-user/(:num)'	=> 'auth/create_user/$1',
	// 'edit-user/(:num)' 	=> 'auth/edit_user/$1',
);
