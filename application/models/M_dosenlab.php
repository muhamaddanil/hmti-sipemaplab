<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_dosenlab extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('dosenlab_tbl');
    $this->db->order_by("dosenlab_id", "asc");
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
    $this->db->from('dosenlab_tbl');
    $this->db->where('dosenlab_id', $id);
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
    $this->db->insert('dosenlab_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('dosenlab_tbl', $data, array(
      'dosenlab_id' => $data['dosenlab_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('dosenlab_tbl', array('dosenlab_id' => $id));
  }  
}
?>
