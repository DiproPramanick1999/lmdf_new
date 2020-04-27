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
      $password = $this->encryption->encrypt($id);
      $query = $this->db->query("INSERT INTO employee (id,name,phone,type,email,dob,salary,joind,verification,password,sch,pic) VALUES(
        {$id},
       '".$details['name']."',
        {$details['mobile']},
        '{$details['type']}',
        '{$details['email']}',
        '{$details['dob']}',
        {$details['salary']},
        '{$details['doj']}',
        '{$details['verification']}',
        '{$password}',
        {$details['sch']},
        'default.png'
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
  }

 ?>
