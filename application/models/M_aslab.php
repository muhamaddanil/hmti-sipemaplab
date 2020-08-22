<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_aslab extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('aslab_tbl');
    $this->db->order_by("aslab_id", "asc");
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
    $this->db->from('aslab_tbl');
    $this->db->where('aslab_id', $id);
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
    $this->db->insert('aslab_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('aslab_tbl', $data, array(
      'aslab_id' => $data['aslab_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('aslab_tbl', array('aslab_id' => $id));
  }  
}
?>
