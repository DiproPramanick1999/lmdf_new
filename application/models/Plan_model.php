<?php

class Plan_model extends CI_Model{
    
function insert_data($data)
{
    $this->db->insert("plan_category",$data);
}

function fetch_data($get_details)
{
        if($get_details!="")
        {
            $query = $this->db->query("SELECT * FROM plan_category WHERE category like '%{$get_details}%'");
            return $query;
        }
        else{
            $query = $this->db->query("SELECT * FROM plan_category");
            return $query;
        }


}





}

?>