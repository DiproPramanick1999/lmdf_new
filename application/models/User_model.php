<?php
  class User_model extends CI_Model
  {
    function getRegisteredUser()
    {
      $query = $this->db->query("SELECT * from user where email is not null");
      return $query;
    }
  }
?>
