<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gallery extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_gallery");
    $this->load->model("m_setting");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['gallery'] = $this->m_gallery->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/gallery/gallery", $data);
    $this->load->view("attribute/footer", $setting);
  }

  
  
  public function input() {
    $filename                = date('YmdHis').rand(1000,99999);
    $config['upload_path']   = './upload/gallery/';
    $config['allowed_types'] = "png|jpg|jpeg|mp4|mkv|avi";
    $config['overwrite']     = "true";
    $config['max_size']      = "20000000000";
    $config['max_width']     = "10000";
    $config['max_height']    = "10000";
    $config['file_name']     = 'gallery-'.$this->input->post('gallery_category').'-'. $filename;

    $this->upload->initialize($config);
      
    if (!$this->upload->do_upload()) {
      echo $this->upload->display_errors();
      
    } else {

      $dat                            = $this->upload->data();
      $data['gallery_id']            = "";
      $data['gallery_name']          = $this->input->post('gallery_name');
      $data['gallery_category']      = $this->input->post('gallery_category');
      $data['gallery_date']          = $this->input->post('gallery_date');
      $data['gallery_file']          = $dat['file_name'];
      
      $this->session->set_flashdata('add', 'Berhasil Tambah Gallery ' . $data['gallery_name']);

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Menambah Data Gallery ".$this->input->post('gallery_name');
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_gallery->input($data);
    }
    
    
    redirect('gallery');
  }
  
  public function edit() {
    if ($_FILES['userfile']['name'] == '') {
      $data['gallery_id']            = $this->input->post('gallery_id');
      $data['gallery_name']          = $this->input->post('gallery_name');
      $data['gallery_category']      = $this->input->post('gallery_category');
      $data['gallery_date']          = $this->input->post('gallery_date');
      $this->session->set_flashdata('update', 'Berhasil Update Gallery ' . $data['gallery_name']);

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Mengubah Data gallery ".$this->input->post('gallery_name');
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_gallery->edit($data);

    }else{
      $filename                = date('YmdHis').rand(1000,99999);
      $config['upload_path']   = './upload/gallery/';
      $config['allowed_types'] = "png|jpg|jpeg";
      $config['overwrite']     = "true";
      $config['max_size']      = "20000000000";
      $config['max_width']     = "10000";
      $config['max_height']    = "10000";
      $config['file_name']     = 'gallery-'.$this->input->post('gallery_category').'-'. $filename;

      $this->upload->initialize($config);
        
      if (!$this->upload->do_upload()) {
        echo $this->upload->display_errors();
        
      } else {
        unlink("./upload/gallery/".$this->input->post('gallery_file'));
        $dat                          = $this->upload->data();
        $data['gallery_id']          = $this->input->post('gallery_id');
        $data['gallery_name']          = $this->input->post('gallery_name');
        $data['gallery_category']      = $this->input->post('gallery_category');
        $data['gallery_date']          = $this->input->post('gallery_date');
        $data['gallery_file']     = $dat['file_name'];
        $this->session->set_flashdata('update', 'Berhasil Update gallery ' . $data['gallery_name']);

        $log['log_id']      = "";
        $log['log_time']    = date('Y-m-d H:i:s');
        $log['log_message'] = "Mengubah Data gallery ".$this->input->post('gallery_name');
        $log['user_id']     = $this->session->userdata('user_id');
        $this->m_setting->create_log($log);
        
        $this->m_gallery->edit($data);
      }
    }

    redirect('gallery');
      
  }
  
  public function delete() {
    $this->m_gallery->delete($this->input->post('gallery_id'));
    unlink("./upload/gallery/".$this->input->post('gallery_file'));
    $this->session->set_flashdata('delete', 'gallery ' . $this->input->post('gallery_name')." telah dihapus !");


    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data gallery ".$this->input->post('gallery_name');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
    redirect('gallery');
  }

  
}
?>
