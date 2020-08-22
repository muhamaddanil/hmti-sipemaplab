<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_gallery extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('gallery_tbl');
    $this->db->order_by("gallery_id", "asc");
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
    $this->db->from('gallery_tbl');
    $this->db->where('gallery_id', $id);
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
    $this->db->insert('gallery_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('gallery_tbl', $data, array(
      'gallery_id' => $data['gallery_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('gallery_tbl', array('gallery_id' => $id));
  }  
}
?>
