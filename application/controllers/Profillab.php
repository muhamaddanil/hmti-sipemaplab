<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profillab extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_profillab");
    $this->load->model("m_setting");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['profillab'] = $this->m_profillab->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/profillab/profillab", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input() {
    // $data['profillab_id']                  = "US".date('YmdHis');
    $data['profillab_nama']                = $this->input->post('profillab_nama');
    $data['profillab_visi']            = $this->input->post('profillab_visi');
    $data['profillab_misi']            = $this->input->post('profillab_misi');
    $this->session->set_flashdata('add', 'Berhasil Tambah profillab <b>' . $data['profillab_nama'].'</b>');
    $this->m_profillab->input($data);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menambah Data profillab ".$data['profillab_nama'];
    $this->m_setting->create_log($log);
    redirect('profillab');
  }
  
  public function edit() {
    
    $data['profillab_id']                  = $this->input->post('profillab_id');
    $data['profillab_nama']                = $this->input->post('profillab_nama');
    $data['profillab_visi']            = $this->input->post('profillab_visi');
    $data['profillab_misi']            = $this->input->post('profillab_misi');
    
    $this->session->set_flashdata('update', 'Berhasil Update profillab <b>' . $data['profillab_nama'].'</b>');
    $this->m_profillab->edit($data);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Mengedit Data profillab ".$data['profillab_nama'];
    $this->m_setting->create_log($log);


    redirect('profillab');
  }
  
  public function delete() {
    $this->session->set_flashdata('delete', 'profillab <b>'.$this->input->post('profillab_nama').'</b> telah dihapus !');
    $this->m_profillab->delete($this->input->post('profillab_id'));

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data profillab ".$this->input->post('profillab_nama');
    $this->m_setting->create_log($log);

    redirect('profillab');
  }

  
  
  

  
}
?>
