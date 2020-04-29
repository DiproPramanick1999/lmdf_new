<?php
  class Workout extends CI_Controller
  {
    function add()
    {
      $this->load->helper('url');
      $this->load->view('back/workout/workout_add.php');
    }

    function view()
    {
      $this->load->helper('url');
      $this->load->view('back/workout/view.php');
    }

    function addlink()
    {
      $this->load->helper('url');
      $this->load->model('workout_model');
      $data = array(
        'muscle' => $this->input->post('muscle'),
        'week' => $this->input->post('week'),
        'link' => $this->input->post('embed'),
      );
      // print_r($data);
      $this->workout_model->updateLink($data);
    }

    function viewVideo()
    {
      $this->load->helper('url');
      $this->load->model('workout_model');
      $muscle = $_POST['muscle'];
      $week = $_POST['week'];
      $video = $this->workout_model->getVideo($muscle,$week);
      echo $video;
    }
  }

?>
