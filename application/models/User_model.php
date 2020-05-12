<?php
  class User_model extends CI_Model
  {
    function get_all_details()
    {
        $query = $this->db->query("SELECT * from user");
        return $query;
    }
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
            "tax_type" => $row->tax_type,
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

    function get_trainer_name($id)
    {
      $query = $this->db->query("SELECT name FROM employee where id={$id}");
      if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
          $name = $row->name;
        }
      }else {
        $name = "None";
      }
      return $name;
    }

    function add_new_user($user,$payment)
    {
      $this->db->insert('user',$user);
      $this->db->insert('payments',$payment);
    }

    function get_tax()
    {
      $query = $this->db->query("SELECT * from tax");
      if ($query->num_rows()>0) {
        foreach ($query->result() as $row) {
          $tax = $row;
        }
        $tax = json_decode(json_encode($tax),true);
      }else {
        $tax = array(
          'cgst' => 0,
          'sgst' => 0
        );
      }
      return $tax;
    }

    function add_due($due)
    {
      $this->db->insert('due',$due);
    }

    function get_invoice_number()
    {
      $query = $this->db->query("SELECT * from invoice_num");
      foreach ($query->result() as $row) {
        $invoice = $row->number;
      }
      $this->db->query("UPDATE invoice_num set number=number+1");
      return $invoice;
    }
    
    function get_due_details()
    {
        $query = $this->db->query("SELECT * FROM due");
        return $query;
    }

    function get_one_client($id)
    {
      $query = $this->db->query("SELECT * from user where id=$id");
      if ($query->num_rows()>0) {
        foreach ($query->result() as $row) {
          $data = $row;
        }
        $data = json_decode(json_encode($data),true);
        $query1 = $this->db->query("SELECT * from due where user_id=$id ORDER BY date desc");
        if ($query1->num_rows()>0) {
          foreach ($query1->result() as $row) {
            $data["due_amt"] = $row->due_amt;
            $data["due_date"] = $row->date;
          }
        }
        return $data;
      }else{
        return "error";
      }
    }

    function get_due_details()
    {
        $query = $this->db->query("SELECT * FROM due");
        return $query;
    }

    function update_user($details)
    {
      $this->db->where('user.id',$details["id"]);
      $this->db->update("user",$details);
      $this->db->where('payments.userid',$details["id"]);
      $this->db->where('payments.invoice',$details["invoice"]);
      $this->db->update("payments",array('expd' => $details["expd"])) ;
    }

  }
?>
