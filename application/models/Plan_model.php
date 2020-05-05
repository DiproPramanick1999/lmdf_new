<?php

class Plan_model extends CI_Model{
    
function insert_data($data)
{
    $this->db->insert("plan_category",$data);
}
    
function insert_plan($data)
{
    $this->db->insert("plan",$data);
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
    
function sel_plan_category()
{
        
        $query = $this->db->query("SELECT * FROM plan_category");
        return $query;
    
}

function fetch_plan_data($get_details)
{
    if($get_details!="")
        {
            $query = $this->db->query("SELECT * FROM plan WHERE category like '%{$get_details}%' or name like '%{$get_details}%' or price like '%{$get_details}%'");
            return $query;
        }
        else{
            $query = $this->db->query("SELECT * FROM plan");
            return $query;
        }
    
}



}

?>