<?php
  class Separator_l_model extends CI_Model
  {
    function checkClient($userid)
    {
      $query = $this->db->query("SELECT phone FROM user WHERE id={$userid}");
      if ($query->num_rows()>0) {
        foreach ($query->result() as $row) {
          $mobile = $row->phone;
        }
      }else {
        $mobile = -1;
      }
      return $mobile;
    }

    function validClient($userid)
    {
      $query = $this->db->query("SELECT pic FROM user WHERE id={$userid}");
      if ($query->num_rows()>0) {
        foreach ($query->result() as $row) {
          $pic = $row->pic;
        }
      }
      if (isset($pic)) {
        return true;
      }else {
        return false;
      }
    }

    function updateClient($detail)
    {
      $query = $this->db->query("UPDATE user SET ".
        "gender = '".$detail["gender"]."',
        address = '".$detail['address']."',
        email = '".$detail['email']."',
        dob = '".$detail['dob']."',
        emerNum = '".$detail['emerNum']."',
        emerName = '".$detail['emerName']."',
        relation = '".$detail['relation']."',
        country = '".$detail['nationality']."',
        blood = '".$detail['blood']."',
        height = ".$detail['height'].",
        weight = ".$detail['weight'].",
        others = '".$detail['other']."',
        password = '".$detail['password']."',
        pic = '".$detail['pic']."' WHERE id=".$detail['userid']);

      $query = $this->db->query("INSERT INTO login(id,password,type) VALUES ({$detail['userid']},'".$detail['password']."','user')");
    }

    function get_user_data($userid)
    {
      $query = $this->db->query("SELECT * FROM user WHERE id={$userid}");
      foreach ($query->result() as $row) {
        $details = $row;
      }
      return $details;
    }


    function update_user_photo($userid,$img)
    {
      $query = $this->db->query("SELECT pic FROM user WHERE id={$userid}");
      foreach ($query->result() as $row) {
        $details = $row;
      }
      $query = $this->db->query("UPDATE user SET pic='{$img}' WHERE id={$userid}");
      return $details->pic;
    }

  }
?>
