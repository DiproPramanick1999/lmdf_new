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
      // print_r($user);
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
      // echo "<br><br><br>";
      // print_r($payment);
      $this->user_model->add_new_user($user,$payment);
      $this->session->set_flashdata("new_user",'success');
      redirect(base_url()."user/edit/".$id);
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

    function view()
    {
        $this->load->helper('url');
        $this->load->model('User_model');
        $query=$this->User_model->get_all_details();
        $table = "";
        if ($query->num_rows()>0) {
          foreach ($query->result() as $row) {
            $table .= "<tr onclick='viewPlan({$row->id})'>";
            $table .= "<td>{$row->id}</td>";
            $table .= "<td>{$row->name}</td>";
            $table .= "<td>{$row->phone}</td>";
            $table .= "<td>{$row->planC}</td>";
            $table .= "<td>{$row->plans}</td>";
            $table .= "<td>{$row->status}</td>";
            $table .= "</tr>";
          }
        }
        else
        {
          $table .= "No Records Available";
        }
        $data["user_detail"] = $table;
        $this->load->view('back/users/user_view',$data);
      }

    function edit()
    {
      $this->load->model("user_model");
      $url = $this->uri->segment_array();
      $id = end($url);
      if (strtolower($id) == "edit") {
        redirect(base_url()."user/view");
      }
      $data = $this->user_model->get_one_client($id);
      if ($data == "error") {
        redirect(base_url()."user/view");
      }
      $data['nations'] = $this->user_model->getAllNations();
      $trainer = $this->user_model->get_trainers();
      $data["trainers"] = $trainer;
      // print_r($data);
      $this->load->view("back/users/edit",$data);
    }

    function email_validate_edit()
    {
      $id = $_POST['id'];
      $existing = $_POST['existing'];
      $this->load->helper('url');
      $this->load->library("form_validation");
      if ($existing == $_POST["email"]) {
        $unique = "";
      }else {
        $unique = "|is_unique[employee.email]";
      }
      $this->form_validation->set_rules("email","Email", "required|valid_email".$unique);
      if ($this->form_validation->run()) {
        echo "success";
      }else{
        echo "error";
      }
    }

    // To validate the mobile number
    function mobile_validate_edit()
    {
      $id = $_POST["id"];
      $existing = $_POST["existing"];
      $this->load->helper('url');
      $this->load->library("form_validation");
      if ($existing == $_POST["mobile"]) {
        $unique = "";
      }else {
        $unique = "|is_unique[employee.phone]";
      }
      $this->form_validation->set_rules("mobile","Mobile", "required|min_length[10]|max_length[10]".$unique);
      $var = $this->form_validation->run();
      if ($this->form_validation->run()) {
        echo "success";
      }else{
        echo "error";
      }
    }

    function update()
    {
      $details = $this->input->post();
      $this->load->model("user_model");
      $expd = $details["expd"];
      $details["trainer"] = $this->user_model->get_trainer_name($details["trainer"]);
      $this->user_model->update_user($details);
      // print_r($details);
      $this->session->set_flashdata("update","success");
      redirect(base_url()."user/edit/".$details["id"]);
    }

    function due()
    {
        $this->load->helper('url');
        $this->load->model('User_model');
        $query=$this->User_model->get_due_details();
        $table = "";
        if ($query->num_rows()>0) {
          foreach ($query->result() as $row) {
            if($row->status=="Active"){
            $table .= "<tr class='text-success'>";
            $table .= "<td>{$row->user_id}</td>";
            $table .= "<td>{$row->due_amt}</td>";
            $table .= "<td>{$row->date}</td>";
            $table .= "<td>{$row->status}</td>";
            $table .= "</tr>";
            }
            else{
            $table .= "<tr class='text-danger'>";
            $table .= "<td>{$row->user_id}</td>";
            $table .= "<td>{$row->due_amt}</td>";
            $table .= "<td>{$row->date}</td>";
            $table .= "<td>{$row->status}</td>";
            $table .= "</tr>";

            }
          }
        }
        else
        {
          $table .= "No Records Available";
        }
        $data["user_due_detail"] = $table;
        $this->load->view('back/users/user_due_view',$data);
    }


    function details()
    {
        $this->load->helper('url');
        $this->load->model('User_model');
        $userid = $this->session->userdata('userid');
        $data['user_details']=$this->User_model->get_all_user_details($userid);
        $this->load->view('back/users/user_detail_view',$data);
    }
}
 ?>
