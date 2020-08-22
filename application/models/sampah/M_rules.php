<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_rules extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('rules_tbl a');
    $this->db->join('rules_category_tbl b','a.rules_category_id=b.rules_category_id','LEFT');
    $this->db->order_by("a.rules_id", "asc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }


  public function fetch_data_last() {
    $this->db->select('*');
    $this->db->from('rules_tbl a');
    $this->db->join('rules_category_tbl b','a.rules_category_id=b.rules_category_id','LEFT');
    $this->db->order_by("a.rules_id", "desc");
    $this->db->limit(4);
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
    $this->db->from('rules_tbl');
    $this->db->where('rules_id', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function getAll($id) {
    $this->db->select('*');
    $this->db->from('rules_tbl a');
    $this->db->join('rules_category_tbl b','a.rules_category_id=b.rules_category_id','LEFT');
    $this->db->where('b.rules_category_id', $id);
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
    $this->db->insert('rules_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('rules_tbl', $data, array(
      'rules_id' => $data['rules_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('rules_tbl', array('rules_id' => $id));
  }  
}
?>
