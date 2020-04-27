<?php
  /**
   *
   */
  class Home_l extends CI_Controller
  {

    function signup() {
      $this->load->helper('url');
      $this->load->view('front/signup');
    }

    function signup_validation()
    {
      
    }



}


 ?>
