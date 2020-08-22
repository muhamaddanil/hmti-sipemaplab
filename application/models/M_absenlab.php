<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_absenlab extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('absenlab_tbl');
    $this->db->order_by("absenlab_id", "asc");
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
    $this->db->from('absenlab_tbl');
    $this->db->where('absenlab_id', $id);
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
    $this->db->insert('absenlab_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('absenlab_tbl', $data, array(
      'absenlab_id' => $data['absenlab_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('absenlab_tbl', array('absenlab_id' => $id));
  }  
}
?>
