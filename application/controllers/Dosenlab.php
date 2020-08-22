<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dosenlab extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_dosenlab");
    $this->load->model("m_setting");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['dosenlab'] = $this->m_dosenlab->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/dosenlab/dosenlab", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input() {
    // $data['dosenlab_id']                  = "US".date('YmdHis');
    $data['dosenlab_nama']                = $this->input->post('dosenlab_nama');
    $data['dosenlab_nip']            = $this->input->post('dosenlab_nip');
    $this->session->set_flashdata('add', 'Berhasil Tambah dosenlab <b>' . $data['dosenlab_nama'].'</b>');
    $this->m_dosenlab->input($data);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menambah Data dosenlab ".$data['dosenlab_nama'];
    $this->m_setting->create_log($log);
    redirect('dosenlab');
  }
  
  public function edit() {
    
    $data['dosenlab_id']                  = $this->input->post('dosenlab_id');
    $data['dosenlab_nama']                = $this->input->post('dosenlab_nama');
    $data['dosenlab_nip']            = $this->input->post('dosenlab_nip');
    
    $this->session->set_flashdata('update', 'Berhasil Update dosenlab <b>' . $data['dosenlab_nama'].'</b>');
    $this->m_dosenlab->edit($data);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Mengedit Data dosenlab ".$data['dosenlab_nama'];
    $this->m_setting->create_log($log);


    redirect('dosenlab');
  }
  
  public function delete() {
    $this->session->set_flashdata('delete', 'dosenlab <b>'.$this->input->post('dosenlab_nama').'</b> telah dihapus !');
    $this->m_dosenlab->delete($this->input->post('dosenlab_id'));

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data dosenlab ".$this->input->post('dosenlab_nama');
    $this->m_setting->create_log($log);

    redirect('dosenlab');
  }

  
  
  

  
}
?>
