<?php
  class User extends CI_Controller
  {
    function dp()
    {
      $this->load->helper('url');
      $this->load->model('separator_l_model');
      $id = $this->session->userdata('userid');
      $data = json_decode(json_encode($this->separator_l_model->get_user_data($id)), true);
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

    // View Add UI
    function add()
    {
      $this->load->helper('url');
      $this->load->model("user_model");
      $data['nations'] = $this->user_model->getAllNations();
      $data['id'] = $this->user_model->get_new_id();
      $trainer = $this->user_model->get_trainers();
      $plans = $this->user_model->get_all_plans();
      $plan_category = $this->user_model->get_plan_category();
      if ($plan_category->num_rows()>0) {
        $data['plan_category'] = $plan_category->result();
      }else {
        $data['plan_category'] = array("No Plan Category");
      }
      $data["trainers"] = $trainer;
      $data["plans"] = $plans;
      $this->load->view("back/users/user_add",$data);
    }
    // Add Validation
    function user_add()
    {
      echo $this->input->post("nationality");
      echo "<br>";
      echo $this->input->post("joind");
      echo "<br>";
      echo $this->input->post("discp");
    }
    // To validate the mobile number
    function mobile_validate()
    {
      $this->load->helper('url');
      $this->load->library("form_validation");
      $this->form_validation->set_rules("mobile","Mobile", "required|is_unique[user.phone]|min_length[10]|max_length[10]");
      if ($this->form_validation->run()) {
        echo "success";
      }else{
        echo "error";
      }
    }
    // To validate the email id
    function email_validate()
    {
      $this->load->helper('url');
      $this->load->library("form_validation");
      $this->form_validation->set_rules("email","Email", "required|valid_email|is_unique[user.email]");
      if ($this->form_validation->run()) {
        echo "success";
      }else{
        echo "error";
      }
    }
  }
 ?>
