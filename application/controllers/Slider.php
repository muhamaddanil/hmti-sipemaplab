<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_slider");
    $this->load->model("m_setting");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['slider'] = $this->m_slider->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/slider/slider", $data);
    $this->load->view("attribute/footer", $setting);
  }

  
  
  public function input() {
    $filename                = date('YmdHis').rand(1000,99999);
    $config['upload_path']   = './upload/slider/';
    $config['allowed_types'] = "png|jpg|jpeg";
    $config['overwrite']     = "true";
    $config['max_size']      = "20000000000";
    $config['max_width']     = "10000";
    $config['max_height']    = "10000";
    $config['file_name']     = 'slider-'. $filename;

    $this->upload->initialize($config);
      
    if (!$this->upload->do_upload()) {
      echo $this->upload->display_errors();
      
    } else {

      $dat                        = $this->upload->data();
      $data['slider_id']            = "";
      $data['slider_big_title']     = $this->input->post('slider_big_title');
      $data['slider_text']          = $this->input->post('slider_text');
      $data['slider_picture']       = $dat['file_name'];
      
      $this->session->set_flashdata('add', 'Berhasil Tambah Alur ' . $data['slider_big_title']);

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Menambah Data slider ".$this->input->post('slider_big_title');
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_slider->input($data);
    }
    
    
    redirect('slider');
  }
  
  public function edit() {
    if ($_FILES['userfile']['name'] == '') {
      $data['slider_id']            = $this->input->post('slider_id');
      $data['slider_big_title']     = $this->input->post('slider_big_title');
      $data['slider_text']          = $this->input->post('slider_text');
      $this->session->set_flashdata('update', 'Berhasil Update Alur ' . $data['slider_big_title']);

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Mengubah Data slider ".$this->input->post('slider_big_title');
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_slider->edit($data);

    }else{
      $filename                = date('YmdHis').rand(1000,99999);
      $config['upload_path']   = './upload/slider/';
      $config['allowed_types'] = "png|jpg|jpeg";
      $config['overwrite']     = "true";
      $config['max_size']      = "20000000000";
      $config['max_width']     = "10000";
      $config['max_height']    = "10000";
      $config['file_name']     = 'slider-'. $filename;

      $this->upload->initialize($config);
        
      if (!$this->upload->do_upload()) {
        echo $this->upload->display_errors();
        
      } else {
        unlink("./upload/slider/".$this->input->post('slider_picture'));
        $dat                        = $this->upload->data();
        $data['slider_id']          = $this->input->post('slider_id');
        $data['slider_big_title']   = $this->input->post('slider_big_title');
        $data['slider_text']        = $this->input->post('slider_text');
        $data['slider_picture']     = $dat['file_name'];
        $this->session->set_flashdata('update', 'Berhasil Update Alur ' . $data['slider_big_title']);

        $log['log_id']      = "";
        $log['log_time']    = date('Y-m-d H:i:s');
        $log['log_message'] = "Mengubah Data slider ".$this->input->post('slider_big_title');
        $log['user_id']     = $this->session->userdata('user_id');
        $this->m_setting->create_log($log);
        
        $this->m_slider->edit($data);
      }
    }

    redirect('slider');
      
  }
  
  public function delete() {
    $this->m_slider->delete($this->input->post('slider_id'));
    unlink("./upload/slider/".$this->input->post('slider_picture'));
    $this->session->set_flashdata('delete', 'slider ' . $this->input->post('slider_big_title')." telah dihapus !");


    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data slider ".$this->input->post('slider_big_title');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
    redirect('slider');
  }

  
}
?>
