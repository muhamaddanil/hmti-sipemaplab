<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Proper extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_proper");
    $this->load->model("m_setting");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['proper'] = $this->m_proper->fetch_data(0);
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/proper/proper", $data);
    $this->load->view("attribute/footer", $setting);
  }


  public function taat() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['proper'] = $this->m_proper->fetch_data(2);
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/proper/proper", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function tidak_taat() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['proper'] = $this->m_proper->fetch_data(1);
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/proper/proper", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function edit() {
    $data['proper_id']       = $this->input->post('proper_id');
    $data['proper_status']   = $this->input->post('proper_status');
    $data['proper_titik_kordinat']   = $this->input->post('proper_titik_kordinat');
    $this->session->set_flashdata('update', 'Berhasil Update proper ' . $data['group_name']);

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Mengubah Data proper ".$this->input->post('proper_id');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
    
    $this->m_proper->edit($data);
    redirect('proper');
      
  }

  public function detail() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['proper_detail'] = $this->m_proper->get($this->uri->segment(3));
    $data['proper_matrix'] = $this->m_proper->fetch_data_matrix($this->uri->segment(3));
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/proper/detail", $data);
    $this->load->view("attribute/footer", $setting);
  }


  /*User Usaha*/
  public function validasi_dokling() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['proper'] = $this->m_proper->fetch_data_dokling(0);
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/proper/validasi_proper", $data);
    $this->load->view("attribute/footer", $setting);
  }


  public function input() {
    if ($_FILES['userfile']['name'] == '') {
      $data['proper_id']                      = "";
      $data['proper_nama_kegiatan']           = $this->input->post('proper_nama_kegiatan');
      $data['proper_nama_pemrakarsa']         = $this->input->post('proper_nama_pemrakarsa');
      $data['proper_alamat']                  = $this->input->post('proper_alamat');
      $data['proper_sektor']                  = $this->input->post('proper_sektor');
      $data['proper_nomor_izin']              = $this->input->post('proper_nomor_izin');
      $data['proper_jenis_dokling']           = $this->input->post('proper_jenis_dokling');
      $data['proper_tanggal_izin']            = $this->input->post('proper_tanggal_izin');
      $data['proper_pengesahan_institusi']    = $this->input->post('proper_pengesahan_institusi');
      $data['proper_pengesahan_tanggal']      = $this->input->post('proper_pengesahan_tanggal');
      $data['proper_batasan_luas']            = $this->input->post('proper_batasan_luas');
      $data['proper_batasan_produksi']        = $this->input->post('proper_batasan_produksi');
      $data['user_id']                        = $this->session->userdata('user_id');
      $this->session->set_flashdata('add', 'Berhasil Tambah Pengajuan DokLing');

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Tambah Data Pengajuan Dokling";
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_proper->input($data);

    }else{

      $filename                = date('YmdHis').rand(1000,99999);
      $config['upload_path']   = './upload/proper/dokumen/';
      $config['allowed_types'] = "doc|docx|xls|xlsx|pdf|png|jpg|jpeg";
      $config['overwrite']     = "true";
      $config['max_size']      = "20000000000";
      $config['max_width']     = "10000";
      $config['max_height']    = "10000";
      $config['file_name']     = 'dokling-'.$this->session->userdata('user_id').'-'. $filename;

      $this->upload->initialize($config);
        
      if (!$this->upload->do_upload()) {
        echo $this->upload->display_errors();
        
      } else {

        $dat                                    = $this->upload->data();
        $data['proper_id']                      = "";
        $data['proper_nama_kegiatan']           = $this->input->post('proper_nama_kegiatan');
        $data['proper_nama_pemrakarsa']         = $this->input->post('proper_nama_pemrakarsa');
        $data['proper_alamat']                  = $this->input->post('proper_alamat');
        $data['proper_sektor']                  = $this->input->post('proper_sektor');
        $data['proper_nomor_izin']              = $this->input->post('proper_nomor_izin');
        $data['proper_jenis_dokling']           = $this->input->post('proper_jenis_dokling');
        $data['proper_tanggal_izin']            = $this->input->post('proper_tanggal_izin');
        $data['proper_pengesahan_institusi']    = $this->input->post('proper_pengesahan_institusi');
        $data['proper_pengesahan_tanggal']      = $this->input->post('proper_pengesahan_tanggal');
        $data['proper_batasan_luas']            = $this->input->post('proper_batasan_luas');
        $data['proper_batasan_produksi']        = $this->input->post('proper_batasan_produksi');
        $data['user_id']                        = $this->session->userdata('user_id');
        $data['proper_lampiran']                = $dat['file_name'];
        
        $this->session->set_flashdata('add', 'Berhasil Tambah Pengajuan DokLing');

        $log['log_id']      = "";
        $log['log_time']    = date('Y-m-d H:i:s');
        $log['log_message'] = "Tambah Data Pengajuan Dokling ";
        $log['user_id']     = $this->session->userdata('user_id');
        $this->m_setting->create_log($log);
        
        $this->m_proper->input($data);
      }
    }
    
    redirect('proper/validasi_dokling');
  }


  public function update() {
    if ($_FILES['userfile']['name'] == '') {
      $data['proper_id']                      = $this->input->post('proper_id');
      $data['proper_nama_kegiatan']           = $this->input->post('proper_nama_kegiatan');
      $data['proper_nama_pemrakarsa']         = $this->input->post('proper_nama_pemrakarsa');
      $data['proper_alamat']                  = $this->input->post('proper_alamat');
      $data['proper_sektor']                  = $this->input->post('proper_sektor');
      $data['proper_nomor_izin']              = $this->input->post('proper_nomor_izin');
      $data['proper_jenis_dokling']           = $this->input->post('proper_jenis_dokling');
      $data['proper_tanggal_izin']            = $this->input->post('proper_tanggal_izin');
      $data['proper_pengesahan_institusi']    = $this->input->post('proper_pengesahan_institusi');
      $data['proper_pengesahan_tanggal']      = $this->input->post('proper_pengesahan_tanggal');
      $data['proper_batasan_luas']            = $this->input->post('proper_batasan_luas');
      $data['proper_batasan_produksi']        = $this->input->post('proper_batasan_produksi');
      $data['user_id']                        = $this->session->userdata('user_id');
      $this->session->set_flashdata('update', 'Berhasil Edit Pengajuan DokLing');

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Update Data Pengajuan Dokling";
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_proper->edit($data);

    }else{

      $filename                = date('YmdHis').rand(1000,99999);
      $config['upload_path']   = './upload/proper/dokumen/';
      $config['allowed_types'] = "doc|docx|xls|xlsx|pdf|png|jpg|jpeg";
      $config['overwrite']     = "true";
      $config['max_size']      = "20000000000";
      $config['max_width']     = "10000";
      $config['max_height']    = "10000";
      $config['file_name']     = 'dokling-'.$this->session->userdata('user_id').'-'. $filename;

      $this->upload->initialize($config);
        
      if (!$this->upload->do_upload()) {
        echo $this->upload->display_errors();
        
      } else {
        unlink("./upload/proper/dokumen/".$this->input->post('proper_lampiran'));
        $dat                                    = $this->upload->data();
        $data['proper_id']                      = $this->input->post('proper_id');
        $data['proper_nama_kegiatan']           = $this->input->post('proper_nama_kegiatan');
        $data['proper_nama_pemrakarsa']         = $this->input->post('proper_nama_pemrakarsa');
        $data['proper_alamat']                  = $this->input->post('proper_alamat');
        $data['proper_sektor']                  = $this->input->post('proper_sektor');
        $data['proper_nomor_izin']              = $this->input->post('proper_nomor_izin');
        $data['proper_jenis_dokling']           = $this->input->post('proper_jenis_dokling');
        $data['proper_tanggal_izin']            = $this->input->post('proper_tanggal_izin');
        $data['proper_pengesahan_institusi']    = $this->input->post('proper_pengesahan_institusi');
        $data['proper_pengesahan_tanggal']      = $this->input->post('proper_pengesahan_tanggal');
        $data['proper_batasan_luas']            = $this->input->post('proper_batasan_luas');
        $data['proper_batasan_produksi']        = $this->input->post('proper_batasan_produksi');
        $data['user_id']                        = $this->session->userdata('user_id');
        $data['proper_lampiran']                = $dat['file_name'];
        
        $this->session->set_flashdata('update', 'Berhasil Update Pengajuan DokLing');

        $log['log_id']      = "";
        $log['log_time']    = date('Y-m-d H:i:s');
        $log['log_message'] = "Update Data Pengajuan Dokling ";
        $log['user_id']     = $this->session->userdata('user_id');
        $this->m_setting->create_log($log);
        
        $this->m_proper->edit($data);
      }
    }
    
    redirect('proper/validasi_dokling');
  }


  public function delete() {
    $this->m_proper->delete($this->input->post('proper_id'));
    unlink("./upload/proper/dokumen/".$this->input->post('proper_lampiran'));
    $this->session->set_flashdata('delete', 'Proper ' . $this->input->post('proper_nama_kegiatan')." telah dihapus !");

    $getAllMatrix = $this->m_proper->fetch_data_matrix($this->input->post('proper_id'));
    foreach ($getAllMatrix as $key) {
      # code...
      unlink("./upload/proper/matrix/".$key->proper_matriks_lampiran);
      $this->m_proper->delete_matriks($key->proper_matriks_id);
    }


    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data Proper ".$this->input->post('proper_nama_kegiatan');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
   redirect('proper/validasi_dokling');
  }


  /*Matrix Proper*/
  public function matrix() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['proper'] = $this->m_proper->fetch_data_matrix($this->uri->segment(3));
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/proper/matriks", $data);
    $this->load->view("attribute/footer", $setting);
  }



  public function input_matriks() {
    if ($_FILES['userfile']['name'] == '') {
      $data['proper_matriks_id']                = "";
      $data['proper_matriks_tahapan']           = $this->input->post('proper_matriks_tahapan');
      $data['proper_matriks_kegiatan']          = $this->input->post('proper_matriks_kegiatan');
      $data['proper_matriks_sumber_dampak']     = $this->input->post('proper_matriks_sumber_dampak');
      $data['proper_matriks_jenis_limbah']      = $this->input->post('proper_matriks_jenis_limbah');
      $data['proper_matriks_create']            = date('Y-m-d');
      $data['proper_id']                        = $this->input->post('proper_id');
      $this->session->set_flashdata('add', 'Berhasil Tambah Matriks');

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Tambah Data Pengajuan Matriks";
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_proper->input_matriks($data);

    }else{

      $filename                = date('YmdHis').rand(1000,99999);
      $config['upload_path']   = './upload/proper/matrix/';
      $config['allowed_types'] = "doc|docx|xls|xlsx|pdf|png|jpg|jpeg";
      $config['overwrite']     = "true";
      $config['max_size']      = "20000000000";
      $config['max_width']     = "10000";
      $config['max_height']    = "10000";
      $config['file_name']     = 'matriks-'.$this->session->userdata('user_id').'-'. $filename;

      $this->upload->initialize($config);
        
      if (!$this->upload->do_upload()) {
        echo $this->upload->display_errors();
        
      } else {

        $dat                                    = $this->upload->data();
        $data['proper_matriks_id']                = "";
        $data['proper_matriks_tahapan']           = $this->input->post('proper_matriks_tahapan');
        $data['proper_matriks_kegiatan']          = $this->input->post('proper_matriks_kegiatan');
        $data['proper_matriks_sumber_dampak']     = $this->input->post('proper_matriks_sumber_dampak');
        $data['proper_matriks_jenis_limbah']      = $this->input->post('proper_matriks_jenis_limbah');
        $data['proper_matriks_create']            = date('Y-m-d');
        $data['proper_id']                        = $this->input->post('proper_id');
        $data['proper_matriks_lampiran']          = $dat['file_name'];
        
        $this->session->set_flashdata('add', 'Berhasil Tambah Matriks');

        $log['log_id']      = "";
        $log['log_time']    = date('Y-m-d H:i:s');
        $log['log_message'] = "Tambah Data Pengajuan Matriks ";
        $log['user_id']     = $this->session->userdata('user_id');
        $this->m_setting->create_log($log);
        
        $this->m_proper->input_matriks($data);
      }
    }
    
    redirect('proper/matrix/'.$data['proper_id']);
  }


  public function update_matriks() {
    if ($_FILES['userfile']['name'] == '') {
      $data['proper_matriks_id']                = $this->input->post('proper_matriks_id');
      $data['proper_matriks_tahapan']           = $this->input->post('proper_matriks_tahapan');
      $data['proper_matriks_kegiatan']          = $this->input->post('proper_matriks_kegiatan');
      $data['proper_matriks_sumber_dampak']     = $this->input->post('proper_matriks_sumber_dampak');
      $data['proper_matriks_jenis_limbah']      = $this->input->post('proper_matriks_jenis_limbah');
      $data['proper_matriks_update']            = date('Y-m-d');
      $data['proper_id']                        = $this->input->post('proper_id');
      $this->session->set_flashdata('update', 'Berhasil Update Matriks');

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Update Data Pengajuan Matriks";
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_proper->edit_matriks($data);

    }else{

      $filename                = date('YmdHis').rand(1000,99999);
      $config['upload_path']   = './upload/proper/matrix/';
      $config['allowed_types'] = "doc|docx|xls|xlsx|pdf|png|jpg|jpeg";
      $config['overwrite']     = "true";
      $config['max_size']      = "20000000000";
      $config['max_width']     = "10000";
      $config['max_height']    = "10000";
      $config['file_name']     = 'matriks-'.$this->session->userdata('user_id').'-'. $filename;

      $this->upload->initialize($config);
        
      if (!$this->upload->do_upload()) {
        echo $this->upload->display_errors();
        
      } else {
        unlink("./upload/proper/matrix/".$this->input->post('proper_matriks_lampiran'));
        $dat                                    = $this->upload->data();
        $data['proper_matriks_id']                = "";
        $data['proper_matriks_tahapan']           = $this->input->post('proper_matriks_tahapan');
        $data['proper_matriks_kegiatan']          = $this->input->post('proper_matriks_kegiatan');
        $data['proper_matriks_sumber_dampak']     = $this->input->post('proper_matriks_sumber_dampak');
        $data['proper_matriks_jenis_limbah']      = $this->input->post('proper_matriks_jenis_limbah');
        $data['proper_matriks_update']            = date('Y-m-d');
        $data['proper_id']                        = $this->input->post('proper_id');
        $data['proper_matriks_lampiran']          = $dat['file_name'];
        
        $this->session->set_flashdata('update', 'Berhasil Update Matriks');

        $log['log_id']      = "";
        $log['log_time']    = date('Y-m-d H:i:s');
        $log['log_message'] = "Update Data Pengajuan Matriks ";
        $log['user_id']     = $this->session->userdata('user_id');
        $this->m_setting->create_log($log);
        
        $this->m_proper->update_matriks($data);
      }
    }
    
    redirect('proper/matrix/'.$data['proper_id']);
  }

  public function delete_matriks() {
    $this->m_proper->delete_matriks($this->input->post('proper_matriks_id'));
    unlink("./upload/proper/matrix/".$this->input->post('proper_matriks_lampiran'));
    $this->session->set_flashdata('delete', 'Tahapan ' . $this->input->post('proper_matriks_tahapan')." telah dihapus !");


    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data Tahapan Matrix ".$this->input->post('proper_matriks_tahapan');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
   redirect('proper/matrix/'.$this->input->post('proper_id'));
  }

  
  
  

  
}
?>
