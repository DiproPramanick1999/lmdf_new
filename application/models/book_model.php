<?php
class Book_model extends CI_Model{
    
    function count_check($date,$time,$id){
        $query = $this->db->query("SELECT * from bookSlot where userid={$id} and date='{$date}'");
        if($query->num_rows()>0){
            return false;
        }
        else{
            $query1 = $this->db->query("SELECT * from bookSlot where date='{$date}' and time={$time}");
            if($query1->num_rows()>20){
                return false;
            }
            else{
                return true;
            }
        }
    }
    
    function insert_data($data){
        $this->db->insert("bookSlot",$data);
        
    }
    
}
?>