<?php
  /**
   *
   */
  class Home_l extends CI_Controller
  {

    function signup() {
      $this->load->helper('url');
      $data['error_msg'] = '';
      $this->load->view('front/signup',$data);
    }

    function signup_validation()
    {

      $this->load->helper('url');
      $this->load->model('separator_l_model');
      $userid = $this->input->post('userid');
      $mobile = $this->input->post('mobile');
      if (isset($userid)) {
        $mobile_db = $this->separator_l_model->checkClient($userid);
        if (!$this->separator_l_model->validClient($userid)) {
          if ($mobile_db == $mobile) {
            $data['detail_id'] = $userid;
            $this->load->view('front/details',$data);
          }else{
            $data['error_msg'] = 'User Id and Mobile Number Not Matching.';
            $this->load->view('front/signup',$data);
          }
        }else {
          redirect(base_url());
        }

      }else{
        redirect(base_url());
      }

    }

    function detailCheck()
    {
      $this->load->helper('url');
      $this->load->model('separator_l_model');
      $url = $this->uri->segment_array();
      $userid = end($url);
      $this->load->library('encryption');
      $this->encryption->initialize(
          array(
            'cipher' => 'aes-256',
            'mode' => 'ctr',
          )
      );
      $password = $this->encryption->encrypt($this->input->post("password"));
      if (!$this->separator_l_model->validClient($userid)) {
        $detail = array(
          'userid' => $userid,
          'gender' => $this->input->post("gender"),
          'address' => $this->input->post("address"),
          'email' => $this->input->post("email"),
          'dob' => $this->input->post("dob"),
          'emerNum' => $this->input->post("emerNum"),
          'emerName' => $this->input->post("emerName"),
          'relation' => $this->input->post("relation"),
          'nationality' => $this->input->post("nationality"),
          'blood' => $this->input->post("blood"),
          'height' => $this->input->post("height"),
          'weight' => $this->input->post("weight"),
          'other' => $this->input->post("other"),
          'password' => $password,
          'pic' => 'default.png',
        );
        // print_r($detail);
        $this->separator_l_model->updateClient($detail);
        $this->session->set_flashdata('signup',true);
        redirect(base_url()."home/login");
      }else {
        redirect(base_url());
      }

    }



}


 ?>
