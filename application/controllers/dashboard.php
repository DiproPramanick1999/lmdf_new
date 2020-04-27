<?php

    class Dashboard extends CI_Controller
    {

      function index()
      {
        $this->load->helper('url');
        $this->load->view("back/dashboard.php");
      }
    }


 ?>
