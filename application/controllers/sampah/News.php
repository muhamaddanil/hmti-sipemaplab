<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_news");
    $this->load->model("m_news_category");
    $this->load->model("m_setting");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['news'] = $this->m_news->fetch_data();
    $data['jenis']   = $this->m_news_category->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/news/news", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function add() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['jenis']   = $this->m_news_category->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/news/news_add", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function update() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['jenis']   = $this->m_news_category->fetch_data();
    $data['news']    = $this->m_news->get($this->uri->segment(3));
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/news/news_edit", $data);
    $this->load->view("attribute/footer", $setting);
  }

  
  
  public function input() {
    $filename                = date('YmdHis').rand(1000,99999);
    $config['upload_path']   = './upload/news/';
    $config['allowed_types'] = "png|jpg|jpeg";
    $config['overwrite']     = "true";
    $config['max_size']      = "20000000000";
    $config['max_width']     = "10000";
    $config['max_height']    = "10000";
    $config['file_name']     = 'news-'.$this->input->post('news_category_id').'-'. $filename;

    $this->upload->initialize($config);
      
    if (!$this->upload->do_upload()) {
      echo $this->upload->display_errors();
      
    } else {

      $dat                           = $this->upload->data();
      $data['news_id']               = "";
      $data['news_title']            = $this->input->post('news_title');
      $data['news_text']             = $this->input->post('news_text');
      $data['news_author']           = $this->input->post('news_author');
      $data['news_date']             = $this->input->post('news_date');
      $data['news_picture']          = $dat['file_name'];
      $data['news_category_id']      = $this->input->post('news_category_id');
      $this->session->set_flashdata('add', 'Berhasil Tambah Berita ' . $data['news_title']);

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Menambah Data Berita ".$this->input->post('news_title');
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_news->input($data);
    }
    
    redirect('news');
  }
  
  public function edit() {
    if ($_FILES['userfile']['name'] == '') {
      $data['news_id']             = $this->input->post('news_id');
      $data['news_title']          = $this->input->post('news_title');
      $data['news_text']           = $this->input->post('news_text');
      $data['news_author']         = $this->input->post('news_author');
      $data['news_date']           = $this->input->post('news_date');
      $data['news_category_id']    = $this->input->post('news_category_id');
      $this->session->set_flashdata('update', 'Berhasil Update Berita ' . $data['news_title']);

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Mengubah Data news ".$this->input->post('news_title');
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_news->edit($data);

    }else{
      $filename                = date('YmdHis').rand(1000,99999);
      $config['upload_path']   = './upload/news/';
      $config['allowed_types'] = "png|jpg|jpeg";
      $config['overwrite']     = "true";
      $config['max_size']      = "20000000000";
      $config['max_width']     = "10000";
      $config['max_height']    = "10000";
      $config['file_name']     = 'news-'.$this->input->post('news_category_id').'-'. $filename;

      $this->upload->initialize($config);
        
      if (!$this->upload->do_upload()) {
        echo $this->upload->display_errors();
        
      } else {
        unlink("./upload/news/".$this->input->post('news_picture'));
        $dat                          = $this->upload->data();
        $data['news_id']              = $this->input->post('news_id');
        $data['news_title']           = $this->input->post('news_title');
        $data['news_text']            = $this->input->post('news_text');
        $data['news_author']          = $this->input->post('news_author');
        $data['news_date']            = $this->input->post('news_date');
        $data['news_picture']         = $dat['file_name'];
        $data['news_category_id']     = $this->input->post('news_category_id');
        $this->session->set_flashdata('update', 'Berhasil Update news ' . $data['news_title']);

        $log['log_id']      = "";
        $log['log_time']    = date('Y-m-d H:i:s');
        $log['log_message'] = "Mengubah Data news ".$this->input->post('news_title');
        $log['user_id']     = $this->session->userdata('user_id');
        $this->m_setting->create_log($log);
        
        $this->m_news->edit($data);
      }
    }

    redirect('news');
      
  }
  
  public function delete() {
    $this->m_news->delete($this->input->post('news_id'));
    unlink("./upload/news/".$this->input->post('news_picture'));
    $this->session->set_flashdata('delete', 'news ' . $this->input->post('news_title')." telah dihapus !");


    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data news ".$this->input->post('news_title');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
    redirect('news');
  }

  
}
?>
