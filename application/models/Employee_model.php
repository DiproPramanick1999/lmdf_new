<?php
  class Employee_model extends CI_Model
  {
    // Employee Count For Dashboard
    function get_employee_count()
    {
      $query = $this->db->query("SELECT id FROM employee");
      return $query->num_rows();
    }

    // Employee ID for new employee
    public function get_new_id()
    {
      $query = $this->db->query("SELECT id FROM employee ORDER BY id DESC LIMIT 1");
      foreach ($query->result() as $row) {
        $id = $row->id;
      }
      return $id+1;
    }

    // Adding New Employee
    function add_new_employee($details)
    {
      $id = $this->get_new_id();
      $this->load->library('encryption');
      $this->encryption->initialize(
          array(
            'cipher' => 'aes-256',
            'mode' => 'ctr',
          )
      );
      $name = $details['name'];
      $mobile = $details['mobile'];
      $email =  $details['email'];
      $type = $details['type'];
      $dob = $details['dob'];
      $salary = $details['salary'];
      $doj = $details['doj'];
      $verification = $details['verification'];
      $sch = $details['sch'];
      $ftimein = $details['ftimein'];
      $ftimeout = $details['ftimeout'];
      $stimein = $details['stimein'];
      $stimeout = $details['stimeout'];
      $password = $this->encryption->encrypt($id);
      $query = $this->db->query("INSERT INTO employee (id,name,phone,type,email,dob,salary,joind,verification,password,sch,pic,ftimein,ftimeout,stimein,stimeout) VALUES(
        {$id},'{$name}','{$mobile}','{$type}','{$email}','{$dob}',{$salary},'{$doj}','{$verification}','{$password}',{$sch},'default.png','{$ftimein}','{$ftimeout}','{$stimein}','{$stimeout}'
      )");
      $query = $this->db->query("INSERT INTO login (id,password,type) values ({$id},'{$password}','{$details['type']}')");
      return $id;
    }

    // Getting Employee Data with their ID
    function get_employee_data($employeeid)
    {
      $query = $this->db->query("SELECT * FROM employee WHERE id={$employeeid}");
      foreach ($query->result() as $row) {
        $details = $row;
      }
      return $details;
    }

    // To update employee's photo
    function update_employee_photo($employeeid,$img)
    {
      $query = $this->db->query("SELECT pic FROM employee WHERE id={$employeeid}");
      foreach ($query->result() as $row) {
        $details = $row;
      }
      $query = $this->db->query("UPDATE employee SET pic='{$img}' WHERE id={$employeeid}");
      return $details->pic;
    }

    function getEmployees($search)
    {
      if(isset($search)){
        $query = $this->db->query
        ("SELECT * FROM employee WHERE id like '%{$search}%' or
          name like '%{$search}%' or
          phone like '%{$search}%' or
          type like '%{$search}%'
        ");
      }else{
        $query = $this->db->query("SELECT * FROM employee");
      }
      return $query;
    }

    function update_employee($details)
    {
      $id = $details['employeeid'];
      $name = $details['name'];
      $mobile = $details['mobile'];
      $email =  $details['email'];
      $type = $details['type'];
      $dob = $details['dob'];
      $salary = $details['salary'];
      $doj = $details['doj'];
      $verification = $details['verification'];
      $sch = $details['sch'];
      $ftimein = $details['ftimein'];
      $ftimeout = $details['ftimeout'];
      $stimein = $details['stimein'];
      $stimeout = $details['stimeout'];
      $query = $this->db->query("UPDATE employee SET name='{$name}',phone='{$mobile}',type='{$type}',email='{$email}',dob='{$dob}',salary={$salary},
        joind='{$doj}', verification='{$verification}', sch={$sch}, ftimein='{$ftimein}', ftimeout='{$ftimeout}', stimein='{$stimein}', stimeout='{$stimeout}'
        where id={$id}");

    }
  }

 ?>
