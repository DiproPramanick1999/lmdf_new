<?php
  // This Controller is used for employee data processing.
    class Employee extends CI_Controller
    {


      // To View All Employees
      public function index()
      {
        $this->load->helper('url');
        $this->load->view('back/employee/view');
      }

      // To the add new employee page
      public function new()
      {
        $this->load->helper('url');
        $this->load->model('employee_model');
        $data["new_id"] = $this->employee_model->get_new_id();
        $this->load->view('back/employee/add',$data);
      }

      // To validate the email id
      function email_validate()
      {
        $this->load->helper('url');
        $this->load->library("form_validation");
        $this->form_validation->set_rules("email","Email", "required|valid_email|is_unique[employee.email]");
        if ($this->form_validation->run()) {
          echo "success";
        }else{
          echo "error";
        }
      }

      // To validate the mobile number
      function mobile_validate()
      {
        $this->load->helper('url');
        $this->load->library("form_validation");
        $this->form_validation->set_rules("mobile","Mobile", "required|is_unique[employee.phone]|min_length[10]|max_length[10]");
        if ($this->form_validation->run()) {
          echo "success";
        }else{
          echo "error";
        }
      }

      // To add details
      function detailCheck()
      {
        $this->load->helper('url');
        $this->load->model('employee_model');
        $this->load->library("form_validation");
        $this->form_validation->set_rules("name","Name", "trim|required");
        $this->form_validation->set_rules("dob","Date of Birth", "trim|required");
        $this->form_validation->set_rules("salary","Salary", "trim|required|numeric");
        $this->form_validation->set_rules("doj","Date of Joining", "trim|required");
        $this->form_validation->set_rules("verification","Verification", "trim|required");
        $this->form_validation->set_rules("email","Email", "required|valid_email|is_unique[employee.email]");
        $this->form_validation->set_rules("mobile","Mobile", "required|is_unique[employee.phone]|min_length[10]|max_length[10]");
        $details = array(
          'employeeid' => $this->employee_model->get_new_id(),
          'name' => $this->input->post('name'),
          'mobile' => $this->input->post('mobile'),
          'email' => $this->input->post('email'),
          'type' => $this->input->post('type'),
          'dob' => $this->input->post('dob'),
          'salary' => $this->input->post('salary'),
          'doj' => $this->input->post('doj'),
          'verification' => $this->input->post('verification'),
          'sch' => 0
        );
        if ($this->form_validation->run()) {
          $employeeid = $this->employee_model->add_new_employee($details);
          $data = json_decode(json_encode($this->employee_model->get_employee_data($employeeid)), true);
          $this->load->view('back/employee/photo',$data);
        }else{
          $this->session->set_flashdata("emp_new_msg","Please enter correct details.");
          $this->session->set_flashdata("name",$details['name']);
          $this->session->set_flashdata("mobile",$details['mobile']);
          $this->session->set_flashdata("email",$details['email']);
          $this->session->set_flashdata("etype",$details['type']);
          $this->session->set_flashdata("dob",$details['dob']);
          $this->session->set_flashdata("salary",$details['salary']);
          $this->session->set_flashdata("doj",$details['doj']);
          $this->session->set_flashdata("verification",$details['verification']);
          redirect(base_url()."employee/new");
        }
      }

      //Profile photo page
      // function dp()
      // {
      //   $this->load->helper('url');
      //   $this->load->model('employee_model');
      //   $data = json_decode(json_encode($this->employee_model->get_employee_data(100000)), true);
      //   // print_r($data);
      //   $this->load->view('back/employee/photo',$data);
      // }

      function photoUpload()
      {
        $this->load->helper('url');
        $this->load->model('employee_model');
        $img = $_POST['photo'];
        $employeeid = $_POST['employeeid'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = base64_decode($img);
        $file_location = "back_static/profile/employee/";
        $file_name = $employeeid . strtotime("now") . ".png";
        file_put_contents($file_location.$file_name, $img);
        $old_photo = $this->employee_model->update_employee_photo($employeeid,$file_name);
        if ($old_photo != "default.png") {
           unlink($file_location.$old_photo);
        }
        if ($employeeid == $this->session->userdata('userid')) {
          $this->session->set_userdata('profile_pic', $file_name);
        }
        echo "success";

      }

      // View Employees
      function getEmployees()
      {
        $this->load->helper('url');
        $search = $_POST['search'];
        $this->load->model('employee_model');
        $query = $this->employee_model->getEmployees($search);
        $table = "";
        if ($query->num_rows()>0) {
          foreach ($query->result() as $row) {
            $table .= "<tr onclick='viewEmployeeDetails({$row->id})'>";
            $table .= "<td>{$row->id}</td>";
            $table .= "<td>{$row->name}</td>";
            $table .= "<td>{$row->phone}</td>";
            $table .= "<td>{$row->type}</td>";
            $table .= "</tr>";
          }

        }else{
          $table .= "No Employees Available";
        }
        echo $table;
      }

      // View Employee Details

      function details()
      {
        $this->load->helper('url');
        $url = ($this->uri->segment_array());
        $employeeid = end($url);
        // echo $employeeid;
        echo "hello";
        $this->load->view("back/book_slot/view");
      }

    }

 ?>
