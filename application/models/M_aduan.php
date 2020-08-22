<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_aduan extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('aduan_tbl');
    $this->db->order_by("aduan_id", "desc");
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
    $this->db->from('aduan_tbl');
    $this->db->where('aduan_id', $id);
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
    $this->db->insert('aduan_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('aduan_tbl', $data, array(
      'aduan_id' => $data['aduan_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('aduan_tbl', array('aduan_id' => $id));
  }  
}
?>
