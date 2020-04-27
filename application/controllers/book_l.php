<?php
  /**
   *
   */
  class Book_l extends CI_Controller
  {

    function index()
    {
      $this->load->helper("url");
      $this->load->view("back/book");
    }

    function validations() {
      // Code here for the validation of the form created.
    }



}


 ?>
