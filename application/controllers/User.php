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
      $this->load->model("user_model");
      $id = $this->user_model->get_new_id();
      $details = $this->input->post();
      $details["id"] = $id;
      $details["trainer"] = $this->user_model->get_trainer_name($details["trainer"]);
      $details["status"] = "Active";
      $details["crep"] = $this->session->userdata("username");
      $details["invoice"] = $this->user_model->get_invoice_number();
      unset($details["plan_price"]); // To remove unwanted data from post
      $tax = $this->user_model->get_tax();
      $details["cgst"] = $tax["cgst"];$details["sgst"] = $tax["sgst"];
      date_default_timezone_set('Asia/Kolkata');
      $details["regd"] = date("Y-m-d");
      if ($details["time"] == "None") {
        $details["time"] = "00:00:00";
      }
      $user = $details;
      unset($user["due"],$user["due_date"]);// To remove unwanted data from user post
      print_r($user);
      if ($details["due"]>0) {
        $due = array(
          'user_id' => $id,
          'due_amt' => $details["due"],
          'date' => $details["due_date"],
          'status' => "Active",
        );
        $this->user_model->add_due($due);
      }
      $payment = array(
        "userid" => $id,
        "planC" => $details["planC"],
        "plans" => $details["plans"],
        "joind" => $details["joind"],
        "expd" => $details["expd"],
        "discp" => $details["discp"],
        "discc" => $details["discc"],
        "regd" => $details["regd"],
        "invoice" => $details["invoice"],
        "status" => $details["status"],
        "apc" => $details["apc"],
        "cgst" => $details["cgst"],
        "sgst" => $details["sgst"],
        "crep" => $details["crep"],
        "tax_type" => $details["tax_type"],
      );
      echo "<br><br><br>";
      print_r($payment);
      $this->user_model->add_new_user($user,$payment);
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
