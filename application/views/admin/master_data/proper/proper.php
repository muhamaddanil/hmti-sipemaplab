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
  <h1 class="h3 mb-2 text-gray-800">Data Seniman Proper</h1>
  <p class="mb-4">Data berikut merupakan kumpulan Seniman Proper yang berlaku di <b>Dinas Lingkungan Hidup dan Kehutanan</b> - Kota Kendari</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      

      <a href="<?php echo site_url('proper')?>" class="btn btn-warning btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Dalam Proses</span>
      </a>

      <a href="<?php echo site_url('proper/taat')?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Taat</span>
      </a>

      <a href="<?php echo site_url('proper/tidak_taat')?>" class="btn btn-danger btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Tidak Taat</span>
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
              <th>Nama Kegiatan</th>
              <th>Nama Pemrakarsa</th>
              <th>No Izin &Tanggal</th>
              <th>Status</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($proper as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              

              <td>
               
                <a href="<?php echo site_url('proper/detail/'.$key->proper_id)?>" class="btn btn-primary btn-icon-split btn-sm" data-toggle="tooltip" title="Lihat Data">
                  <span class="text">
                    <i class="fa fa-eye"></i>
                  </span>
                </a>
                 <?php if($this->uri->segment(2)==""){?>

                |

                <a href="#" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#properStatusModal<?php echo $key->proper_id?>" data-toggle="tooltip" title="Validasi Status">
                  <span class="text">
                    <i class="fa fa-check"></i> 
                  </span>
                </a>
                
                <?php } ?>

              </td>
              <td><?php echo $key->proper_nama_kegiatan?></td>
              <td><?php echo $key->proper_nama_pemrakarsa?></td>
              <td><?php echo $key->proper_nomor_izin."/".$key->proper_tanggal_izin?></td>
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

            <!-- Seniman Proper Modal Edit-->
            <div class="modal fade" id="properStatusModal<?php echo $key->proper_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Status <?php echo $key->proper_nama_kegiatan?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open_multipart("proper/edit")?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for=""><b>Lokasi Kegiatan/Usaha (Titik Kordinat)*</b></label>
                      <input type="text" class="form-control" placeholder="Ambil Titik Dari Google Maps" name="proper_titik_kordinat" value="<?php echo $key->proper_titik_kordinat?>" required>
                      
                    </div>
                    <div class="form-group">
                      <label for=""><b>Status Proper</b></label>
                      <input type="hidden" class="form-control" name="proper_id" value="<?php echo $key->proper_id?>">
                      <select class="form-control" name="proper_status">
                          <?php if($key->proper_status==0){?>
                            <option value="0" selected>Belum Di Proses</option>
                            <option value="1">Tidak Taat</option>
                            <option value="2">Taat</option>
                          <?php }elseif($key->proper_status==1){?>
                            <option value="0" >Belum Di Proses</option>
                            <option value="1" selected>Tidak Taat</option>
                            <option value="2">Taat</option>
                          <?php }else{?>
                            <option value="0" >Belum Di Proses</option>
                            <option value="1">Tidak Taat</option>
                            <option value="2"selected>Taat</option>
                          <?php }?>
                      </select>
                    </div>
                    
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-warning" type="submit">Update Status</button>
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
                    Apakah anda yakin akan menghapus data Seniman Proper <b><?php echo $key->proper_name ?></b> ?
                    <input type="hidden" class="form-control" name="Seniman Proper_id" value="<?php echo $key->proper_id?>">
                    <input type="hidden" class="form-control" name="Seniman Proper_name" value="<?php echo $key->proper_name?>">
                    <input type="hidden" class="form-control" name="Seniman Proper_picture" value="<?php echo $key->proper_picture?>">
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