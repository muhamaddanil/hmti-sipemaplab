<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah Gallery';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update Gallery';
    }else if($this->session->flashdata('delete')){
      $message = $this->session->flashdata('delete');
      $heading = '#Delete Gallery';  
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
  <h1 class="h3 mb-2 text-gray-800">Data Gallery</h1>
  <p class="mb-4">Data berikut merupakan kumpulan Gallery di <b>Laboratorium Teknik Informatika</b> - Universitas Halu Oleo</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#galleryModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- gallery Modal-->
      <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Gallery Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("gallery/input")?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Nama Gallery</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Gallery..." name="gallery_name" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Tanggal Gallery</b></label>
                <input type="date" class="form-control" placeholder="Masukkan Tanggal Gallery..." name="gallery_date" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Kategori Gallery</b></label>
                <select class="form-control" name="gallery_category" required="required"> 
                  <option value="">-Pilih Kategori-</option>
                  <option value="gambar">Gambar</option>
                  <option value="video">Video</option>
                </select>
              </div>
              
              <div class="form-group">
                <label for=""><b>Foto Gallery</b></label>
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


      <a href="<?php echo site_url('gallery')?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th style="width: 19%;">#</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Kategori</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($gallery as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              <td>
                <a href="<?php echo base_url()?>upload/gallery/<?php echo $key->gallery_file?>" class="btn btn-info btn-icon-split btn-sm" target="_blank">
                  <span class="text">
                    <i class="fa fa-eye"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#galleryEditModal<?php echo $key->gallery_id?>">
                  <span class="text">
                    <i class="fa fa-edit"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#galleryRemoveModal<?php echo $key->gallery_id?>">
                  <span class="text">
                    <i class="fa fa-trash"></i>
                  </span>
                </a>


              </td>
              <td><?php echo $key->gallery_name?></td>
              <td><?php echo $key->gallery_date?></td>
              <td><?php echo $key->gallery_category?></td>
            </tr>

            <!-- Looping Modal Area -->

            <!-- gallery Modal Edit-->
            <div class="modal fade" id="galleryEditModal<?php echo $key->gallery_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Gallery</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open_multipart("gallery/edit")?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for=""><b>Nama Gallery</b></label>
                      <input type="hidden" class="form-control" name="gallery_id" value="<?php echo $key->gallery_id?>">
                      <input type="hidden" class="form-control" name="gallery_file" value="<?php echo $key->gallery_file?>">
                      <input type="text" class="form-control" placeholder="Masukkan Nama Gallery..." name="gallery_name" value="<?php echo $key->gallery_name?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Tanggal Gallery</b></label>
                      <input type="date" class="form-control" placeholder="Masukkan Tanggal Gallery..." name="gallery_date" required="required" value="<?php echo $key->gallery_date?>">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Kategori Gallery</b></label>
                      <select class="form-control" name="gallery_category" required="required"> 
                        <option value="">-Pilih Kategori-</option>
                        <?php if($key->gallery_category=="gambar"){?>
                        <option value="gambar" selected>Gambar</option>
                        <option value="video">Video</option>
                        <?php }else{ ?>
                        <option value="gambar">Gambar</option>
                        <option value="video" selected>Video</option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for=""><b>Foto Gallery</b></label>
                      <input type="file" class="form-control" name="userfile">
                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-warning" type="submit">Edit</button>
                  <?php echo form_close(); ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- gallery Modal Remove-->
            <div class="modal fade" id="galleryRemoveModal<?php echo $key->gallery_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Gallery</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("gallery/delete")?>
                  <div class="modal-body">
                    Apakah anda yakin akan menghapus data Gallery <b><?php echo $key->gallery_name ?></b> ?
                    <input type="hidden" class="form-control" name="gallery_id" value="<?php echo $key->gallery_id?>">
                    <input type="hidden" class="form-control" name="gallery_name" value="<?php echo $key->gallery_name?>">
                    <input type="hidden" class="form-control" name="gallery_file" value="<?php echo $key->gallery_file?>">
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                  <?php echo form_close(); ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    
                  </div>
                </div>
              </div>
            </div>



            <!-- gallery Modal Remove-->
            <div class="modal fade" id="galleryDetailModal<?php echo $key->gallery_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Gallery</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                 
                  <div class="modal-body">
                    <center>
                      <img src="<?php echo base_url()?>upload/gallery/<?php echo $key->gallery_file?>" width="300">
                      <hr> <b><?php echo $key->gallery_name?></b>
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