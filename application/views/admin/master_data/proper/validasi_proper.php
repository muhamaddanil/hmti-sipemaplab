<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah Seniman Proper';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update Seniman Proper';
    }else if($this->session->flashdata('delete')){
      $message = $this->session->flashdata('delete');
      $heading = '#Delete Seniman Proper';  
    } 
  ?>
  <?php if(isset($message)){ ?>
  <script>
    $(document).ready(function(){
      $.toast({
        text : '<?php echo $message;?>',
        heading : '<?php echo $heading;?>',
        position : 'top-right',
        width : 'auto',
        showHideTransition : 'slide',
        icon: 'info',
        hideAfter: 5000
      })
    });
  </script>
  <?php } ?>
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Seniman Proper : <?php echo $this->session->userdata('user_fullname')?></h1>
  <p class="mb-4">Data berikut merupakan kumpulan pengajuan DokLing (Dokumen Lingkungan) di <b>Dinas Lingkungan Hidup dan Kehutanan</b> - Kota Kendari</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#senimanModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data Pengajuan</span>
      </a>
      
      <!-- Seniman Proper Modal-->
      <div class="modal fade" id="senimanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Pengajuan DokLing Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("proper/input")?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Nama Kegiatan</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Kegiatan..." name="proper_nama_kegiatan" required="required" value="<?php echo $this->session->userdata('user_bussiness')?>">
              </div>
               <div class="form-group">
                <label for=""><b>Nama Pemrakarsa</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Pemrakarsa..." name="proper_nama_pemrakarsa" required="required" value="<?php echo $this->session->userdata('user_fullname')?>">
              </div>
              <div class="form-group">
                <label for=""><b>Alamat Kegiatan</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Alamat Kegiatan..." name="proper_alamat" required="required" value="<?php echo $this->session->userdata('user_address')?>">
              </div>
              <div class="form-group">
                <label for=""><b>Sektor Kegiatan</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Sektor Kegiatan..." name="proper_sektor" required="required" value="<?php echo $this->session->userdata('user_sector')?>">
              </div>
              <hr>
              <div class="form-group">
                <label for=""><b>No. Izin</b></label>
                <input type="text" class="form-control" placeholder="Masukkan No Izin Kegiatan..." name="proper_nomor_izin" required="required">
              </div>

              <div class="form-group">
                <label for=""><b>Jenis DokLing</b></label>
                <select class="form-control" name="proper_jenis_dokling" required="required">
                  <option value="">-Pilih Jenis DokLing-</option>
                  <option value="UKL-UPL">UKL-UPL</option>
                  <option value="AMDAL">AMDAL</option>
                  <option value="SPPL">SPPL</option>
                </select>
              </div>

              <div class="form-group">
                <label for=""><b>Tanggal Izin</b></label>
                <input type="date" class="form-control" placeholder="Masukkan Tanggal Izin..." name="proper_tanggal_izin" required="required">
              </div>
              <hr>

              <div class="form-group">
                <label for=""><b>Institusi yang Mengesahkan</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Institusi yang Mengesahkan..." name="proper_pengesahan_institusi" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Tanggal disahkan</b></label>
                <input type="date" class="form-control" placeholder="Masukkan Tanggal disahkan..." name="proper_pengesahan_tanggal" required="required">
              </div>
              <hr>


              <div class="form-group">
                <label for=""><b>Batasan Luas</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Batasan Luas Kegiatan..." name="proper_batasan_luas" required="required">
              </div>

              <div class="form-group">
                <label for=""><b>Batasan Produksi</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Batasan Produksi Kegiatan..." name="proper_batasan_produksi" required="required">
              </div>

              <div class="form-group">
                <label for=""><b>Dokumen Lingkungan</b></label>
                <input type="file" class="form-control" name="userfile">
              </div>
              
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Tambah</button>
            <?php echo form_close(); ?>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
              
            </div>
          </div>
        </div>
      </div>
      


      <a href="<?php echo site_url('proper/validasi_dokling')?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Refresh Halaman</span>
      </a>

      
      

      <!--  -->
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%;">No</th>
              <th style="width: 19%;">#</th>
              <th>Nama Jenis Usaha</th>
              <th>Nama Pemrakarsa</th>
              <th>No. Izin</th>
              <th>Lampiran</th>
              <th>Status</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($proper as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              <td>
                
                <a href="<?php echo site_url('proper/matrix/'.$key->proper_id)?>" class="btn btn-success btn-icon-split btn-sm">
                  <span class="text">
                    Matriks <i class="fa fa-calendar-alt"></i>
                  </span>
                </a> | 


                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#properEditModal<?php echo $key->proper_id?>">
                  <span class="text">
                    <i class="fa fa-edit"></i>
                  </span>
                </a>
                <?php if($key->proper_status==0){?>
                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#properRemoveModal<?php echo $key->proper_id?>">
                  <span class="text">
                    <i class="fa fa-trash"></i>
                  </span>
                </a>
                <?php }?>


              </td>
              <td><?php echo $key->proper_nama_kegiatan?></td>
              <td><?php echo $key->proper_nama_pemrakarsa?></td>
              <td><?php echo $key->proper_nomor_izin."/".$key->proper_tanggal_izin?></td>
              <td><a href="<?php echo base_url();?>upload/proper/dokumen/<?php echo $key->proper_lampiran;?>" target="_blank">Download</a></td>
              <td>
                  <?php 
                    if($key->proper_status==0){
                      echo "<span class='badge badge-warning'>Belum Diproses</span>";
                    }elseif($key->proper_status==1){
                      echo "<span class='badge badge-danger'>Tidak Taat</span>";
                    }else{
                      echo "<span class='badge badge-success'>Taat</span>";
                    }
                  ?>
                  
              </td>
            </tr>

            <!-- Looping Modal Area -->

            

            <!-- Seniman Proper Modal-->
            <div class="modal fade" id="properEditModal<?php echo $key->proper_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Pengajuan DokLing </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open_multipart("proper/update")?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for=""><b>Nama Kegiatan</b></label>
                      <input type="hidden" class="form-control" name="proper_id" required="required" value="<?php echo $key->proper_id;?>">
                      <input type="hidden" class="form-control" name="proper_lampiran" required="required" value="<?php echo $key->proper_lampiran;?>">
                      <input type="text" class="form-control" placeholder="Masukkan Nama Kegiatan..." name="proper_nama_kegiatan" required="required" value="<?php echo $key->proper_nama_kegiatan;?>">
                    </div>
                     <div class="form-group">
                      <label for=""><b>Nama Pemrakarsa</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Nama Pemrakarsa..." name="proper_nama_pemrakarsa" required="required" value="<?php echo $key->proper_nama_pemrakarsa;?>">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Alamat Kegiatan</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Alamat Kegiatan..." name="proper_alamat" required="required" value="<?php echo $key->proper_alamat;?>">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Sektor Kegiatan</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Sektor Kegiatan..." name="proper_sektor" required="required" value="<?php echo $key->proper_sektor;?>">
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for=""><b>No. Izin</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan No Izin Kegiatan..." name="proper_nomor_izin" required="required" value="<?php echo $key->proper_nomor_izin;?>">
                    </div>

                    <div class="form-group">
                      <label for=""><b>Jenis DokLing</b></label>
                      <select class="form-control" name="proper_jenis_dokling" required="required">
                        <option value="">-Pilih Jenis DokLing-</option>
                        <?php if($key->proper_jenis_dokling=='UKL-UPL'){?>
                        <option value="UKL-UPL" selected>UKL-UPL</option>
                        <option value="AMDAL">AMDAL</option>
                        <option value="SPPL">SPPL</option>
                        <?php }elseif($key->proper_jenis_dokling=='AMDAL'){?>
                        <option value="UKL-UPL">UKL-UPL</option>
                        <option value="AMDAL" selected>AMDAL</option>
                        <option value="SPPL">SPPL</option>
                        <?php }else{ ?>
                        <option value="UKL-UPL">UKL-UPL</option>
                        <option value="AMDAL">AMDAL</option>
                        <option value="SPPL" selected>SPPL</option>
                        <?php }?>

                      </select>
                    </div>

                    <div class="form-group">
                      <label for=""><b>Tanggal Izin</b></label>
                      <input type="date" class="form-control" placeholder="Masukkan Tanggal Izin..." name="proper_tanggal_izin" required="required" value="<?php echo $key->proper_tanggal_izin;?>">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label for=""><b>Institusi yang Mengesahkan</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Institusi yang Mengesahkan..." name="proper_pengesahan_institusi" required="required" value="<?php echo $key->proper_pengesahan_institusi;?>">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Tanggal disahkan</b></label>
                      <input type="date" class="form-control" placeholder="Masukkan Tanggal disahkan..." name="proper_pengesahan_tanggal" required="required" value="<?php echo $key->proper_pengesahan_tanggal;?>">
                    </div>
                    <hr>


                    <div class="form-group">
                      <label for=""><b>Batasan Luas</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Batasan Luas Kegiatan..." name="proper_batasan_luas" required="required" value="<?php echo $key->proper_batasan_luas;?>">
                    </div>

                    <div class="form-group">
                      <label for=""><b>Batasan Produksi</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Batasan Produksi Kegiatan..." name="proper_batasan_produksi" required="required" value="<?php echo $key->proper_batasan_produksi;?>">
                    </div>

                    <div class="form-group">
                      <label for=""><b>Dokumen Lingkungan</b></label>
                      <input type="file" class="form-control" name="userfile">
                      File Sebelumnya : <a href="<?php echo base_url();?>upload/proper/dokumen/<?php echo $key->proper_lampiran?>" target="_blank"><?php echo $key->proper_lampiran;?></a>
                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
                  <?php echo form_close(); ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    
                  </div>
                </div>
              </div>
            </div>




            <!-- Seniman Proper Modal Remove-->
            <div class="modal fade" id="properRemoveModal<?php echo $key->proper_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Seniman Proper</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("proper/delete")?>
                  <div class="modal-body">
                    Apakah anda yakin akan menghapus data Seniman Proper <b><?php echo $key->proper_nama_kegiatan ?></b> ?
                    <input type="hidden" class="form-control" name="proper_id" value="<?php echo $key->proper_id?>">
                    <input type="hidden" class="form-control" name="proper_nama_kegiatan" value="<?php echo $key->proper_nama_kegiatan?>">
                    <input type="hidden" class="form-control" name="proper_lampiran" value="<?php echo $key->proper_lampiran?>">
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                  <?php echo form_close(); ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    
                  </div>
                </div>
              </div>
            </div>



            <!-- Seniman Proper Modal Remove-->
            <div class="modal fade" id="Seniman ProperDetailModal<?php echo $key->proper_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Seniman Proper</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                 
                  <div class="modal-body">
                    <center>
                      <img src="<?php echo base_url()?>upload/Seniman Proper/<?php echo $key->proper_picture?>" width="300">
                      <hr> <b><?php echo $key->proper_name?></b>
                    </center>
                  </div>
                  <div class="modal-footer">
                    
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- End Looping -->


            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->