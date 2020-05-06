<?php
  class User_model extends CI_Model
  {
    function getRegisteredUser()
    {
      $query = $this->db->query("SELECT * from user where email is not null");
      return $query;
    }

    function getAllNations()
    {
      $query = $this->db->get("nationality");
      return $query->result();
    }

    function get_new_id()
    {
      $query = $this->db->query("SELECT id FROM user ORDER BY id DESC LIMIT 1");
      foreach ($query->result() as $row) {
        $id = $row->id;
      }
      return $id+1;
    }

    function get_plan_category()
    {
      $query = $this->db->query("SELECT * FROM plan_category");
      return $query;
    }

    function get_plans($planC)
    {
      $query = $this->db->get_where("plan",array('category' => $planC, ));
      return $query;
    }
  }
?>
