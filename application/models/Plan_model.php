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
    
function PlanData($id)
{
    $query = $this->db->query("SELECT * FROM plan WHERE id ={$id}");
    return $query;
}

function UpdatePlanCat($data)
{
    $id = $data['id'];
    $category = $data['category'];
    $query = $this->db->query("UPDATE plan_category SET category='{$category}' WHERE id={$id}");
    
}
    
function update_plan($data)
{
    $id = $data['id'];
    $name = $data['name'];
    $price = $data['price'];
    $category = $data['category'];
    $tax_type = $data['tax_type'];
    $years = $data['years'];
    $months = $data['months'];
    $query = $this->db->query("UPDATE plan SET name='{$name}',price={$price},category='{$category}',tax_type='{$tax_type}',years={$years},months={$months} WHERE id={$id}");
}

function DeletePlanCat($data)
{
    $id = $data['id'];
    $query = $this->db->query("DELETE FROM plan_category WHERE id={$id}");
    
}
    
function DeletePlan($data)
{
    $id = $data['id'];
    $query = $this->db->query("DELETE FROM plan WHERE id={$id}");
    
}
    
function check_plan_name($str,$str1)
{
    $query = $this->db->query("SELECT * FROM plan WHERE category='{$str}'");
    if($query->num_rows()>0){
        foreach($query->result() as $row){
            if(strcasecmp($row->name,$str1)==0){
                return TRUE;
            }    
        }
        return FALSE;
    }
    else{
        return FALSE;
    }
}

}

?>