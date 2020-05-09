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


    function get_all_plans()
    {
      $query = $this->db->get("plan");
      $plans = array();
      if ($query->num_rows()>0) {
        foreach ($query->result() as $row) {
          $plan = array(
            // "name" => $row->name,
            "price" => $row->price,
            "years" => $row->years,
            "months" => $row->months,
          );
          if (array_key_exists($row->category, $plans)) {
            $plans[$row->category][$row->name] = $plan;
          }else {
            $plans[$row->category] = array(
              $row->name => $plan,
            );
          }
        }
      }
      return $plans;
    }



    function get_trainers()
    {
      $query = $this->db->query("SELECT id,name,sch,ftimein,stimein FROM employee where type='trainer' or type='admin'");
      $trainers = array();
      if ($query->num_rows()>0) {
        foreach ($query->result() as $row) {
          $trainers[$row->id] = array(
            "name" => $row->name,
            "sch" => $row->sch,
            "ftimein" => $row->ftimein,
            "stimein" => $row->stimein,
          );
        }
      }else {
        $trainers["-1"] = array(
          "name" => "No trainers",
          "sch" => 0
        );
      }
      return $trainers;
    }

  }
?>
