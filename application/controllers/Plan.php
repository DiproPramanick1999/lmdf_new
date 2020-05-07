<?php

class Plan extends CI_Controller{

function categoryAdd()
{
    $this->load->helper("url");
    $this->load->view("back/plans/plan_category");

}

function form_validations()
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
        redirect(base_url() . "Plan/categoryadd/inserted");
    }
    else
    {
        $this->categoryAdd();
    }

}

function category(){
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
            $table .= "<tr onclick='viewPlanCat({$row->id})'>";
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
    
function updatePlanCat(){
    $this->load->helper('url');
    $url = ($this->uri->segment_array());
    $planCatid = end($url);
    $this->load->model("Plan_model");
    $data["planCatData"]=$this->Plan_model->PlanCatData($planCatid);
    $this->load->view("back/plans/plan_cat_update",$data);
    
    
}
    
function palnCatUpdate(){
    $this->load->helper('url');
    $this->load->model('Plan_model');
    if($this->input->post('update') != '')
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('plancat','Plan Category','required|is_unique[plan_category.category]');
        if($this->form_validation->run())
        {
            $data=array(
            'id'=>$this->input->post("id"),
            'category'=>$this->input->post("plancat")
            );
            $this->Plan_model->UpdatePlanCat($data);
            redirect(base_url() . "Plan/category/Updated");
        }
        else
        {
            redirect(base_url() . "Plan/category/notUpdated");
        }
    }
    else if($this->input->post('delete') != '')
    {
      $data=array(
            'id'=>$this->input->post("id")
          );
      $this->Plan_model->DeletePlanCat($data);
      $this->load->view("back/plans/view");
        
    }
    
}


function add(){
    $this->load->helper("url");
    $this->load->model("Plan_model");
    $data["plan_cat"] = $this->Plan_model->sel_plan_category();
    $this->load->view("back/plans/plan_add",$data);
}

function add_plan()
{
    $this->load->library('form_validation');
    $this->form_validation->set_rules("plan_name", "Enter Plan Name", "required");
    $this->form_validation->set_rules("plan_price", "Enter Plan Name", "trim|required|numeric");
    $this->form_validation->set_rules("plan_cat", "Enter Plan Name", "required");
    $this->form_validation->set_rules("plan_year", "Enter Plan Name", "required");
    $this->form_validation->set_rules("plan_month", "Enter Plan Name", "required");
    if($this->form_validation->run())
    {
        $this->load->model("Plan_model");
        $data = array(
            "name" => $this->input->post("plan_name"),
            "price" => $this->input->post("plan_price"),
            "category" => $this->input->post("plan_cat"),
            "years" => $this->input->post("plan_year"),
            "months" => $this->input->post("plan_month"),
            "edit" => 0
        );
        $this->Plan_model->insert_plan($data);
        redirect(base_url() . "Plan/add/inserted");
    }
    else
    {
        $this->session->set_flashdata("new_msg","Please enter correct details.");
        redirect(base_url() . "Plan/add");
    }

}

function view(){
    $this->load->helper("url");
    $this->load->view("back/plans/plan_view");
}



function plan_details()
{
    $this->load->helper('url');
        $get_details = $_POST["get_details"];
        $this->load->model('Plan_model');
        $query = $this->Plan_model->fetch_plan_data($get_details);
        $table = "";
        if ($query->num_rows()>0) {
          foreach ($query->result() as $row) {
            $table .= "<tr>";
            $table .= "<td>{$row->name}</td>";
            $table .= "<td>{$row->price}</td>";
            $table .= "<td>{$row->category}</td>";
            $table .= "<td>{$row->years}</td>";
            $table .= "<td>{$row->months}</td>";
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
