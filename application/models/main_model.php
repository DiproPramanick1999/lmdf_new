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


  }

 ?>
