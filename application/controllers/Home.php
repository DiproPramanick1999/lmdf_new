<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Home extends CI_Controller {
    public function index()
    {
      $data = $this->pricing_content();
      $this->load->helper('url');
      $this->load->view('front/index',$data);
    }

    // Login Page UI
    function login()
    {
      $this->load->helper('url');
      $this->load->view('front/login');
    }

    // About Us Page
    function about()
    {
      $this->load->helper('url');
      $this->load->view('front/about');
    }


    // Team Page
    function team(){
      $this->load->helper('url');
      $this->load->view('front/all_trainers');
    }


    // Pricing Pages.
    function pricing_content()
    {
      $this->load->model('main_model');
      $data["offer_pic"] = $this->main_model->get_offer_image();
      return $data;
    }

    function pricing()
    {
      $data = $this->pricing_content();
      $this->load->helper('url');
      $this->load->view('front/pricing',$data);
    }


    // Contact Us Page
    function contact()
    {
      $data["sent_info"] = "";
      $this->load->helper('url');
      $this->load->view('front/contact',$data);
    }

    function contact_validation()
    {
      error_reporting(0);
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->form_validation->set_rules('first_name',"First Name","required|alpha");
      $this->form_validation->set_rules('last_name',"Last Name","required|alpha");
      $this->form_validation->set_rules('email',"Email ID","required|valid_email");
      $this->form_validation->set_rules('message',"Message","required");

      $this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');
      if ($this->form_validation->run()) {
        $first_name = $this->input->post("first_name");
        $to = "pranav1503@gmail.com";
        $last_name = $this->input->post("last_name");
        $from = $this->input->post("email");
        $message = $this->input->post("message");
        $message = "This mail is sent by"." ".$first_name." ".$last_name."\nMessage: ".$message;
        $subject = "Enquiries/Contact";
        $headers = "From:" . $from;
        if(mail($to,$subject,$message, $headers)){
            $this->session->set_flashdata('response',"Message Sent! We will contact you shortly.");
            $this->contact();
        }else{
            $this->session->set_flashdata('response',"Server Busy. Please Send Again Later.");
            $this->contact();
        }
      }else{
        $this->contact();
      }
    }



    // Trials Page
    function trials()
    {
      $this->load->helper('url');
      $this->load->view('front/trial');
    }

    function trial_validation()
    {
      error_reporting(0);
      $this->load->library('form_validation');
      $this->form_validation->set_rules("first_name","First Name","required|alpha");
      $this->form_validation->set_rules('last_name',"Last Name","required|alpha");
      $this->form_validation->set_rules('email',"Email ID","required|valid_email");
      $this->form_validation->set_rules('phone',"Phone Number","required|numeric|max_length[10]|min_length[10]");
      $this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');
      if ($this->form_validation->run()) {
        $first_name = $this->input->post("first_name");
        $last_name = $this->input->post("last_name");
        $email = $this->input->post("email");
        $phone = $this->input->post("phone");
        $category = $this->input->post("category");
        $timings = $this->input->post("timings");
        $weightTime = $this->input->post("weightTime");
        $to = "pranav1503@gmail.com";
        if($category=='Weight'){
            $message = "This mail is sent by"." ".$first_name." ".$last_name."\nI want to book a free trial for ".$category."\nI prefer the timings as ".$timings." ".$weightTime."\nPhone No.: ".$phone;
        }
        else{
            $message = "This mail is sent by"." ".$first_name." ".$last_name."\nI want to book a free trial for ".$category."\nI prefer the timings as ".$timings."\nPhone No.: ".$phone;
        }

        $subject = "Enquiries For Free Trial";
        $headers = "From:" . $email;
        if(mail($to,$subject,$message, $headers)){
            $this->session->set_flashdata('response',"Trial Is Booked Successfully.");
            $this->trials();
        }else{
            $this->session->set_flashdata('response',"Server Busy. Please Try Again Later.");
            $this->trials();
        }
      }else{
        $this->trials();
      }
    }


    // Facilities Page
    function facilities()
    {
      $this->load->helper("url");
      $this->load->view("front/facilities");
    }

    // Logout
    function logout()
    {
      $this->load->helper("url");
      $this->load->library('session');
      $this->session->sess_destroy();
      $url = base_url();
      redirect($url);
    }

    function forgot()
    {
      $this->load->helper("url");
      $this->load->view("front/forgot");
    }


    function forgotValidation()
    {
      $this->load->helper("url");
      $userid = $this->input->post("id");
      $email = $this->input->post("email");
      $this->load->model("main_model");
      $verify = $this->main_model->verify_user_forgot($userid,$email);
      if ($verify) {
        $uid = bin2hex(openssl_random_pseudo_bytes(50));
        $this->main_model->token_add($userid,$uid);
        $from = "noreply@leonmaestrodefitness.com";
        $to = $email;
        $subject = "Password Reset";
        $message = '<p>
     Please Click on the link to reset your password
     <a target="_blank" href="https://leonmaestrodefitness.com/home/reset/'.dechex($userid).'/'.$uid.'">https://leonmaestrodefitness.com/reset</a>
    </p>';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:" . $from;
        if(mail($to,$subject,$message, $headers)){
          $this->session->set_flashdata('success_msg','success');
          redirect(base_url().'home/forgot');
        }
      }else {
        $this->session->set_flashdata('error_msg','Please Enter Registered Email.');
        redirect(base_url()."home/forgot");
      }
    }

    function reset()
    {
      $url = $this->uri->segment_array();
      $data['uid'] = end($url);
      $data['id'] = hexdec(prev($url));
      $this->load->model('main_model');
      $data['valid'] = $this->main_model->valid_reset($data['id'],$data['uid']);
      $this->load->helper('url');
      $this->load->view('front/reset',$data);
    }

    function resetValidation()
    {
      $this->load->helper("url");
      $password = $this->input->post('password');
      $Cpassword = $this->input->post('Cpassword');
      $id = $this->input->post('id');
      $uid = $this->input->post('uid');
      if ($password != $Cpassword) {
        $this->session->set_flashdata('error_msg','Password do not match.');
        redirect(base_url()."home/reset/".dechex($id)."/".$uid);
      }else {
        $this->load->library('encryption');
        $this->encryption->initialize(
            array(
              'cipher' => 'aes-256',
              'mode' => 'ctr',
            )
        );
        $pass =  $this->encryption->encrypt($password);
        $this->load->model('main_model');
        $this->main_model->update_password($id,$pass);
        $this->session->set_flashdata('password','success');
        redirect(base_url()."home/login");
      }
    }

  }
?>
