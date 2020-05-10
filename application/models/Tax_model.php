<?php

class Tax_model extends CI_Model
{
    

function tax_details(){
    $query = $this->db->query("SELECT * from tax");
    return $query;
}

function update_tax($data)
{
    $id = $data['id'];
    $cgst = $data['cgst'];
    $sgst = $data['sgst'];
    
    $query = $this->db->query("UPDATE tax SET cgst={$cgst},sgst={$sgst} WHERE id=1");
}











}

?>