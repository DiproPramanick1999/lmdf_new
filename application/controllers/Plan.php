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
    $this->load->helper('url');
    $this->load->model('Plan_model');
    $plan_category = $this->Plan_model->fetch_data();
    $table = "";
    if ($plan_category->num_rows()>0) {
        foreach ($plan_category->result() as $row) {
            $table .= "<tr onclick='viewPlanCat({$row->id})'>";
            $table .= "<td>{$row->category}</td>";
            $table .= "</tr>";
          }
    }
    else
    {
          $table .= "No Records Available";
    }
    $data["plan_category"] = $table;
    $this->load->view('back/plans/view',$data);
}


//function details()
//{
//    
//    $this->load->helper('url');
//    $this->load->model('Plan_model');
//    $plan_category = $this->Plan_model->fetch_data();
//    $table = "";
//    if ($plan_category->num_rows()>0) {
//        foreach ($plan_category->result() as $row) {
//            $table .= "<tr onclick='viewPlanCat({$row->id})'>";
//            $table .= "<td>{$row->category}</td>";
//            $table .= "</tr>";
//          }
//    }
//    else
//    {
//          $table .= "No Records Available";
//    }
//    $data["plan_category"] = $table;
//    $this->load->view('back/plans/view',$data);
//
//
//}

function updatePlanCat(){
    $this->load->helper('url');
    $url = ($this->uri->segment(3));
    $planCatid = $url;
    $this->load->model("Plan_model");
    $data["planCatData"]=$this->Plan_model->PlanCatData($planCatid);
    $this->load->view("back/plans/plan_cat_update",$data);


}

function planCatUpdate(){
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
            redirect(base_url() . "Plan/updatePlanCat/".$this->input->post("id")."/notUpdated");
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
    $this->form_validation->set_rules("plan_tax_type", "Enter Plan Tax Type", "required");
    $this->form_validation->set_rules("plan_year", "Enter Plan Name", "required");
    $this->form_validation->set_rules("plan_month", "Enter Plan Name", "required");
    if($this->form_validation->run())
    {
        $this->load->model("Plan_model");
        $data = array(
            "name" => $this->input->post("plan_name"),
            "price" => $this->input->post("plan_price"),
            "category" => $this->input->post("plan_cat"),
            "tax_type" => $this->input->post("plan_tax_type"),
            "years" => $this->input->post("plan_year"),
            "months" => $this->input->post("plan_month"),
            "edit" => 0
        );
        $query = $this->Plan_model->check_plan_name($data["category"],$data["name"]);
        if($query){
            $this->session->set_flashdata("new_msg","Name Already Exists.");
            redirect(base_url() . "Plan/add");
        }
        else{
        $this->Plan_model->insert_plan($data);
        redirect(base_url() . "Plan/add/inserted");
            }
    }
    else
    {
        $this->session->set_flashdata("new_msg","Please enter correct details.");
        redirect(base_url() . "Plan/add");
    }

}
    
function updatePlanAdd(){
    $this->load->helper('url');
    $url = ($this->uri->segment(3));
    $planid = $url;
    $this->load->model("Plan_model");
    $data["planData"]=$this->Plan_model->PlanData($planid);
    $data["plan_cat"] = $this->Plan_model->sel_plan_category();
    $this->load->view("back/plans/plan_add_update",$data);
}
function update_add_plan(){
    $this->load->helper('url');
    $this->load->model('Plan_model');
    if($this->input->post('update') != '')
    {
    $this->load->library('form_validation');
    $this->form_validation->set_rules("plan_name", "Enter Plan Name", "required");
    $this->form_validation->set_rules("plan_price", "Enter Plan Name", "trim|required|numeric");
    $this->form_validation->set_rules("plan_cat", "Enter Plan Name", "required");
    $this->form_validation->set_rules("plan_tax_type", "Enter Plan Tax Type", "required");
    $this->form_validation->set_rules("plan_year", "Enter Plan Name", "required");
    $this->form_validation->set_rules("plan_month", "Enter Plan Name", "required");
    if($this->form_validation->run())
    {
        $data = array(
            "id"=>$this->input->post("id"),
            "name" => $this->input->post("plan_name"),
            "price" => $this->input->post("plan_price"),
            "category" => $this->input->post("plan_cat"),
            "tax_type" => $this->input->post("plan_tax_type"),
            "years" => $this->input->post("plan_year"),
            "months" => $this->input->post("plan_month"),
            "edit" => 0
        );
        $query1=$this->Plan_model->PlanData($data["id"]);
        $query = $this->Plan_model->check_plan_name($data["category"],$data["name"]);
        if($query and $data["price"]==$query1->row()->price and $data["years"]==$query1->row()->years and $data["months"]==$query1->row()->months and $data["tax_type"]==$query1->row()->tax_type){
            $this->session->set_flashdata("new_msg","Plan name exists.Change the details to update.");
            redirect(base_url() . "Plan/updatePlanAdd/".$data["id"]);
        }
        else{
            $this->Plan_model->update_plan($data);
            redirect(base_url() . "Plan/view");
            }
    }
    else
    {
        $this->session->set_flashdata("new_msg","Please enter correct details.");
        redirect(base_url() . "Plan/updatePlanAdd/".$this->input->post("id"));
    }
    
    }
    else if($this->input->post('delete') != '')
    {
        $data=array(
            'id'=>$this->input->post("id")
          );
        $this->Plan_model->DeletePlan($data);
        $this->view();
    }
}
    

function view(){
    $this->load->helper('url');
        $this->load->model('Plan_model');
        $query = $this->Plan_model->fetch_plan_data();
        $table = "";
        if ($query->num_rows()>0) {
          foreach ($query->result() as $row) {
            $table .= "<tr onclick='viewPlan({$row->id})'>";
            $table .= "<td>{$row->name}</td>";
            $table .= "<td>{$row->price}</td>";
            $table .= "<td>{$row->category}</td>";
            $table .= "<td>{$row->tax_type}</td>";
            $table .= "<td>{$row->years}</td>";
            $table .= "<td>{$row->months}</td>";
            $table .= "</tr>";
          }
        }
        else
        {
          $table .= "No Records Available";
        }
        $data["plan_detail"] = $table;
        $this->load->view('back/plans/plan_view',$data);
}



//function plan_details()
//{
//    $this->load->helper('url');
//        $this->load->model('Plan_model');
//        $query = $this->Plan_model->fetch_plan_data();
//        $table = "";
//        if ($query->num_rows()>0) {
//          foreach ($query->result() as $row) {
//            $table .= "<tr onclick='viewPlan({$row->id})'>";
//            $table .= "<td>{$row->name}</td>";
//            $table .= "<td>{$row->price}</td>";
//            $table .= "<td>{$row->category}</td>";
//            $table .= "<td>{$row->tax_type}</td>";
//            $table .= "<td>{$row->years}</td>";
//            $table .= "<td>{$row->months}</td>";
//            $table .= "</tr>";
//          }
//        }
//        else
//        {
//          $table .= "No Records Available";
//        }
//        $data["plan_detail"] = $table;
//        $this->load->view('back/plans/plan_view',$data);
//}

}

?>
