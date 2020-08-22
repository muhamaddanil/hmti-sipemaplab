<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rules extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_rules");
    $this->load->model("m_rules_category");
    $this->load->model("m_setting");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['rules'] = $this->m_rules->fetch_data();
    $data['jenis']   = $this->m_rules_category->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/rules/rules", $data);
    $this->load->view("attribute/footer", $setting);
  }

  
  
  public function input() {
    $filename                = date('YmdHis').rand(1000,99999);
    $config['upload_path']   = './upload/rules/';
    $config['allowed_types'] = "pdf";
    $config['overwrite']     = "true";
    $config['max_size']      = "20000000000";
    $config['max_width']     = "10000";
    $config['max_height']    = "10000";
    $config['file_name']     = 'doc-'.$this->input->post('rules_category_id').'-'. $filename;

    $this->upload->initialize($config);
      
    if (!$this->upload->do_upload()) {
      echo $this->upload->display_errors();
      
    } else {

      $dat                            = $this->upload->data();
      $data['rules_id']               = "";
      $data['rules_name']             = $this->input->post('rules_name');
      $data['rules_file']             = $dat['file_name'];
      $data['rules_category_id']      = $this->input->post('rules_category_id');
      $this->session->set_flashdata('add', 'Berhasil Tambah Aturan ' . $data['rules_name']);

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Menambah Data Aturan ".$this->input->post('rules_name');
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_rules->input($data);
    }
    
    redirect('rules');
  }
  
  public function edit() {
    if ($_FILES['userfile']['name'] == '') {
      $data['rules_id']             = $this->input->post('rules_id');
      $data['rules_name']           = $this->input->post('rules_name');
      $data['rules_category_id']    = $this->input->post('rules_category_id');
      $this->session->set_flashdata('update', 'Berhasil Update Aturan ' . $data['rules_name']);

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Mengubah Data rules ".$this->input->post('rules_name');
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_rules->edit($data);

    }else{
      $filename                = date('YmdHis').rand(1000,99999);
      $config['upload_path']   = './upload/rules/';
      $config['allowed_types'] = "pdf";
      $config['overwrite']     = "true";
      $config['max_size']      = "20000000000";
      $config['max_width']     = "10000";
      $config['max_height']    = "10000";
      $config['file_name']     = 'doc-'.$this->input->post('rules_category_id').'-'. $filename;

      $this->upload->initialize($config);
        
      if (!$this->upload->do_upload()) {
        echo $this->upload->display_errors();
        
      } else {
        unlink("./upload/rules/".$this->input->post('rules_file'));
        $dat                          = $this->upload->data();
        $data['rules_id']             = $this->input->post('rules_id');
        $data['rules_name']           = $this->input->post('rules_name');
        $data['rules_file']           = $dat['file_name'];
        $data['rules_category_id']    = $this->input->post('rules_category_id');
        $this->session->set_flashdata('update', 'Berhasil Update rules ' . $data['rules_name']);

        $log['log_id']      = "";
        $log['log_time']    = date('Y-m-d H:i:s');
        $log['log_message'] = "Mengubah Data rules ".$this->input->post('rules_name');
        $log['user_id']     = $this->session->userdata('user_id');
        $this->m_setting->create_log($log);
        
        $this->m_rules->edit($data);
      }
    }

    redirect('rules');
      
  }
  
  public function delete() {
    $this->m_rules->delete($this->input->post('rules_id'));
    unlink("./upload/rules/".$this->input->post('rules_file'));
    $this->session->set_flashdata('delete', 'rules ' . $this->input->post('rules_name')." telah dihapus !");


    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data rules ".$this->input->post('rules_name');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
    redirect('rules');
  }

  
}
?>
