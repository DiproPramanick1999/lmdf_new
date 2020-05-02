<?php
  /**
   *
   */
  class Abcd extends CI_Controller
  {

    function index()
    {
      $this->load->view("noti");
      // $userid = 1000;
      // $hex = dechex($userid);
      // echo $hex;
      // echo "<br>";
      // echo hexdec("186a8");
      // // echo "string";
    //   $this->load->library('encryption');
    //   $this->encryption->initialize(
    //       array(
    //         'cipher' => 'aes-256',
    //         'mode' => 'ctr',
    //       )
    //   );
    //   $pass =  $this->encryption->encrypt("Lmdf@123");
    //   echo $pass;
    // }

    // $this->load->helper('url');
    // $this->session->set_flashdata('signup',true);
    // redirect(base_url()."home/login");
    // print_r($this->session->userdata('userid'));

  }

  function test()
  {
    echo "this is test page";
  }

  function dipro()
  {
    $this->load->helper('url');
    $this->load->view('front/index');
  }

}


 ?>
