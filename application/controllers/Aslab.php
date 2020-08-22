<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Aslab extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_aslab");
    $this->load->model("m_setting");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['aslab'] = $this->m_aslab->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/aslab/aslab", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input() {
    // $data['aslab_id']                  = "US".date('YmdHis');
    $data['aslab_nama']                = $this->input->post('aslab_nama');
    $data['aslab_nim']            = $this->input->post('aslab_nim');
    $data['aslab_angkatan']            = $this->input->post('aslab_angkatan');
    $this->session->set_flashdata('add', 'Berhasil Tambah aslab <b>' . $data['aslab_nama'].'</b>');
    $this->m_aslab->input($data);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menambah Data aslab ".$data['aslab_nama'];
    $this->m_setting->create_log($log);
    redirect('aslab');
  }
  
  public function edit() {
    
    $data['aslab_id']                  = $this->input->post('aslab_id');
    $data['aslab_nama']                = $this->input->post('aslab_nama');
    $data['aslab_nim']            = $this->input->post('aslab_nim');
    $data['aslab_angkatan']            = $this->input->post('aslab_angkatan');
    
    $this->session->set_flashdata('update', 'Berhasil Update aslab <b>' . $data['aslab_nama'].'</b>');
    $this->m_aslab->edit($data);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Mengedit Data aslab ".$data['aslab_nama'];
    $this->m_setting->create_log($log);


    redirect('aslab');
  }
  
  public function delete() {
    $this->session->set_flashdata('delete', 'aslab <b>'.$this->input->post('aslab_nama').'</b> telah dihapus !');
    $this->m_aslab->delete($this->input->post('aslab_id'));

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data aslab ".$this->input->post('aslab_nama');
    $this->m_setting->create_log($log);

    redirect('aslab');
  }

  
  
  

  
}
?>
