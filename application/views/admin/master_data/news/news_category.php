<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah Jenis Berita';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update Jenis Berita';
    }else if($this->session->flashdata('delete')){
      $message = $this->session->flashdata('delete');
      $heading = '#Delete Jenis Berita';  
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
  <h1 class="h3 mb-2 text-gray-800">Data Jenis Berita</h1>
  <p class="mb-4">Data berikut merupakan kumpulan Jenis Berita yang berlaku di <b>Dinas Lingkungan Hidup dan Kehutanan</b> - Kota Kendari</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#news_categoryModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- news_category Modal-->
      <div class="modal fade" id="news_categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Berita Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open("news_category/input")?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Nama Jenis Berita</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Jenis Berita..." name="news_category_name" required="required">
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


      <a href="<?php echo site_url('news_category')?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th style="width: 12%;">#</th>
              <th>Jenis Berita</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($news_category as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              <td>
                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#news_categoryEditModal<?php echo $key->news_category_id?>">
                  <span class="text">
                    <i class="fa fa-edit"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#news_categoryRemoveModal<?php echo $key->news_category_id?>">
                  <span class="text">
                    <i class="fa fa-trash"></i>
                  </span>
                </a>

              </td>
              <td><?php echo $key->news_category_name?></td>
            </tr>

            <!-- Looping Modal Area -->

            <!-- news_category Modal Edit-->
            <div class="modal fade" id="news_categoryEditModal<?php echo $key->news_category_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Berita</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("news_category/edit")?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for=""><b>Nama Jenis Berita</b></label>
                      <input type="hidden" class="form-control" name="news_category_id" value="<?php echo $key->news_category_id?>">
                      <input type="text" class="form-control" placeholder="Masukkan Nama Jenis Berita..." name="news_category_name" value="<?php echo $key->news_category_name?>" required="required">
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

            <!-- news_category Modal Remove-->
            <div class="modal fade" id="news_categoryRemoveModal<?php echo $key->news_category_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Jenis Berita</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("news_category/delete")?>
                  <div class="modal-body">
                    Apakah anda yakin akan menghapus data Jenis Berita <b><?php echo $key->news_category_name ?></b> ?
                    <input type="hidden" class="form-control" name="news_category_id" value="<?php echo $key->news_category_id?>">
                    <input type="hidden" class="form-control" name="news_category_name" value="<?php echo $key->news_category_name?>">
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