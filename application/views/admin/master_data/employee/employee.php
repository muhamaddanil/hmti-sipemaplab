<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah Pegawai';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update Pegawai';
    }else if($this->session->flashdata('delete')){
      $message = $this->session->flashdata('delete');
      $heading = '#Delete Pegawai';  
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
  <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>
  <p class="mb-4">Data berikut merupakan kumpulan Pegawai yang berlaku di <b>Dinas Lingkungan Hidup dan Kehutanan</b> - Kota Kendari</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#employeeModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- employee Modal-->
      <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("employee/input")?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Nama Pegawai</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Pegawai..." name="employee_name" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Jabatan Pegawai</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Jabatan Pegawai..." name="employee_position" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>NIP Pegawai</b></label>
                <input type="text" class="form-control" placeholder="Masukkan NIP Pegawai..." name="employee_nip" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Foto Pegawai</b></label>
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


      <a href="<?php echo site_url('employee')?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th>Jabatan</th>
              <th>NIP</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($employee as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              <td>
                <a href="#" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#employeeDetailModal<?php echo $key->employee_id?>">
                  <span class="text">
                    <i class="fa fa-image"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#employeeEditModal<?php echo $key->employee_id?>">
                  <span class="text">
                    <i class="fa fa-edit"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#employeeRemoveModal<?php echo $key->employee_id?>">
                  <span class="text">
                    <i class="fa fa-trash"></i>
                  </span>
                </a>


              </td>
              <td><?php echo $key->employee_name?></td>
              <td><?php echo $key->employee_position?></td>
              <td><?php echo $key->employee_nip?></td>
            </tr>

            <!-- Looping Modal Area -->

            <!-- employee Modal Edit-->
            <div class="modal fade" id="employeeEditModal<?php echo $key->employee_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pegawai</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open_multipart("employee/edit")?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for=""><b>Nama Pegawai</b></label>
                      <input type="hidden" class="form-control" name="employee_id" value="<?php echo $key->employee_id?>">
                      <input type="hidden" class="form-control" name="employee_picture" value="<?php echo $key->employee_picture?>">
                      <input type="text" class="form-control" placeholder="Masukkan Nama Pegawai..." name="employee_name" value="<?php echo $key->employee_name?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Jabatan Pegawai</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Jabatan Pegawai..." name="employee_position" required="required" value="<?php echo $key->employee_position?>">
                    </div>
                    <div class="form-group">
                      <label for=""><b>NIP Pegawai</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan NIP Pegawai..." name="employee_nip" required="required" value="<?php echo $key->employee_nip?>">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Foto Pegawai</b></label>
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

            <!-- employee Modal Remove-->
            <div class="modal fade" id="employeeRemoveModal<?php echo $key->employee_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pegawai</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("employee/delete")?>
                  <div class="modal-body">
                    Apakah anda yakin akan menghapus data Pegawai <b><?php echo $key->employee_name ?></b> ?
                    <input type="hidden" class="form-control" name="employee_id" value="<?php echo $key->employee_id?>">
                    <input type="hidden" class="form-control" name="employee_name" value="<?php echo $key->employee_name?>">
                    <input type="hidden" class="form-control" name="employee_picture" value="<?php echo $key->employee_picture?>">
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                  <?php echo form_close(); ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    
                  </div>
                </div>
              </div>
            </div>



            <!-- employee Modal Remove-->
            <div class="modal fade" id="employeeDetailModal<?php echo $key->employee_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Pegawai</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                 
                  <div class="modal-body">
                    <center>
                      <img src="<?php echo base_url()?>upload/employee/<?php echo $key->employee_picture?>" width="300">
                      <hr> <b><?php echo $key->employee_name?></b>
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