<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Aduan extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_aduan");
    $this->load->model("m_setting");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['aduan'] = $this->m_aduan->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/aduan/aduan", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function selesai() {
    $data['aduan_id']       = $this->uri->segment(3);
    $data['aduan_status']   = 1;
    $this->session->set_flashdata('update', 'Berhasil Update Aduan ' . $data['group_name']);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Mengubah Data Aduan ".$this->input->post('aduan_id');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
    
    $this->m_aduan->edit($data);
    redirect('aduan');
      
  }

  
  
  

  
}
?>
