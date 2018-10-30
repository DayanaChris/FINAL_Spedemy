<?php
  class Pages extends CI_Controller{





        public function landing_page(){
          $this->load->view('pages/landing_page');
        }
        public function landing_page_content(){
          $this->load->view('pages/landing_page_content');
        }
        public function about(){
          $this->load->view('pages/about');
        }
        public function contact(){
          $this->load->view('pages/contact');
        }





  }
