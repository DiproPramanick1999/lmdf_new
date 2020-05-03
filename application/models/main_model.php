<?php
  class Main_model extends CI_Model
  {
    function get_offer_image()
    {
      $fitness = $this->load->database('fitness',TRUE);
      $query = $fitness->get("offer"); // Can use query instead of get
      return $query;
    }

    function verify_user($userid)
    {
      $query = $this->db->query("SELECT * FROM login WHERE id=$userid");
      return $query;
    }

    function get_username($userid)
    {
      if ($userid>=100000 && $userid<=100200) {
            $query = "SELECT * FROM employee WHERE id=$userid";
      }else {
            $query = "SELECT * FROM user WHERE id=$userid";
      }
      $query = $this->db->query($query);
      return $query;
    }

    function verify_user_forgot($userid,$email)
    {
      if ($userid>=100000 && $userid<=100200) {
            $query = "SELECT * FROM employee WHERE id=$userid and email='{$email}'";
      }else {
            $query = "SELECT * FROM user WHERE id=$userid and email='{$email}'";
      }
      $query = $this->db->query($query);
      if ($query->num_rows()>0) {
        return true;
      }else {
        return false;
      }
    }

    function token_add($userid,$uid)
    {
      if ($userid>=100000 && $userid<=100200) {
            $query = "UPDATE employee set token='$uid' where id=$userid";
      }else {
            $query = "UPDATE user set token='$uid' where id=$userid";
      }
      $query = $this->db->query($query);
    }


    function update_password($userid,$password)
    {
      if ($userid>=100000 && $userid<=100200) {
            $query = "UPDATE employee set token='',password='{$password}' where id=$userid";
      }else {
            $query = "UPDATE user set token='',password='{$password}' where id=$userid";
      }
      $query = $this->db->query($query);
      $query = "UPDATE login set password='{$password}' where id=$userid";
      $query = $this->db->query($query);
    }


    function valid_reset($userid,$uid)
    {
      if ($userid>=100000 && $userid<=100200) {
            $query = "SELECT * from employee where id=$userid and token='$uid'";
      }else {
            $query = "SELECT * from user where id=$userid and token='$uid'";
      }
      $query = $this->db->query($query);
      if ($query->num_rows()>0) {
        return true;
      }else{
        return false;
      }

    }

  }

 ?>
