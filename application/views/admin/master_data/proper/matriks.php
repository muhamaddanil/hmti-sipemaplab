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
  <h1 class="h3 mb-2 text-gray-800">Data Matrix Proper : <?php echo $this->session->userdata('user_fullname')?></h1>
  <p class="mb-4">Data berikut merupakan kumpulan matrix pengajuan DokLing (Dokumen Lingkungan) di <b>Dinas Lingkungan Hidup dan Kehutanan</b> - Kota Kendari</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

      <a href="<?php echo site_url('proper/validasi_dokling')?>" class="btn btn-warning btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Kembali</span>
      </a>

      |

      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#senimanModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data Matrix</span>
      </a>
      
      <!-- Seniman Proper Modal-->
      <div class="modal fade" id="senimanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Pengajuan Matriks DokLing</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("proper/input_matriks")?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Tahapan</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Tahapan..." name="proper_matriks_tahapan" required="required" >
                <input type="hidden" class="form-control" name="proper_id" required="required" value="<?php echo $this->uri->segment(3)?>" >
              </div>

              <div class="form-group">
                <label for=""><b>Kegiatan</b></label>
                <textarea class="form-control" name="proper_matriks_kegiatan" placeholder="Masukkan Kegiatan" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for=""><b>Sumber Dampak</b></label>
                <textarea class="form-control" name="proper_matriks_sumber_dampak" placeholder="Masukkan Sumber Dampak" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for=""><b>Jenis Limbah/Cemaran</b></label>
                <textarea class="form-control" name="proper_matriks_jenis_limbah" placeholder="Masukkan Jenis Limbah/Cemaran" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for=""><b>Lampiran Matriks</b></label>
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
      


      <a href="<?php echo site_url('proper/matrix/'.$this->uri->segment(3))?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th>Tahapan</th>
              <th>Kegiatan</th>
              <th>Lampiran</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($proper as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              <td>
                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#properEditModal<?php echo $key->proper_matriks_id?>">
                  <span class="text">
                    <i class="fa fa-edit"></i>
                  </span>
                </a>

                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#properRemoveModal<?php echo $key->proper_matriks_id?>">
                  <span class="text">
                    <i class="fa fa-trash"></i>
                  </span>
                </a>


              </td>
              <td><?php echo $key->proper_matriks_tahapan;?></td>
              <td><?php echo $key->proper_matriks_kegiatan;?></td>
              <td><a href="<?php echo base_url();?>upload/proper/matrix/<?php echo $key->proper_matriks_lampiran;?>" target="_blank">Download</a></td>
            </tr>

            <!-- Looping Modal Area -->

            

            <!-- Seniman Proper Modal-->
            <div class="modal fade" id="properEditModal<?php echo $key->proper_matriks_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Pengajuan Matriks DokLing</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open_multipart("proper/update_matriks")?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for=""><b>Tahapan</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Tahapan..." name="proper_matriks_tahapan" required="required" value="<?php echo $key->proper_matriks_tahapan;?>">
                      <input type="hidden" class="form-control" name="proper_id" required="required" value="<?php echo $this->uri->segment(3)?>" >
                      <input type="hidden" class="form-control" name="proper_matriks_id" required="required" value="<?php echo $key->proper_matriks_id;?>" >
                      <input type="hidden" class="form-control" name="proper_matriks_lampiran" required="required" value="<?php echo $key->proper_matriks_lampiran;?>" >
                    </div>

                    <div class="form-group">
                      <label for=""><b>Kegiatan</b></label>
                      <textarea class="form-control" name="proper_matriks_kegiatan" placeholder="Masukkan Kegiatan" rows="3"><?php echo $key->proper_matriks_kegiatan;?></textarea>
                    </div>

                    <div class="form-group">
                      <label for=""><b>Sumber Dampak</b></label>
                      <textarea class="form-control" name="proper_matriks_sumber_dampak" placeholder="Masukkan Sumber Dampak" rows="3"><?php echo $key->proper_matriks_sumber_dampak;?></textarea>
                    </div>

                    <div class="form-group">
                      <label for=""><b>Jenis Limbah/Cemaran</b></label>
                      <textarea class="form-control" name="proper_matriks_jenis_limbah" placeholder="Masukkan Jenis Limbah/Cemaran" rows="3"><?php echo $key->proper_matriks_jenis_limbah;?></textarea>
                    </div>

                    <div class="form-group">
                      <label for=""><b>Lampiran Matriks</b></label>
                      <input type="file" class="form-control" name="userfile">
                      File Sebelumnya : <a href="<?php echo base_url();?>upload/proper/matrix/<?php echo $key->proper_matriks_lampiran?>" target="_blank"><?php echo $key->proper_matriks_lampiran?></a>
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
            <div class="modal fade" id="properRemoveModal<?php echo $key->proper_matriks_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Seniman Proper</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("proper/delete_matriks")?>
                  <div class="modal-body">
                    Apakah anda yakin akan menghapus data Seniman Proper <b><?php echo $key->proper_matriks_tahapan ?></b> ?
                    <input type="hidden" class="form-control" name="proper_matriks_id" value="<?php echo $key->proper_matriks_id;?>">
                    <input type="hidden" class="form-control" name="proper_matriks_tahapan" value="<?php echo $key->proper_matriks_tahapan;?>">
                    <input type="hidden" class="form-control" name="proper_matriks_lampiran" value="<?php echo $key->proper_matriks_lampiran;?>">
                    <input type="hidden" class="form-control" name="proper_id" value="<?php echo $key->proper_id;?>">
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                  <?php echo form_close(); ?>
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