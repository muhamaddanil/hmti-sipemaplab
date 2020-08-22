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
  <script src="<?php echo base_url()?>assets/plugin-new/ckeditor/ckeditor.js"></script>
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Berita</h1>
  <p class="mb-4">Data berikut merupakan kumpulan Berita yang berlaku di <b>Dinas Lingkungan Hidup dan Kehutanan</b> - Kota Kendari</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      
      <a href="<?php echo site_url('news')?>" class="btn btn-warning btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-arrow-left"></i>
        </span>
        <span class="text">Kembali</span>
      </a>

      <a href="<?php echo site_url('news/add')?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Refresh Halaman</span>
      </a>
      
    </div>
    <div class="card-body">
      
      <?php echo form_open_multipart("news/edit")?>
      <div class="form-group">
        <label for=""><b>Judul Berita</b></label>
        <input type="text" class="form-control" name="news_title" required="required" value="<?php echo $news[0]->news_title?>">
        <input type="hidden" class="form-control" name="news_author" required="required" value="<?php echo $this->session->userdata('user_id')?>">
        <input type="hidden" class="form-control" name="news_id" required="required" value="<?php echo $news[0]->news_id ?>">
        <input type="hidden" class="form-control" name="news_picture" required="required" value="<?php echo $news[0]->news_picture ?>">
      </div>
      <div class="form-group">
        <label for=""><b>Gambar Berita</b></label>
        <input type="file" class="form-control" name="userfile">
        
        <br>
        Gambar Sebelumnya:<br>
        <img src="<?php echo base_url()?>/upload/news/<?php echo $news[0]->news_picture?>" width="500px">
        <hr>

      </div>
       <div class="form-group">
        <label for=""><b>Isi Berita</b></label>
        <textarea class="form-control" name="news_text" id="editor1" rows="10" cols="80" required="required"><?php echo $news[0]->news_text ?></textarea>
      </div>
      <div class="form-group">
        <label for=""><b>Tanggal Berita</b></label>
        <input type="date" class="form-control" name="news_date" required="required" value="<?php echo $news[0]->news_date ?>">
      </div>
      <div class="form-group">
        <label for=""><b>Kategori Berita</b></label>
        <select class="form-control" name="news_category_id" required="required">
          <option value="">-Pilih Kategori-</option>
          <?php foreach($jenis as $j){
                  if($news[0]->news_category_id==$j->news_category_id){
          ?>
          
          <option value="<?php echo $j->news_category_id?>" selected><?php echo $j->news_category_name?></option>
          <?php }else{ ?>
          <option value="<?php echo $j->news_category_id?>"><?php echo $j->news_category_name?></option>
          <?php  } }?>
        </select>
      </div>
      <hr>
      <button style="width: 100%" class="btn btn-warning" type="submit">Edit Berita</button>
      <?php echo form_close(); ?>
    </div>
  </div>

  <script type="text/javascript">
    CKEDITOR.replace( 'editor1' );
  </script>

</div>
<!-- /.container-fluid -->