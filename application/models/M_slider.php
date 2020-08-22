<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_slider extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('slider_tbl');
    $this->db->order_by("slider_id", "asc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function get($id) {
    $this->db->select('*');
    $this->db->from('slider_tbl');
    $this->db->where('slider_id', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }
  
  public function input($data) {
    $this->db->insert('slider_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('slider_tbl', $data, array(
      'slider_id' => $data['slider_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('slider_tbl', array('slider_id' => $id));
  }  
}
?>
