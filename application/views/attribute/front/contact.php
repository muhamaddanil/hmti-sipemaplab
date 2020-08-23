<br>

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg">

  <div class="section-title" data-aos="fade-up">
    <h2>Absensi Laboratorium</h2>
  </div>

  <div class="row">

    <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-right">
      <div class="info">
        <div class="address">
          <i class="icofont-google-map"></i>
          <h4>Lokasi:</h4>
          <p>Jl. HEA Mokodompit Universitas Halu Oleo, Fakultas Teknik, Jurusan Teknik Informatika</p>
        </div>

        <div class="email">
          <i class="icofont-envelope"></i>
          <h4>Email:</h4>
          <p>info@example.com</p>
        </div>

        <div class="phone">
          <i class="icofont-phone"></i>
          <h4>Nomor Kontak:</h4>
          <p>+1 5589 55488 55s</p>
        </div>
      </div>

    </div>

    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
      <!-- <form role="form" class="php-email-form"> -->
      <?php echo form_open("front/input_absen") ?>
      <div class="form-group">

        <label for=""><b>Pilih Asisten Laboratorium</b></label>
        <select class="form-control" name="aslab_nama">
          <option value="">.:: Pilih Asisten Laboratorium ::.</option>
          <?php foreach ($aslab as $aslab) { ?>
            <!-- <input type="hidden" class="form-control" name="aslab_nim" value="<?php echo $aslab->aslab_nim ?>"> -->
            <option value="<?php echo $aslab->aslab_nama ?>" selected><?php echo $aslab->aslab_nama ?></option>
          <?php } ?>

        </select>
      </div>
      <div class="form-group">

        <label for=""><b>Pilih Mahasiswa</b></label>
        <select class="form-control" name="mahasiswa_nama">
          <option value="">.:: Pilih Mahasiswa ::.</option>
          <?php foreach ($mahasiswa as $mahasiswa) { ?>
            <!-- <input type="hidden" class="form-control" name="mahasiswa_nim" value="<?php echo $mahasiswa->mahasiswa_nim ?>"> -->
            <option value="<?php echo $mahasiswa->mahasiswa_nama ?>" selected><?php echo $mahasiswa->mahasiswa_nama ?></option>
          <?php } ?>

        </select>
      </div>
      <div class="form-group">
        <label for="name">Alasan Masuk Laboratorium</label>
        <textarea class="form-control" name="absenlab_alasan" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
        <div class="validate"></div>
      </div>
      <!-- <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Pesan Anda telah terkirim. Terima Kasih!</div>
          </div> -->
      <div class="text-center"><button type="submit">Absen</button></div>
      <?php echo form_close(); ?>
      <!-- </form> -->

    </div>


  </div>

  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->