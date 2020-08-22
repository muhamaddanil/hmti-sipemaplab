<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah Berita';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update Berita';
    }else if($this->session->flashdata('delete')){
      $message = $this->session->flashdata('delete');
      $heading = '#Delete Berita';  
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
  <h1 class="h3 mb-2 text-gray-800">Data Berita</h1>
  <p class="mb-4">Data berikut merupakan kumpulan Berita yang berlaku di <b>Dinas Lingkungan Hidup dan Kehutanan</b> - Kota Kendari</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?php echo site_url('news/add')?>" class="btn btn-primary btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- news Modal-->
      


      <a href="<?php echo site_url('news')?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th>Judul</th>
              <th>Isi Berita</th>
              <th>Kategori</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($news as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              <td>
                <a href="<?php echo site_url('news/update/'.$key->news_id)?>" class="btn btn-warning btn-icon-split btn-sm" >
                  <span class="text">
                    <i class="fa fa-edit"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#newsRemoveModal<?php echo $key->news_id?>">
                  <span class="text">
                    <i class="fa fa-trash"></i>
                  </span>
                </a>

              </td>
              <td><?php echo $key->news_title?></td>
              <td><?php echo substr($key->news_text,0,150)." ..."?></td>
              <td><?php echo $key->news_category_name?></td>
            </tr>

            <!-- Looping Modal Area -->

            
          

            <!-- news Modal Remove-->
            <div class="modal fade" id="newsRemoveModal<?php echo $key->news_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Berita</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("news/delete")?>
                  <div class="modal-body">
                    Apakah anda yakin akan menghapus data Berita <b><?php echo $key->news_name ?></b> ?
                    <input type="hidden" class="form-control" name="news_id" value="<?php echo $key->news_id?>">
                    <input type="hidden" class="form-control" name="news_name" value="<?php echo $key->news_name?>">
                    <input type="hidden" class="form-control" name="news_picture" value="<?php echo $key->news_picture?>">
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