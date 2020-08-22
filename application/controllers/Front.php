<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_profillab");
    $this->load->model("m_dosenlab");
    $this->load->model("m_aslab");
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
    $this->load->view("attribute/front/header",$data);
    $this->load->view("attribute/front/contact",$data);
    $this->load->view("attribute/front/footer",$data);
  }
  public function login() {
    $this->load->view("attribute/front/login",$data);
  }
  public function register() {
    $this->load->view("attribute/front/register",$data);
  }
  /*Profil*/
  
}
?>