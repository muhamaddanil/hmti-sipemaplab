<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah aslab';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update aslab';
    }else if($this->session->flashdata('delete')){
      $message = $this->session->flashdata('delete');
      $heading = '#Delete aslab';  
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
  <h1 class="h3 mb-2 text-gray-800">Data aslab</h1>
  <p class="mb-4">Data berikut merupakan kumpulan aslab aktif di <b>Teknik Informatika</b> - Universitas Halu Oleo</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#aslabModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- aslab Modal-->
      <div class="modal fade" id="aslabModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah aslab Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("aslab/input")?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Nim aslab</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nim aslab..." name="aslab_nim" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Nama aslab</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama aslab..." name="aslab_nama" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Angkatan aslab</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Angkatan aslab..." name="aslab_angkatan" required="required">
              </div>
              <!-- <div class="form-group">
                <label for=""><b>Foto aslab</b></label>
                <input type="file" class="form-control" name="aslabfile">
              </div> -->
              
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Tambah</button>
            <?php echo form_close(); ?>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
              
            </div>
          </div>
        </div>
      </div>

      
      <a href="<?php echo site_url('aslab')?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Refresh Halaman</span>
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%;">No</th>
              <th>Nim</th>
              <th>Nama</th>
              <th>Angkatan</th>
              <th style="width: 19%;">#</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($aslab as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              
              <td><?php echo $key->aslab_nim?></td>
              <td><?php echo $key->aslab_nama?></td>
              <td><?php echo $key->aslab_angkatan?></td>
              <td>
                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#aslabEditModal<?php echo $key->aslab_id?>">
                  <span class="text">
                    <i class="fa fa-edit"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#aslabRemoveModal<?php echo $key->aslab_id?>">
                  <span class="text">
                    <i class="fa fa-trash"></i>
                  </span>
                </a>
                  
              </td>
            </tr>

            <!-- Looping Modal Area -->

            <!-- aslab Modal Edit-->
            <div class="modal fade" id="aslabEditModal<?php echo $key->aslab_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit aslab</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open_multipart("aslab/edit")?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for=""><b>Nim aslab</b></label>
                      <input type="hidden" class="form-control" name="aslab_id" value="<?php echo $key->aslab_id?>">
                      <!-- <input type="hidden" class="form-control" name="aslab_picture" value="<?php echo $key->aslab_picture?>"> -->
                      <input type="text" class="form-control" placeholder="Masukkan Nim aslab..." name="aslab_nim" value="<?php echo $key->aslab_nim?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Nama aslab</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Nama aslab..." name="aslab_nama" required="required" value="<?php echo $key->aslab_nama?>">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Angkatan aslab</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Angkatan aslab..." name="aslab_angkatan" required="required" value="<?php echo $key->aslab_angkatan?>">
                    </div>
                    <!-- <div class="form-group">
                      <label for=""><b>Foto aslab</b></label>
                      <input type="file" class="form-control" name="aslabfile">
                    </div> -->
                    
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-warning" type="submit">Edit</button>
                  <?php echo form_close(); ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- aslab Modal Remove-->
            <div class="modal fade" id="aslabRemoveModal<?php echo $key->aslab_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus aslab</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("aslab/delete")?>
                  <div class="modal-body">
                    Apakah anda yakin akan menghapus data aslab <b><?php echo $key->aslab_name ?></b> ?
                    <input type="hidden" class="form-control" name="aslab_id" value="<?php echo $key->aslab_id?>">
                    <input type="hidden" class="form-control" name="aslab_name" value="<?php echo $key->aslab_name?>">
                    <input type="hidden" class="form-control" name="aslab_picture" value="<?php echo $key->aslab_picture?>">
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                  <?php echo form_close(); ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    
                  </div>
                </div>
              </div>
            </div>



            <!-- aslab Modal Remove-->
            <div class="modal fade" id="aslabDetailModal<?php echo $key->aslab_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">aslab : <?php echo $key->aslab_nama?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                 
                  <div class="modal-body">
                    <b>01. Identitas Pengadu </b>
                    <br>Nama:
                    <br><?php echo $key->aslab_nama;?>
                    <br>
                    <br>Alamat : 
                    <br><?php echo $key->aslab_alamat;?>
                    <br>
                    <br>No. Telpon :
                    <br><?php echo $key->aslab_nohp;?>
                    <br>
                    <hr>
                    <b>02. Lokasi Kejadian </b>
                    <br>Alamat Kejadian:
                    <br><?php echo $key->aslab_alamat_kejadian;?>
                    <br>
                    <hr>
                    <b>03. Dugaan Sumber atau Kejadian  </b>
                    <br>Jenis Kegiatan(Jika Diketahui):
                    <br><?php echo $key->aslab_jeniskegiatan;?>
                    <br>
                    <br>Nama Kegiatan dan/atau usaha (Jika Diketahui) : 
                    <br><?php echo $key->aslab_namakegiatan;?>
                    <br>
                    
                    <hr>
                    <b>04. Waktu dan Uraian Kejadian  </b>
                    <br>Waktu diketahuinya pencemaran dan atau perusakan lingkungan dan/atau perusakan hutan:
                    <br><?php echo $key->aslab_waktudiketahui;?>
                    <br>
                    <br>Uraian Kejadian : 
                    <br><?php echo $key->aslab_uraiankejadian;?>
                    <br>
                    <br>Dampak yang dirasakan akibat pencemaran dan atau perusakan lingkungan dan/atau perusakan hutan :
                    <br><?php echo $key->aslab_dampakdirasakan;?>
                    <br>

                    <hr>
                    <b>05. Penyelesaian yang Diinginkan  </b>
                    <br>Penyelesaian yang Diinginkan:
                    <br><?php echo $key->aslab_penyelesaian;?>
                    <br>
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