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
    
function PlanCatData($id)
{
    $query = $this->db->query("SELECT * FROM plan_category WHERE id ={$id}");
    return $query;
}

function UpdatePlanCat($data)
{
    $id = $data['id'];
    $category = $data['category'];
    $query = $this->db->query("UPDATE plan_category SET category='{$category}' WHERE id={$id}");
    
}

function DeletePlanCat($data)
{
    $id = $data['id'];
    $query = $this->db->query("DELETE FROM plan_category WHERE id={$id}");
    
}

}

?>