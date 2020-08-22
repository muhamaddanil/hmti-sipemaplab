<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_profillab extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('profillab_tbl');
    $this->db->order_by("profillab_id", "asc");
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
    $this->db->from('profillab_tbl');
    $this->db->where('profillab_id', $id);
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
    $this->db->insert('profillab_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('profillab_tbl', $data, array(
      'profillab_id' => $data['profillab_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('profillab_tbl', array('profillab_id' => $id));
  }  
}
?>
