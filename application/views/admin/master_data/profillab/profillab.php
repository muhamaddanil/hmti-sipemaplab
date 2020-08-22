<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah profillab';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update profillab';
    }else if($this->session->flashdata('delete')){
      $message = $this->session->flashdata('delete');
      $heading = '#Delete profillab';  
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
  <h1 class="h3 mb-2 text-gray-800">Data profillab</h1>
  <p class="mb-4">Data berikut merupakan kumpulan profillab aktif di <b>Teknik Informatika</b> - Universitas Halu Oleo</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#profillabModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- profillab Modal-->
      <div class="modal fade" id="profillabModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah profillab Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("profillab/input")?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Nama profillab</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama profillab..." name="profillab_nama" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Visi profillab</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Visi profillab..." name="profillab_visi" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Misi profillab</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Misi profillab..." name="profillab_misi" required="required">
              </div>
              <!-- <div class="form-group">
                <label for=""><b>Foto profillab</b></label>
                <input type="file" class="form-control" name="profillabfile">
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

      
      <a href="<?php echo site_url('profillab')?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th>Nama</th>
              <th>Visi</th>
              <th>Misi</th>
              <th style="width: 19%;">#</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($profillab as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              
              <td><?php echo $key->profillab_nama?></td>
              <td><?php echo $key->profillab_visi?></td>
              <td><?php echo $key->profillab_misi?></td>
              <td>
                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#profillabEditModal<?php echo $key->profillab_id?>">
                  <span class="text">
                    <i class="fa fa-edit"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#profillabRemoveModal<?php echo $key->profillab_id?>">
                  <span class="text">
                    <i class="fa fa-trash"></i>
                  </span>
                </a>
                  
              </td>
            </tr>

            <!-- Looping Modal Area -->

            <!-- profillab Modal Edit-->
            <div class="modal fade" id="profillabEditModal<?php echo $key->profillab_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit profillab</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open_multipart("profillab/edit")?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for=""><b>Nama profillab</b></label>
                      <input type="hidden" class="form-control" name="profillab_id" value="<?php echo $key->profillab_id?>">
                      <!-- <input type="hidden" class="form-control" name="profillab_picture" value="<?php echo $key->profillab_picture?>"> -->
                      <input type="text" class="form-control" placeholder="Masukkan Nama profillab..." name="profillab_Nama" value="<?php echo $key->profillab_nama?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Visi profillab</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Visi profillab..." name="profillab_visi" required="required" value="<?php echo $key->profillab_visi?>">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Misi profillab</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Misi profillab..." name="profillab_misi" required="required" value="<?php echo $key->profillab_misi?>">
                    </div>
                    <!-- <div class="form-group">
                      <label for=""><b>Foto profillab</b></label>
                      <input type="file" class="form-control" name="profillabfile">
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

            <!-- profillab Modal Remove-->
            <div class="modal fade" id="profillabRemoveModal<?php echo $key->profillab_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus profillab</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("profillab/delete")?>
                  <div class="modal-body">
                    Apakah anda yakin akan menghapus data profillab <b><?php echo $key->profillab_nama ?></b> ?
                    <input type="hidden" class="form-control" name="profillab_id" value="<?php echo $key->profillab_id?>">
                    <input type="hidden" class="form-control" name="profillab_nama" value="<?php echo $key->profillab_nama?>">
                    <input type="hidden" class="form-control" name="profillab_picture" value="<?php echo $key->profillab_picture?>">
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