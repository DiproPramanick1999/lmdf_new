<?php

    class Dashboard extends CI_Controller
    {

      function index()
      {
        $this->load->helper('url');
        $this->load->view("back/dashboard.php");
      }
      function registered()
      {
          $this->load->helper('url');
          $this->load->model("user_model");
          $query = $this->user_model->getRegisteredUser();
          $data['count'] = $query->num_rows();
          $data['table'] = "";
          $table = "";
          if ($query->num_rows()>0) {
            foreach ($query->result() as $row) {
              $table .= "<tr>";
              $table .= "<td>".$row->id."</td>";
              $table .= "<td>".$row->name."</td>";
              $table .= "<td>".$row->phone."</td>";
              $table .= "<td>".$row->email."</td>";
              $table .= "<td>".$row->address."</td>";
              $table .= "</tr>";
            }
            $data['table'] = $table;
          }else{
            $data['table'] = "<p>No Registered Users</p>";
          }
          $this->load->view("back/users/registered_users",$data);
      }
      function registered_download()
      {
        $this->load->helper('url');
        $this->load->model("user_model");
        $query = $this->user_model->getRegisteredUser();
        $count = $query->num_rows();
        $output = '<html><head><style>
          #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;

          }

          #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 15px;
          }

          #customers tr:nth-child(even){background-color: #f2f2f2;}

          #customers tr:hover {background-color: #ddd;}

          #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
          }

            .data-text{
                font-family: "Roboto", sans-serif;
                font-size: 15px;
            }
        </style></head><body>
        <center><h1>Leon Maestro De Fitness</h1></center><br>
        <center><h4>Total Registered Members: '.$count.'</h4><center>
        ';
        if ($count>0) {
          $output .= '
         <table class="table" bordered="1" id="customers">
                          <tr>
                               <th rowspan="3" style="border-bottom:none;">ID</th>
                               <th rowspan="3" style="border-bottom:none;">NAME</th>
                               <th rowspan="3" style="border-bottom:none;">CONTACT</th>
                               <th rowspan="3" style="border-bottom:none;">GENDER</th>
                               <th rowspan="3" style="border-bottom:none;">DOB</th>
                               <th rowspan="3" style="border-bottom:none;">EMAIL</th>
                               <th rowspan="3" style="border-bottom:none;">ADDRESS</th>
                               <th rowspan="3" style="border-bottom:none;">Emergency Contact Number</th>
                               <th rowspan="3" style="border-bottom:none;">Emergency Contact Name</th>
                               <th rowspan="3" style="border-bottom:none;">Relation</th>
                               <th rowspan="3" style="border-bottom:none;">Join Date</th>
                               <th rowspan="3" style="border-bottom:none;">Expiry Date</th>
                          </tr>
                          <tr>
                          </tr>
                          <tr>
                          </tr>
        ';
          foreach ($query->result() as $row) {
            $output .= '
                                 <tr>
                                 <td>'.$row->id.'</td>
                                 <td>'.$row->name.'</td>
                                 <td>'.$row->phone.'</td>
                                 <td>'.$row->gender.'</td>
                                 <td>'.$row->dob.'</td>
                                 <td>'.$row->email.'</td>
                                 <td>'.$row->address.'</td>
                                 <td>'.$row->emerNum.'</td>
                                 <td>'.$row->emerName.'</td>
                                 <td>'.$row->relation.'</td>
                                 <td>'.$row->joind.'</td>
                                 <td>'.$row->expd.'</td>
                                 </tr>
           ';
          }
          $output .= '</table></body></html>';
          header('Content-Type: application/xls');
          header('Content-Disposition: attachment; filename=Registered_Users_'.strtotime("now").'.xls');
          echo $output;
        }
      }

    }


 ?>
