<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_login");
    $this->load->model("m_widget");
    $this->load->model("m_setting");
  }
  
  public function index() {
    if (!($this->session->userdata('user_id'))) {
      $visit['visit_id']      ="";
      $visit['visit_date']    =date('Y-m-d H:i:s');
      $this->m_setting->create_visit($visit);
      $data['settings_app']   = $this->m_setting->fetch_setting();
      $this->load->view("admin/login/login_page",$data);
    } else {
      $setting['settings_app'] = $this->m_setting->fetch_setting();
      //$data['settings_app'] = $this->m_setting->fetch_setting();
      $data['mahasiswa']         = $this->m_widget->total_mahasiswa();
      $data['aslab']          = $this->m_widget->total_aslab();
      $data['group']          = $this->m_widget->total_group();
      $data['user']           = $this->m_widget->total_user();
      $data['absenlab']         = $this->m_widget->total_absenlab();
      //===================================================
      $data['log']            = $this->m_setting->get_log(); 
      $data['jam']=array();
      for($i=0;$i<=23;$i++){
        if(strlen($i)==1){
          $date = date('Y-m-d')." 0".$i;
        }else{
          $date = date('Y-m-d')." ".$i;
        }
        $x = $this->m_setting->visit_by_hour($date);
        array_push($data['jam'],$x);
        
      }
      
      $this->load->view("attribute/header",$setting);
      $this->load->view("attribute/menus",$setting);
      $this->load->view("attribute/content",$data);
      $this->load->view("attribute/footer",$setting);
    }
  }
  
  public function login() {
    if ($_POST) {
      $data['username'] = $this->input->post('username');
      $data['password'] = md5($this->input->post('password'));
      $result           = $this->m_login->login($data);
      if (!!($result)) {
        $data = array(
          'user_id'         => $result->user_id,
          'user_name'       => $result->user_name,
          'user_fullname'   => $result->user_fullname,
          'user_photo'      => $result->user_photo,
          'user_address'    => $result->user_address,
          'user_bussiness'  => $result->user_bussiness,
          'user_sector'     => $result->user_sector,
          'group_id'        => $result->group_id,
          'IsAuthorized'    => true
        );
        $log['log_id']      = "";
        $log['log_time']    = date('Y-m-d H:i:s');
        $log['log_message'] = $data['user_fullname']." melakukan login ke sistem";
        $log['user_id']     = $data['user_id'];
        $this->m_setting->create_log($log);
        
        $this->session->set_userdata($data);
        redirect('home');
      } else {
        $this->session->set_flashdata('login', 'Username atau Kata Sandi salah!');
        redirect('home');
      }
    }
  }
  
  public function logout() {
    $this->session->sess_destroy();
    redirect('' . base_url());
  }
  
}
?>