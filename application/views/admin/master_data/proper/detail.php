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
  <h1 class="h3 mb-2 text-gray-800">Data <?php echo $proper_detail[0]->proper_nama_pemrakarsa?></h1>
  <p class="mb-4">Data berikut merupakan kumpulan Seniman Proper yang berlaku di <b>Dinas Lingkungan Hidup dan Kehutanan</b> - Kota Kendari</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      

      <a href="<?php echo site_url('proper')?>" class="btn btn-warning btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-arrow-left"></i>
        </span>
        <span class="text">Kembali</span>
      </a>

      <a href="<?php echo site_url('proper/detail/'.$this->uri->segment(3))?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Refresh</span>
      </a>

      

      <!--  -->
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <b>01 . Data Kepemilikan Dokumen Lingkungan</b>
        <table class="table table-bordered"  width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%;" rowspan="2">No</th>
              <th rowspan="2">No Dokumen Lingkungan</th>
              <th rowspan="2">Dokumen Lingkungan</th>
              <th colspan="2">Pengesahan</th>
              <th colspan="2">Batasan</th>
              <th rowspan="2">Lampiran</th>

            </tr>
            <tr>
              <th>Institusi</th>
              <th>Tanggal</th>
              <th>Luas</th>
              <th>Produksi</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($proper_detail as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              
              <td><?php echo $key->proper_nomor_izin." / ".$key->proper_tanggal_izin?></td>
              <td><?php echo $key->proper_jenis_dokling?></td>
              <td><?php echo $key->proper_pengesahan_institusi?></td>
              <td><?php echo $key->proper_pengesahan_tanggal?></td>
              <td><?php echo $key->proper_batasan_luas?></td>
              <td><?php echo $key->proper_batasan_produksi?></td>
              <td>
                
                <a href="<?php echo base_url();?>upload/proper/dokumen/<?php echo $key->proper_lampiran;?>" target="_blank" class="btn btn-sm btn-success" >Download</a>
                  
              </td>
            </tr>

           

            


            <?php $no++; } ?>
          </tbody>
        </table>


        <hr>

        <b>02. Data Matrix</b>
        <table class="table table-bordered"  width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%;" rowspan="2">No</th>
              <th colspan="2">Tanggal</th>
              <th rowspan="2">Tahapan</th>
              <th rowspan="2">Kegiatan</th>
              <th rowspan="2">Sumber Dampak</th>
              <th rowspan="2">Jenis Limbah</th>
              <th rowspan="2">Lampiran</th>

            </tr>
            <tr>
              <th>Create</th>
              <th>Update</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($proper_matrix as $keys){?>
            <tr>
              <td><?php echo $no;?></td>
              
              <td><?php echo $keys->proper_matriks_create?></td>
              <td><?php echo $keys->proper_matriks_update?></td>
              <td><?php echo $keys->proper_matriks_tahapan?></td>
              <td><?php echo $keys->proper_matriks_kegiatan?></td>
              <td><?php echo $keys->proper_matriks_sumber_dampak?></td>
              <td><?php echo $keys->proper_matriks_jenis_limbah?></td>
              <td>
                
                <a href="<?php echo base_url();?>upload/proper/matrix/<?php echo $keys->proper_matriks_lampiran;?>" target="_blank" class="btn btn-sm btn-success" >Download</a>
                  
              </td>
            </tr>

           

            


            <?php $no++; } ?>
          </tbody>
        </table>


      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->