<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_rules_category extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('rules_category_tbl');
    $this->db->order_by("rules_category_id", "asc");
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
    $this->db->from('rules_category_tbl');
    $this->db->where('rules_category_id', $id);
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
    $this->db->insert('rules_category_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('rules_category_tbl', $data, array(
      'rules_category_id' => $data['rules_category_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('rules_category_tbl', array('rules_category_id' => $id));
  }  
}
?>
