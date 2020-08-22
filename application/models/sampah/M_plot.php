<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_plot extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('plot_tbl');
    $this->db->order_by("plot_id", "asc");
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
    $this->db->from('plot_tbl');
    $this->db->where('plot_id', $id);
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
    $this->db->insert('plot_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('plot_tbl', $data, array(
      'plot_id' => $data['plot_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('plot_tbl', array('plot_id' => $id));
  }  
}
?>
