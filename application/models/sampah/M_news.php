<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_news extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('news_tbl a');
    $this->db->join('news_category_tbl b','a.news_category_id=b.news_category_id','LEFT');
    $this->db->order_by("a.news_id", "asc");
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
    $this->db->from('news_tbl a');
    $this->db->join('news_category_tbl b','a.news_category_id=b.news_category_id','LEFT');
    $this->db->order_by("a.news_id", "asc");
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
    $this->db->from('news_tbl a');
    $this->db->join('news_category_tbl b','a.news_category_id=b.news_category_id','LEFT');
    $this->db->where('a.news_id', $id);
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
    $this->db->insert('news_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('news_tbl', $data, array(
      'news_id' => $data['news_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('news_tbl', array('news_id' => $id));
  }  
}
?>
