<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_employee extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('employee_tbl');
    $this->db->order_by("employee_id", "asc");
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
    $this->db->from('employee_tbl');
    $this->db->where('employee_id', $id);
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
    $this->db->insert('employee_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('employee_tbl', $data, array(
      'employee_id' => $data['employee_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('employee_tbl', array('employee_id' => $id));
  }  
}
?>
