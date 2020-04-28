<?php
  class User extends CI_Controller
  {
    function dp()
    {
      $this->load->helper('url');
      $this->load->model('separator_l_model');
      $data = json_decode(json_encode($this->separator_l_model->get_user_data(1000)), true);
      $this->load->view('back/users/photo',$data);
    }

    function photoUpload()
    {
      $this->load->helper('url');
      $this->load->model('separator_l_model');
      $img = $_POST['photo'];
      $userid = $_POST['userid'];
      $img = str_replace('data:image/png;base64,', '', $img);
      $img = base64_decode($img);
      $file_location = "back_static/profile/user/";
      $file_name = $userid . strtotime("now") . ".png";
      file_put_contents($file_location.$file_name, $img);
      $old_photo = $this->separator_l_model->update_user_photo($userid,$file_name);
      if ($old_photo != "default.png") {
         unlink($file_location.$old_photo);
      }
      if ($userid == $this->session->userdata('userid')) {
        $this->session->set_userdata('profile_pic', $file_name);
      }
      echo "success";
    }
  }
 ?>
