<?php
class Book_model extends CI_Model{

    function count_check($date,$time,$id){
        $query = $this->db->query("SELECT * from bookslot where userid={$id} and date='{$date}'");
        if($query->num_rows()>0){
            return false;
        }
        else{
            $query1 = $this->db->query("SELECT * from bookslot where date='{$date}' and time={$time}");
            if($query1->num_rows()>20){
                return false;
            }
            else{
                return true;
            }
        }
    }

    function slot_check($date,$time){
        $query = $this->db->query("SELECT * from bookslot where time={$time} and date='{$date}'");
        return $query;
    }

    function insert_data($data){
        $this->db->insert("bookslot",$data);
    }

    function get_data($userid)
    {
      date_default_timezone_set('Asia/Kolkata');
      $date = date("Y-m-d");
      $query = $this->db->query("SELECT * from bookslot where date='{$date}' and userid={$userid}");
      return $query;
    }


    function fetch_data($get_details)
    {
        if($get_details!="")
        {
            $query = $this->db->query("SELECT * FROM bookslot WHERE date='{$get_details}'");
            return $query;
        }
        else{
            $query = $this->db->query("SELECT * FROM bookslot");
            return $query;
        }


    }

    function get_today_booking()
    {
      date_default_timezone_set('Asia/Kolkata');
      $date = date("Y-m-d");
      $query = $this->db->query("SELECT * from bookslot WHERE date='{$date}' ORDER BY time DESC");
      return $query;
    }

    function clientData($clientid)
    {
        $query = $this->db->query("SELECT * FROM bookslot WHERE userid={$clientid} ORDER BY date DESC");
        return $query;
    }

}
?>
