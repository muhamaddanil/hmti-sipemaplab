<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mahasiswa extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_mahasiswa");
    $this->load->model("m_setting");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['mahasiswa'] = $this->m_mahasiswa->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/mahasiswa/mahasiswa", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input() {
    // $data['mahasiswa_id']                  = "US".date('YmdHis');
    $data['mahasiswa_nama']                = $this->input->post('mahasiswa_nama');
    $data['mahasiswa_nim']            = $this->input->post('mahasiswa_nim');
    $data['mahasiswa_angkatan']            = $this->input->post('mahasiswa_angkatan');
    $this->session->set_flashdata('add', 'Berhasil Tambah mahasiswa <b>' . $data['mahasiswa_nama'].'</b>');
    $this->m_mahasiswa->input($data);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menambah Data mahasiswa ".$data['mahasiswa_nama'];
    $this->m_setting->create_log($log);
    redirect('mahasiswa');
  }
  
  public function edit() {
    
    $data['mahasiswa_id']                  = $this->input->post('mahasiswa_id');
    $data['mahasiswa_nama']                = $this->input->post('mahasiswa_nama');
    $data['mahasiswa_nim']            = $this->input->post('mahasiswa_nim');
    $data['mahasiswa_angkatan']            = $this->input->post('mahasiswa_angkatan');
    
    $this->session->set_flashdata('update', 'Berhasil Update mahasiswa <b>' . $data['mahasiswa_nama'].'</b>');
    $this->m_mahasiswa->edit($data);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Mengedit Data mahasiswa ".$data['mahasiswa_nama'];
    $this->m_setting->create_log($log);


    redirect('mahasiswa');
  }
  
  public function delete() {
    $this->session->set_flashdata('delete', 'mahasiswa <b>'.$this->input->post('mahasiswa_nama').'</b> telah dihapus !');
    $this->m_mahasiswa->delete($this->input->post('mahasiswa_id'));

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data mahasiswa ".$this->input->post('mahasiswa_nama');
    $this->m_setting->create_log($log);

    redirect('mahasiswa');
  }

  
  
  

  
}
?>
