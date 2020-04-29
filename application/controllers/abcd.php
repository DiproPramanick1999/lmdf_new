<?php
  /**
   *
   */
  class Abcd extends CI_Controller
  {

    function index()
    {
      // echo "string";
    //   $this->load->library('encryption');
    //   $this->encryption->initialize(
    //       array(
    //         'cipher' => 'aes-256',
    //         'mode' => 'ctr',
    //       )
    //   );
    //   $pass =  $this->encryption->decrypt("91cf95abc46a2405acdfd533d1ecdcc8b84dc1949bfbf58bd415c457afd57bc828c7c26e39e13cad45d9c824764bf3f0d91f795064a1d1262111214bf29bbf1fTvmtKUEpdVyx+BqY2YQe6H8iYh/aEQ==");
    //   echo $pass;
    // }

    // $this->load->helper('url');
    // $this->session->set_flashdata('signup',true);
    // redirect(base_url()."home/login");
    print_r($this->session->userdata('userid'));

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
