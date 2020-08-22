<!-- ======= Hero Section ======= -->
<?php foreach ($profillab as $profillab) { ?>
  <section id="hero">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
          <div>
            <h1>Sistem Informasi Peminjaman dan Asistensi Lab</h1>
            <h2><?php echo $profillab->profillab_nama ?>.</h2>
            <!-- <a href="<?php echo site_url('home') ?>" class="btn btn-login">Login</a> -->
            <a href="<?php echo site_url('home') ?>" class="btn-get-started scrollto">Login</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
          <img src="<?php echo base_url() ?>assets2/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <!-- <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6" data-aos="zoom-in">
            <img src="<?php echo base_url() ?>assets2/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0">
              <h3>PROFIL LAB</h3>
              <p class="font-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperd</li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate tera noden carma palorp mades tera.
              </p>
            </div>
          </div>
        </div>

      </div>
    </section>End About Section -->

    <!-- ======= Features Section ======= -->
    <!-- <section id="features" class="features">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 mt-2 mb-tg-0 order-2 order-lg-1">
            <ul class="nav nav-tabs flex-column">
              <h2>Fitur SIPEMABLAB</h2>
              <li class="nav-item" data-aos="fade-up">
                <a class="nav-link active show" data-toggle="tab" href="#tab-1">
                  <h4>Modi sit est</h4>
                  <p>Quis excepturi porro totam sint earum quo nulla perspiciatis eius.</p>
                </a>
              </li>
              <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="100">
                <a class="nav-link" data-toggle="tab" href="#tab-2">
                  <h4>Unde praesentium sed</h4>
                  <p>Voluptas vel esse repudiandae quo excepturi.</p>
                </a>
              </li>
              <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="200">
                <a class="nav-link" data-toggle="tab" href="#tab-3">
                  <h4>Pariatur explicabo vel</h4>
                  <p>Velit veniam ipsa sit nihil blanditiis mollitia natus.</p>
                </a>
              </li>
              <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="300">
                <a class="nav-link" data-toggle="tab" href="#tab-4">
                  <h4>Nostrum qui quasi</h4>
                  <p>Ratione hic sapiente nostrum doloremque illum nulla praesentium id</p>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <figure>
                  <img src="<?php echo base_url() ?>assets2/img/features-1.png" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-2">
                <figure>
                  <img src="<?php echo base_url() ?>assets2/img/features-2.png" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-3">
                <figure>
                  <img src="<?php echo base_url() ?>assets2/img/features-3.png" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-4">
                <figure>
                  <img src="<?php echo base_url() ?>assets2/img/features-4.png" alt="" class="img-fluid">
                </figure>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Visi Misi <?php echo $profillab->profillab_nama ?></h2>
          <p>Adapun Visi dan Misi dari <?php echo $profillab->profillab_nama ?> adalah sebagai berikut.</p>
        </div>

        <div class="row">
          <div class="col-lg-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in">
            <div class="icon-box icon-box-pink">
              <div class="icon"></div>
              <h4 class="title">Visi</h4>
              <p class="description"><?php echo $profillab->profillab_visi ?></p>
            </div>
          </div>

          <div class="col-lg-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"></div>
              <h4 class="title">Misi</h4>
              <p class="description"><?php echo $profillab->profillab_misi ?></p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Team Section ======= -->


    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Perangkat Lab</h2>
          <p>Adapun perangkat yang bertanggungjawab atas lab adalah sebagai berikut.</p>
        </div>

        <div class="row">
          <?php foreach ($dosenlab as $dosenlab) { ?>
            <div class="col-lg-4 col-md-6">
              <div class="member" data-aos="zoom-in">
                <div class="pic"><img src="<?php echo base_url() ?>assets2/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4><?php echo $dosenlab->dosenlab_nama ?></h4>
                  <span>PenanggungJawab</span>
                  <div class="social">
                    <a href=""><i class="icofont-twitter"></i></a>
                    <a href=""><i class="icofont-facebook"></i></a>
                    <a href=""><i class="icofont-instagram"></i></a>
                    <a href=""><i class="icofont-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php foreach ($aslab as $aslab) { ?>
            <div class="col-lg-4 col-md-6">
              <div class="member" data-aos="zoom-in" data-aos-delay="200">
                <div class="pic"><img src="<?php echo base_url() ?>assets2/img/team/team-3.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4><?php echo $aslab->aslab_nama ?></h4>
                  <span>Asisten Lab</span>
                  <div class="social">
                    <a href=""><i class="icofont-twitter"></i></a>
                    <a href=""><i class="icofont-facebook"></i></a>
                    <a href=""><i class="icofont-instagram"></i></a>
                    <a href=""><i class="icofont-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>

      </div>
    </section><!-- End Team Section -->




  </main><!-- End #main -->

<?php } ?>