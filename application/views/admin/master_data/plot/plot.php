<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah Alur';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update Alur';
    }else if($this->session->flashdata('delete')){
      $message = $this->session->flashdata('delete');
      $heading = '#Delete Alur';  
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
  <h1 class="h3 mb-2 text-gray-800">Data Alur</h1>
  <p class="mb-4">Data berikut merupakan kumpulan Alur yang berlaku di <b>Dinas Lingkungan Hidup dan Kehutanan</b> - Kota Kendari</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#plotModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- plot Modal-->
      <div class="modal fade" id="plotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Alur Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("plot/input")?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Nama Alur</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Alur..." name="plot_name" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>File Alur</b></label>
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


      <a href="<?php echo site_url('plot')?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th>Nama Alur</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($plot as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              <td>
                <a href="<?php echo base_url()?>upload/plot/<?php echo $key->plot_file?>" class="btn btn-info btn-icon-split btn-sm" target="_blank">
                  <span class="text">
                    <i class="fa fa-eye"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#plotEditModal<?php echo $key->plot_id?>">
                  <span class="text">
                    <i class="fa fa-edit"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#plotRemoveModal<?php echo $key->plot_id?>">
                  <span class="text">
                    <i class="fa fa-trash"></i>
                  </span>
                </a>


              </td>
              <td><?php echo $key->plot_name?></td>
            </tr>

            <!-- Looping Modal Area -->

            <!-- plot Modal Edit-->
            <div class="modal fade" id="plotEditModal<?php echo $key->plot_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit plot</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open_multipart("plot/edit")?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for=""><b>Nama Alur</b></label>
                      <input type="hidden" class="form-control" name="plot_id" value="<?php echo $key->plot_id?>">
                      <input type="hidden" class="form-control" name="plot_file" value="<?php echo $key->plot_file?>">
                      <input type="text" class="form-control" placeholder="Masukkan Nama plot..." name="plot_name" value="<?php echo $key->plot_name?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for=""><b>File Alur</b></label>
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

            <!-- plot Modal Remove-->
            <div class="modal fade" id="plotRemoveModal<?php echo $key->plot_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Alur</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("plot/delete")?>
                  <div class="modal-body">
                    Apakah anda yakin akan menghapus data alur <b><?php echo $key->plot_name ?></b> ?
                    <input type="hidden" class="form-control" name="plot_id" value="<?php echo $key->plot_id?>">
                    <input type="hidden" class="form-control" name="plot_name" value="<?php echo $key->plot_name?>">
                    <input type="hidden" class="form-control" name="plot_file" value="<?php echo $key->plot_file?>">
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