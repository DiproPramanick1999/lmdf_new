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

    function pass()
    {
      $this->load->helper("url");
      $userid = $this->session->userdata('userid');
      $this->load->model('book_model');
      $query = $this->book_model->get_data($userid);
      $data['date'] = '';
      $data['time'] = '';
      $date = date("Y-m-d");
      if ($query->num_rows()>0) {
        $data['valid'] = true;
        foreach ($query->result() as $row) {
          $date = $row->date;
          $time = $row->time;
        }
        $date = strtotime($date);
        $data['date'] = date("d-m-Y", $date);
        $timeArr = array(
          '5' => "5:00-6:00",
          '6' => "6:30-7:30",
          '8' => "8:00-9:00",
          '9' => "9:30-10:30",
          '11' => "11:00-12:00",
          '12' => "12:30-13:30",
          '14' => "14:00-15:00",
          '15' => "15:30-16:30",
          '17' => "17:00-18:00",
          '18' => "18:30-19:30",
          '20' => "20:00-21:00",
          '21' => "21:30-22:30",
        );
        $data['time'] = $timeArr[$time];
        $this->load->view("back/book_slot/book_view_tc",$data);
      }else {
        $data['valid'] = false;
        $this->load->view("back/book_slot/book_view_tc",$data);
      }
    }



}


 ?>
