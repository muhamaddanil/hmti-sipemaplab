<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_setting extends CI_Model {
  
  function __construct() {
    parent::__construct();
  }

  /*Time Visit*/
  public function create_visit($data) {
    $this->db->insert('visit_tbl', $data);
  }

  public function visit_by_hour($date) {
    $this->db->from('visit_tbl');
    $this->db->like('visit_date',$date);
    return $this->db->count_all_results();
  }

  /*For Log*/
  public function create_log($data) {
    $this->db->insert('log_tbl', $data);
  }

  public function get_log() {
    $this->db->select("a.log_message,a.log_time,b.user_name");
    $this->db->from('log_tbl a');
    $this->db->join('user_tbl b', 'a.user_id=b.user_id','LEFT');
    $this->db->order_by('a.log_id', 'DESC');
    $this->db->limit(3);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_log() {
    $this->db->select("a.log_message,a.log_time,b.user_name");
    $this->db->from('log_tbl a');
    $this->db->join('user_tbl b', 'a.user_id=b.user_id','LEFT');
    $this->db->order_by('a.log_id', 'DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  /*For Dashboard*/
  public function total_subdistrict() {
    $this->db->select('*');
    $this->db->from('subdistrict_tbl');
    return $this->db->count_all_results();
  }

  public function total_village() {
    $this->db->select('*');
    $this->db->from('village_tbl');
    return $this->db->count_all_results();
  }

  public function total_user() {
    $this->db->select('*');
    $this->db->from('user_tbl');
    $this->db->where('user_group',2);
    return $this->db->count_all_results();
  }


  public function fetch_setting() {
    $this->db->select("*");
    $this->db->from('setting_tbl');
    $this->db->where('setting_id', 1);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function update_setting($data) {
    $this->db->update('setting_tbl', $data, array('setting_id' => $data['setting_id']));
  }

  


}
?>