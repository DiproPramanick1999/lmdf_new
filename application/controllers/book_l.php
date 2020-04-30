<?php
  /**
   *
   */
  class Book_l extends CI_Controller
  {

    function index()
    {
      $this->load->helper("url");
      $this->load->view("back/book_slot/book");
    }

    function checkAvailability() {
        $date = $_POST['date'];
        $time = $_POST['time'];
        $id = $_POST['id'];
        date_default_timezone_set("Asia/Calcutta");
        $a =  date("H:i:s");
        $c = $a[0].$a[1];
        if($date==date('Y-m-d') and $c>=(int)$time)
        {
            echo "SlotUnavailable";
        }
        else{
            $this->load->model('book_model');
            $availability = $this->book_model->count_check($date,$time,$id);
            if(!$availability){
                echo "SlotUnavailable";
            }
            else{
                echo "Success";
            }
        }

    }

      function booking(){
        $userid = $this->session->userdata('userid');
        $this->load->model('book_model');
        $data = array(
            "userid" =>$userid,
            "date" => $this->input->post("date"),
            "time" => $this->input->post("time")
        );
        $this->book_model->insert_data($data);
        redirect(base_url() . "book_l/inserted");
    }

    public function inserted()
    {

        $this->index();

    }



}


 ?>
