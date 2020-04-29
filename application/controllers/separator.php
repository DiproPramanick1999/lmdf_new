<?php
    class Separator extends CI_Controller
    {
        function login_validation()
        {

          // Login Form validation
          $this->load->helper('url');
          $this->load->library("form_validation");
          $this->form_validation->set_rules("userid","User ID", "required|numeric");
          $this->form_validation->set_rules("password","Password", "required");
          $this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');

          // Running the validation
          if ($this->form_validation->run()) {
              $userid = $this->input->post("userid");
              $entered_password = $this->input->post("password");
              // Getting Data from the database
              $this->load->model("main_model");
              $query = $this->main_model->verify_user($userid);
              if ($query->num_rows()>0) {
                foreach ($query->result() as $row)
                    continue;
                $password = $row->password;
                $type = $row->type;
                // Decrypting the password from database
                $this->load->library('encryption');
                $this->encryption->initialize(
                    array(
                      'cipher' => 'aes-256',
                      'mode' => 'ctr',
                    )
                );
                $password = $this->encryption->decrypt($password);
                // Comparing the input and output password
                // echo $password."<br>".$entered_password;
                if ($password == $entered_password) {
                  // To get username
                  $this->load->model("main_model");
                  $this->load->model("employee_model");
                  $query = $this->main_model->get_username($userid);
                  if ($query->num_rows()>0) {
                    foreach ($query->result() as $row)
                        continue;
                    }
                    $username = $row->name;
                    $profile_pic = $row->pic;
                  // Sessioning
                  $emp_count = $this->employee_model->get_employee_count(); // Get employee counts
                  $session_data = array(
                    'userid' =>  $userid,
                    'type' => $type,
                    'username' => $username,
                    'emp_count' => $emp_count,
                    'profile_pic' => $profile_pic
                  );
                  $this->session->set_userdata($session_data);
                  redirect(base_url()."dashboard");
                }else {
                  $this->session->set_flashdata("login_msg","Please Enter Correct Userid and Password.");
                  redirect(base_url()."home/login");
                }
              }else {
                $this->session->set_flashdata("login_msg","Please Enter Correct Userid and Password.");
                redirect(base_url()."home/login");
              }
          }else{
              $this->load->view("front/login");
          }

        }


        // LOGOUT FUNCTION
        function logout()
        {
          $this->session->sess_destroy();
          redirect(base_url());
        }
    }




 ?>
