<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_profillab");
    $this->load->model("m_dosenlab");
    $this->load->model("m_aslab");
    $this->load->model("m_mahasiswa");
    $this->load->model("m_absenlab");
    $this->load->model("m_setting");
  }
  
  public function index() {

    // $visit['visit_id']      ="";
    // $visit['visit_date']    =date('Y-m-d H:i:s');
    // $this->m_setting->create_visit($visit);

    $data['profillab'] = $this->m_profillab->fetch_data();
    $data['aslab'] = $this->m_aslab->fetch_data();
    $data['dosenlab'] = $this->m_dosenlab->fetch_data();
    
    $this->load->view("attribute/front/header",$data);
    $this->load->view("attribute/front/index",$data);
    $this->load->view("attribute/front/footer",$data);
  }

  public function contact() {
    $data['profillab'] = $this->m_profillab->fetch_data();
    $data['aslab'] = $this->m_aslab->fetch_data();
    $data['dosenlab'] = $this->m_dosenlab->fetch_data();
    $data['mahasiswa'] = $this->m_mahasiswa->fetch_data();
    $this->load->view("attribute/front/header",$data);
    $this->load->view("attribute/front/contact",$data);
    $this->load->view("attribute/front/footer",$data);
  }
  public function login() {
    $this->load->view("attribute/front/login");
  }
  public function register() {
    $this->load->view("attribute/front/register");
  }
  public function input_absen() {
    $data['mahasiswa_id']       = $this->input->post('mahasiswa_id');
    $data['aslab_id']        = $this->input->post('aslab_id');
    $data['absenlab_alasan']        = $this->input->post('absenlab_alasan');
    $this->session->set_flashdata('add', 'Berhasil Tambah Absen Laboratorium <b>' . $data['mahasiswa_id'].'</b>');
    $this->m_absenlab->input($data);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menambah Data Absen Laboratorium ".$data['mahasiswa_id'];
    $this->m_setting->create_log($log);
    redirect('front/contact'); 
  }
  
}
