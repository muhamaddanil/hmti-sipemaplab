<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Absenlab extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_absenlab");
    $this->load->model("m_setting");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['absenlab'] = $this->m_absenlab->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/absenlab/absenlab", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input() {
    // $data['absenlab_id']                  = "US".date('YmdHis');
    $data['absenlab_nama']                = $this->input->post('absenlab_nama');
    $data['absenlab_nim']            = $this->input->post('absenlab_nim');
    $data['absenlab_angkatan']            = $this->input->post('absenlab_angkatan');
    $this->session->set_flashdata('add', 'Berhasil Tambah absenlab <b>' . $data['absenlab_nama'].'</b>');
    $this->m_absenlab->input($data);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menambah Data absenlab ".$data['absenlab_nama'];
    $this->m_setting->create_log($log);
    redirect('absenlab');
  }
  
  public function edit() {
    
    $data['absenlab_id']                  = $this->input->post('absenlab_id');
    $data['absenlab_nama']                = $this->input->post('absenlab_nama');
    $data['absenlab_nim']            = $this->input->post('absenlab_nim');
    $data['absenlab_angkatan']            = $this->input->post('absenlab_angkatan');
    
    $this->session->set_flashdata('update', 'Berhasil Update absenlab <b>' . $data['absenlab_nama'].'</b>');
    $this->m_absenlab->edit($data);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Mengedit Data absenlab ".$data['absenlab_nama'];
    $this->m_setting->create_log($log);


    redirect('absenlab');
  }
  
  public function delete() {
    $this->session->set_flashdata('delete', 'absenlab <b>'.$this->input->post('absenlab_nama').'</b> telah dihapus !');
    $this->m_absenlab->delete($this->input->post('absenlab_id'));

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data absenlab ".$this->input->post('absenlab_nama');
    $this->m_setting->create_log($log);

    redirect('absenlab');
  }

  
  
  

  
}
?>
