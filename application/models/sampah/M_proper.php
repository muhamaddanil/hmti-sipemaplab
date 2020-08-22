<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_proper extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data($status) {
    $this->db->select('*');
    $this->db->from('proper_tbl');
    $this->db->where('proper_status', $status);
    $this->db->order_by("proper_id", "desc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_dokling() {
    $this->db->select('*');
    $this->db->from('proper_tbl');
    $this->db->where('user_id', $this->session->userdata('user_id'));
    $this->db->order_by("proper_id", "desc");
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
    $this->db->from('proper_tbl');
    $this->db->where('proper_id', $id);
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
    $this->db->insert('proper_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('proper_tbl', $data, array(
      'proper_id' => $data['proper_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('proper_tbl', array('proper_id' => $id));
  }  


  /*Matriks*/
  public function fetch_data_matrix($id) {
    $this->db->select('*');
    $this->db->from('proper_matriks_tbl a');
    $this->db->join('proper_tbl b', 'a.proper_id=b.proper_id','LEFT');
    $this->db->where('a.proper_id', $id);
    $this->db->order_by("proper_matriks_id", "desc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }


  public function input_matriks($data) {
    $this->db->insert('proper_matriks_tbl', $data);
  }
  
  public function edit_matriks($data) {
    $this->db->update('proper_matriks_tbl', $data, array(
      'proper_matriks_id' => $data['proper_matriks_id']
    ));
  }
  
  public function delete_matriks($id) {
    $this->db->delete('proper_matriks_tbl', array('proper_matriks_id' => $id));
  }  

  /*For Maps*/

  public function fetch_data_peta($status) {
    $this->db->select('*');
    $this->db->from('proper_tbl');
    $this->db->where('proper_status', $status);
    $this->db->where('proper_titik_kordinat !=', '');
    $this->db->order_by("proper_id", "desc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }


}
?>
