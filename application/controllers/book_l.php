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

    function client()
    {
        $this->load->helper("url");
        $this->load->view("back/book_slot/view");

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
        $username = $this->session->userdata('username');
        $phone = $this->session->userdata('phone');
        $pic = $this->session->userdata('profile_pic');
        $this->load->model('book_model');
        $data = array(
            "userid" =>$userid,
            "username" =>$username,
            "phone" =>$phone,
            "pic" =>$pic,
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
    function date_pick()
    {
        $this->load->helper('url');
        $get_details = $_POST["get_details"];
        $this->load->model('book_model');
        $query = $this->book_model->fetch_data($get_details);
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
        $table = "";
        if ($query->num_rows()>0) {
          foreach ($query->result() as $row) {
            $table .= "<tr onclick='viewClientDetails({$row->userid})'>";
            $table .= "<td>{$row->userid}</td>";
            $table .= "<td>{$row->username}</td>";
            $table .= "<td>{$row->phone}</td>";
            $table .= "<td>".date("d-m-Y", strtotime($row->date))."</td>";
            $table .= "<td>{$timeArr[$row->time]}</td>";
            $table .= "</tr>";
          }
        }
        else
        {
          $table .= "No Records Available";
        }
        echo $table;

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

    function viewClients()
    {
      $this->load->helper("url");
      $this->load->model('book_model');
      $query = $this->book_model->get_today_booking();
      $data['list'] = $query;
      $data['date'] = '';
      $data['time'] = '';
      $data['valid'] = '';
      $this->load->view("back/book_slot/book_view_tc",$data);
    }
      
      function details()
      {
          $this->load->helper('url');
          $url = ($this->uri->segment_array());
          $clientid = end($url);
          $this->load->model("book_model");
          $data["client_data"]=$this->book_model->clientData($clientid);
          $this->load->view("back/book_slot/client_view",$data);
          
      }
      function clienttable()
      {
        $this->load->helper('url');
        $get_details = $_POST["get_details"];
        $this->load->model('book_model');
        $query = $this->book_model->clientData($get_details);
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
        $table = "";
        if ($query->num_rows()>0) {
          foreach ($query->result() as $row) {
            $table .= "<tr>";
            $table .= "<td>".date("d-m-Y", strtotime($row->date))."</td>";
            $table .= "<td>{$timeArr[$row->time]}</td>";
            $table .= "</tr>";
          }
        }
        else{
            $table .= "No Records Available";
        }
        echo $table;
          
          
      }

}


 ?>
