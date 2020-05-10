<?php

class Tax extends CI_Controller{
    
    
function index()
{
    $this->load->helper("url");
    $this->load->model("Tax_model");
    $data["tax_details"] = $this->Tax_model->tax_details();
    $this->load->view("back/tax/tax_add",$data);
}


function tax_update()
{
    $this->load->helper("url");
    $this->load->model("Tax_model");
    $data = array(
        "id" => $this->input->post("id"),
        "cgst" => $this->input->post("cgst"),
        "sgst" => $this->input->post("sgst")
    );
    $this->Tax_model->update_tax($data);
    redirect(base_url() . "Tax/index/updated/");
}













}
?>