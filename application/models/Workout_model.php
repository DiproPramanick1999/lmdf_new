<?php
  class Workout_model extends CI_Model
  {
    function updateLink($data)
    {
      $muscle = $data['muscle'];
      $week = $data['week'];
      $link = $data['link'];
      $query = $this->db->query("UPDATE workout SET link='{$link}' WHERE muscle='{$muscle}' AND week={$week}");
      $this->session->set_flashdata('workout_check','success');
      redirect(base_url()."workout/add");
    }

    function getVideo($muscle,$week)
    {
      $query = $this->db->query("SELECT link from workout WHERE muscle='{$muscle}' and week={$week}");
      if ($query->num_rows()>0) {
        foreach ($query->result() as $row) {
          $link = $row->link;
        }
        if (isset($link) && !empty($link)) {
          return $link;
        }else {
          return "<h2>Video Not Uploaded</h2>";
        }
      }else {
        return "<h2>Video Not Uploaded</h2>";
      }
    }

    function delVideo($muscle,$week)
    {
      $query = $this->db->query("UPDATE workout SET link='' where muscle='{$muscle}' AND week={$week}");
    }
  }
?>
