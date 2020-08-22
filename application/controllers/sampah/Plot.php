<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Plot extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_plot");
    $this->load->model("m_setting");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['plot'] = $this->m_plot->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/plot/plot", $data);
    $this->load->view("attribute/footer", $setting);
  }

  
  
  public function input() {
    $filename                = date('YmdHis').rand(1000,99999);
    $config['upload_path']   = './upload/plot/';
    $config['allowed_types'] = "png|jpg|jpeg|doc|docx|ppt|pptx|xls|xlsx|pdf";
    $config['overwrite']     = "true";
    $config['max_size']      = "20000000000";
    $config['max_width']     = "10000";
    $config['max_height']    = "10000";
    $config['file_name']     = 'plot-'. $filename;

    $this->upload->initialize($config);
      
    if (!$this->upload->do_upload()) {
      echo $this->upload->display_errors();
      
    } else {

      $dat                        = $this->upload->data();
      $data['plot_id']            = "";
      $data['plot_name']          = $this->input->post('plot_name');
      $data['plot_file']          = $dat['file_name'];
      
      $this->session->set_flashdata('add', 'Berhasil Tambah Alur ' . $data['plot_name']);

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Menambah Data plot ".$this->input->post('plot_name');
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_plot->input($data);
    }
    
    
    redirect('plot');
  }
  
  public function edit() {
    if ($_FILES['userfile']['name'] == '') {
      $data['plot_id']            = $this->input->post('plot_id');
      $data['plot_name']          = $this->input->post('plot_name');
      $this->session->set_flashdata('update', 'Berhasil Update Alur ' . $data['plot_name']);

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Mengubah Data plot ".$this->input->post('plot_name');
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_plot->edit($data);

    }else{
      $filename                = date('YmdHis').rand(1000,99999);
      $config['upload_path']   = './upload/plot/';
      $config['allowed_types'] = "png|jpg|jpeg|doc|docx|ppt|pptx|xls|xlsx|pdf";
      $config['overwrite']     = "true";
      $config['max_size']      = "20000000000";
      $config['max_width']     = "10000";
      $config['max_height']    = "10000";
      $config['file_name']     = 'plot-'. $filename;

      $this->upload->initialize($config);
        
      if (!$this->upload->do_upload()) {
        echo $this->upload->display_errors();
        
      } else {
        unlink("./upload/plot/".$this->input->post('plot_file'));
        $dat                        = $this->upload->data();
        $data['plot_id']            = $this->input->post('plot_id');
        $data['plot_name']          = $this->input->post('plot_name');
        $data['plot_file']          = $dat['file_name'];
        $this->session->set_flashdata('update', 'Berhasil Update Alur ' . $data['plot_name']);

        $log['log_id']      = "";
        $log['log_time']    = date('Y-m-d H:i:s');
        $log['log_message'] = "Mengubah Data plot ".$this->input->post('plot_name');
        $log['user_id']     = $this->session->userdata('user_id');
        $this->m_setting->create_log($log);
        
        $this->m_plot->edit($data);
      }
    }

    redirect('plot');
      
  }
  
  public function delete() {
    $this->m_plot->delete($this->input->post('plot_id'));
    unlink("./upload/plot/".$this->input->post('plot_file'));
    $this->session->set_flashdata('delete', 'plot ' . $this->input->post('plot_name')." telah dihapus !");


    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data plot ".$this->input->post('plot_name');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
    redirect('plot');
  }

  
}
?>
