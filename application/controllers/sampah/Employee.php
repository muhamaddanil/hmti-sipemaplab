<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_employee");
    $this->load->model("m_setting");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['employee'] = $this->m_employee->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/employee/employee", $data);
    $this->load->view("attribute/footer", $setting);
  }

  
  
  public function input() {
    if ($_FILES['userfile']['name'] == '') {
      $data['employee_id']            = "";
      $data['employee_name']          = $this->input->post('employee_name');
      $data['employee_position']      = $this->input->post('employee_position');
      $data['employee_nip']           = $this->input->post('employee_nip');
      $this->session->set_flashdata('update', 'Berhasil Update Pegawai ' . $data['employee_name']);

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Tambah Data employee ".$this->input->post('employee_name');
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_employee->input($data);

    }else{

      $filename                = date('YmdHis').rand(1000,99999);
      $config['upload_path']   = './upload/employee/';
      $config['allowed_types'] = "png|jpg|jpeg";
      $config['overwrite']     = "true";
      $config['max_size']      = "20000000000";
      $config['max_width']     = "10000";
      $config['max_height']    = "10000";
      $config['file_name']     = 'employee-'.$this->input->post('employee_nip').'-'. $filename;

      $this->upload->initialize($config);
        
      if (!$this->upload->do_upload()) {
        echo $this->upload->display_errors();
        
      } else {

        $dat                            = $this->upload->data();
        $data['employee_id']            = "";
        $data['employee_name']          = $this->input->post('employee_name');
        $data['employee_position']      = $this->input->post('employee_position');
        $data['employee_nip']           = $this->input->post('employee_nip');
        $data['employee_picture']       = $dat['file_name'];
        
        $this->session->set_flashdata('add', 'Berhasil Tambah Pegawai ' . $data['employee_name']);

        $log['log_id']      = "";
        $log['log_time']    = date('Y-m-d H:i:s');
        $log['log_message'] = "Menambah Data Pegawai ".$this->input->post('employee_name');
        $log['user_id']     = $this->session->userdata('user_id');
        $this->m_setting->create_log($log);
        
        $this->m_employee->input($data);
      }
    }
    
    redirect('employee');
  }
  
  public function edit() {
    if ($_FILES['userfile']['name'] == '') {
      $data['employee_id']            = $this->input->post('employee_id');
      $data['employee_name']          = $this->input->post('employee_name');
      $data['employee_position']      = $this->input->post('employee_position');
      $data['employee_nip']           = $this->input->post('employee_nip');
      $this->session->set_flashdata('update', 'Berhasil Update Pegawai ' . $data['employee_name']);

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Mengubah Data employee ".$this->input->post('employee_name');
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_employee->edit($data);

    }else{
      $filename                = date('YmdHis').rand(1000,99999);
      $config['upload_path']   = './upload/employee/';
      $config['allowed_types'] = "png|jpg|jpeg";
      $config['overwrite']     = "true";
      $config['max_size']      = "20000000000";
      $config['max_width']     = "10000";
      $config['max_height']    = "10000";
      $config['file_name']     = 'employee-'.$this->input->post('employee_nip').'-'. $filename;

      $this->upload->initialize($config);
        
      if (!$this->upload->do_upload()) {
        echo $this->upload->display_errors();
        
      } else {
        unlink("./upload/employee/".$this->input->post('employee_picture'));
        $dat                          = $this->upload->data();
        $data['employee_id']          = $this->input->post('employee_id');
        $data['employee_name']        = $this->input->post('employee_name');
        $data['employee_position']    = $this->input->post('employee_position');
        $data['employee_nip']         = $this->input->post('employee_nip');
        $data['employee_picture']     = $dat['file_name'];
        $this->session->set_flashdata('update', 'Berhasil Update employee ' . $data['employee_name']);

        $log['log_id']      = "";
        $log['log_time']    = date('Y-m-d H:i:s');
        $log['log_message'] = "Mengubah Data employee ".$this->input->post('employee_name');
        $log['user_id']     = $this->session->userdata('user_id');
        $this->m_setting->create_log($log);
        
        $this->m_employee->edit($data);
      }
    }

    redirect('employee');
      
  }
  
  public function delete() {
    $this->m_employee->delete($this->input->post('employee_id'));
    unlink("./upload/employee/".$this->input->post('employee_picture'));
    $this->session->set_flashdata('delete', 'employee ' . $this->input->post('employee_name')." telah dihapus !");


    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data employee ".$this->input->post('employee_name');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
    redirect('employee');
  }

  
}
?>
