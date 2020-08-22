<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rules_category extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_rules_category");
    $this->load->model("m_setting");
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['rules_category'] = $this->m_rules_category->fetch_data();
    $this->load->view("attribute/header",$setting);
    $this->load->view("attribute/menus",$setting);
    $this->load->view("admin/master_data/rules/rules_category", $data);
    $this->load->view("attribute/footer",$setting);
  }

  
  
  public function input() {
    $data['rules_category_id']    = "";
    $data['rules_category_name']  = $this->input->post('rules_category_name');
    $this->session->set_flashdata('add', 'Berhasil Tambah Jenis Peraturan ' . $data['rules_category_name']);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menambah Data Jenis Peraturan ".$this->input->post('rules_category_name');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
    
    $this->m_rules_category->input($data);
    redirect('rules_category');
  }
  
  public function edit() {
    $data['rules_category_id']    = $this->input->post('rules_category_id');
    $data['rules_category_name']  = $this->input->post('rules_category_name');
    $this->session->set_flashdata('update', 'Berhasil Update Jenis Peraturan ' . $data['rules_category_name']);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Mengubah Data Jenis Peraturan ".$this->input->post('rules_category_name');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
    
    $this->m_rules_category->edit($data);
    redirect('rules_category');
      
  }
  
  public function delete() {
    $this->m_rules_category->delete($this->input->post('rules_category_id'));
    $this->session->set_flashdata('delete', 'Jenis Peraturan ' . $this->input->post('rules_category_name')." telah dihapus !");


    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data Jenis Peraturan ".$this->input->post('rules_category_name');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
    redirect('rules_category');
  }
  
}
?>
