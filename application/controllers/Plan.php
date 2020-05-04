<?php

class Plan extends CI_Controller{

function index()
{
    $this->load->helper("url");
    $this->load->view("back/plans/plan_category");
    
}
    
function form_validation()
{
    $this->load->library('form_validation');
    $this->form_validation->set_rules("plancat", "plan category", "required|is_unique[plan_category.category]");
    if($this->form_validation->run())
    {
        $this->load->model("Plan_model");
        $data = array(
            "category" => $this->input->post("plancat"),
            "edit" => 0
        );
        $this->Plan_model->insert_data($data);
        redirect(base_url() . "Plan/inserted");
    }
    else
    {
        $this->index();
    }
    
}
    
function inserted()
{
    $this->index();
}
    
function view(){
    $this->load->helper("url");
    $this->load->view("back/plans/view");
}  


function details()
{
    $this->load->helper('url');
        $get_details = $_POST["get_details"];
        $this->load->model('Plan_model');
        $query = $this->Plan_model->fetch_data($get_details);
        $table = "";
        if ($query->num_rows()>0) {
          foreach ($query->result() as $row) {
            $table .= "<tr>";
            $table .= "<td>{$row->category}</td>";
            $table .= "</tr>";
          }
        }
        else
        {
          $table .= "No Records Available";
        }
        echo $table;

}

}

?>