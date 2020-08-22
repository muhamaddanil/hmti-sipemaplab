<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah dosenlab';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update dosenlab';
    }else if($this->session->flashdata('delete')){
      $message = $this->session->flashdata('delete');
      $heading = '#Delete dosenlab';  
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
  <h1 class="h3 mb-2 text-gray-800">Data dosenlab</h1>
  <p class="mb-4">Data berikut merupakan kumpulan dosenlab aktif di <b>Teknik Informatika</b> - Universitas Halu Oleo</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#dosenlabModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- dosenlab Modal-->
      <div class="modal fade" id="dosenlabModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah dosenlab Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("dosenlab/input")?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Nip dosenlab</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nip dosenlab..." name="dosenlab_nip" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Nama dosenlab</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama dosenlab..." name="dosenlab_nama" required="required">
              </div>
              <!-- <div class="form-group">
                <label for=""><b>Foto dosenlab</b></label>
                <input type="file" class="form-control" name="dosenlabfile">
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

      
      <a href="<?php echo site_url('dosenlab')?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th>Nip</th>
              <th>Nama</th>
              <th style="width: 19%;">#</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($dosenlab as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              
              <td><?php echo $key->dosenlab_nip?></td>
              <td><?php echo $key->dosenlab_nama?></td>
              <td>
                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#dosenlabEditModal<?php echo $key->dosenlab_id?>">
                  <span class="text">
                    <i class="fa fa-edit"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#dosenlabRemoveModal<?php echo $key->dosenlab_id?>">
                  <span class="text">
                    <i class="fa fa-trash"></i>
                  </span>
                </a>
                  
              </td>
            </tr>

            <!-- Looping Modal Area -->

            <!-- dosenlab Modal Edit-->
            <div class="modal fade" id="dosenlabEditModal<?php echo $key->dosenlab_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit dosenlab</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open_multipart("dosenlab/edit")?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for=""><b>Nip dosenlab</b></label>
                      <input type="hidden" class="form-control" name="dosenlab_id" value="<?php echo $key->dosenlab_id?>">
                      <!-- <input type="hidden" class="form-control" name="dosenlab_picture" value="<?php echo $key->dosenlab_picture?>"> -->
                      <input type="text" class="form-control" placeholder="Masukkan Nip dosenlab..." name="dosenlab_nip" value="<?php echo $key->dosenlab_nip?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Nama dosenlab</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Nama dosenlab..." name="dosenlab_nama" required="required" value="<?php echo $key->dosenlab_nama?>">
                    </div>
                   
                    <!-- <div class="form-group">
                      <label for=""><b>Foto dosenlab</b></label>
                      <input type="file" class="form-control" name="dosenlabfile">
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

            <!-- dosenlab Modal Remove-->
            <div class="modal fade" id="dosenlabRemoveModal<?php echo $key->dosenlab_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus dosenlab</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("dosenlab/delete")?>
                  <div class="modal-body">
                    Apakah anda yakin akan menghapus data dosenlab <b><?php echo $key->dosenlab_name ?></b> ?
                    <input type="hidden" class="form-control" name="dosenlab_id" value="<?php echo $key->dosenlab_id?>">
                    <input type="hidden" class="form-control" name="dosenlab_name" value="<?php echo $key->dosenlab_name?>">
                    <input type="hidden" class="form-control" name="dosenlab_picture" value="<?php echo $key->dosenlab_picture?>">
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                  <?php echo form_close(); ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    
                  </div>
                </div>
              </div>
            </div>



            <!-- dosenlab Modal Remove-->
            <div class="modal fade" id="dosenlabDetailModal<?php echo $key->dosenlab_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">dosenlab : <?php echo $key->dosenlab_nama?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                 
                  <div class="modal-body">
                    <b>01. Identitas Pengadu </b>
                    <br>Nama:
                    <br><?php echo $key->dosenlab_nama;?>
                    <br>
                    <br>Alamat : 
                    <br><?php echo $key->dosenlab_alamat;?>
                    <br>
                    <br>No. Telpon :
                    <br><?php echo $key->dosenlab_nohp;?>
                    <br>
                    <hr>
                    <b>02. Lokasi Kejadian </b>
                    <br>Alamat Kejadian:
                    <br><?php echo $key->dosenlab_alamat_kejadian;?>
                    <br>
                    <hr>
                    <b>03. Dugaan Sumber atau Kejadian  </b>
                    <br>Jenis Kegiatan(Jika Diketahui):
                    <br><?php echo $key->dosenlab_jeniskegiatan;?>
                    <br>
                    <br>Nama Kegiatan dan/atau usaha (Jika Diketahui) : 
                    <br><?php echo $key->dosenlab_namakegiatan;?>
                    <br>
                    
                    <hr>
                    <b>04. Waktu dan Uraian Kejadian  </b>
                    <br>Waktu diketahuinya pencemaran dan atau perusakan lingkungan dan/atau perusakan hutan:
                    <br><?php echo $key->dosenlab_waktudiketahui;?>
                    <br>
                    <br>Uraian Kejadian : 
                    <br><?php echo $key->dosenlab_uraiankejadian;?>
                    <br>
                    <br>Dampak yang dirasakan akibat pencemaran dan atau perusakan lingkungan dan/atau perusakan hutan :
                    <br><?php echo $key->dosenlab_dampakdirasakan;?>
                    <br>

                    <hr>
                    <b>05. Penyelesaian yang Diinginkan  </b>
                    <br>Penyelesaian yang Diinginkan:
                    <br><?php echo $key->dosenlab_penyelesaian;?>
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