<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard User</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/images/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Event Kampus</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#team">Event</a></li>
          <li><a class="nav-link   scrollto" href="#portfolio">Dokumentasi</a></li>
          <li><a class="nav-link scrollto" href="#services">Mitra</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" onclick="openPopup(event)">Login</a></li>
          <li><a class="getstarted scrollto" href="loginAdmin" onclick="">Login Admin</a></li>

          <li>
            <a class="getstarted scrollto " id="logoutkanan" href="#" onclick="scrollToGetStarted()">
              <i class="bi bi-box-arrow-right" id="logut"></i>
            </a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->


      <div id="popupLogin" class="popupLogin">
        <div class="login-container">
          <form action="" class="form-login" id="form-login" method="POST">
            <ul class="login-nav">
              <li class="login-nav__item active" onclick="siginSwitch()">
                <a>Sign In</a>
              </li>
              <li class="login-nav__item" id="signup" onclick="signupSwitch()">
                <a>Sign Up</a>
              </li>
            </ul>
            <label for="login-input-email" class="login__label" style="display:none">
              Email
            </label>
            <input id="login-input-email" class="login__input" type="text" style="display:none" />
            <label for="login-input-username" class="login__label">
              Username
            </label>
            <input id="login-input-username" class="login__input" type="text" name="username" />
            <label for="login-input-password" class="login__label">
              Password
            </label>
            <input id="login-input-password" class="login__input" type="password" name="password" />

            <span class="info-error" style="color:white;font-size: 13px"></span><br>
            <label for="login-sign-up" class="login__label--checkbox">
              <input id="login-sign-up" type="checkbox" class="login__input--checkbox" />
              Keep me Signed in
            </label>

            <button id="SigninButton" class="login__submit" onclick="LoginUser(event)">Sign in</button>
            <button id="SignupButton" class="signup__submit" onclick="registerUser(event)" style="display:none">Sign
              up</button>

          </form>
          <a href="" class="login__forgot">Forgot Password?</a>
        </div>


      </div>

    </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
          data-aos="fade-up" data-aos-delay="200">
          <h1>Universitas Teknokrat Indonesia</h1>
          <h2>The campus event web contains event information at the Indonesian Technocratic University</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">About US</a>
            <a href="https://youtu.be/buBHH4yyQHo" class="glightbox btn-watch-video"><i
                class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Event kampus adalah kegiatan atau acara yang diadakan di lingkungan kampus atau oleh mahasiswa dan lembaga
              kampus untuk tujuan tertentu. Event kampus dapat mencakup berbagai jenis kegiatan, seperti seminar,
              konferensi, workshop, pertunjukan seni, festival budaya, kompetisi olahraga, pameran, dan masih banyak
              lagi.
              Tujuan dari event kampus dapat bervariasi, tergantung pada jenis acara yang diadakan dan inisiatif yang
              mendasarinya. Beberapa tujuan umum dari event kampus meliputi:
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i>Meningkatkan pengalaman dan keterampilan mahasiswa</li>
              <li><i class="ri-check-double-line"></i> Membangun komunitas dan hubungan sosial</li>
              <li><i class="ri-check-double-line"></i> Meningkatkan pemahaman akademik dan budaya</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Event kampus juga dapat menjadi platform untuk mempromosikan prestasi akademik, riset, dan inovasi yang
              dilakukan oleh mahasiswa dan fakultas. Selain itu, event kampus juga dapat menjadi sarana untuk
              menghadirkan pembicara tamu, praktisi industri, atau tokoh terkenal yang dapat memberikan wawasan dan
              inspirasi kepada mahasiswa.

            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>Event kampus Sangat Berguna Dan <strong>Bermanfaat bagi para Mahasiswa</strong></h3>
              <p>
                Event kampus memiliki potensi untuk memberikan manfaat yang luas bagi mahasiswa dan komunitas kampus.
                Dengan berpartisipasi aktif dalam event kampus, mahasiswa dapat mengembangkan keterampilan, memperluas
                jaringan, dan mendapatkan pengal
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse"
                    data-bs-target="#accordion-list-1"><span>01</span>Meningkatkan keterlibatan mahasiswa<i
                      class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      Event kampus memberikan kesempatan bagi mahasiswa untuk terlibat dalam kegiatan di luar kelas. Ini
                      membantu meningkatkan keterlibatan dan keterikatan mereka dengan lingkungan kampus dan
                      komunitasnya.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2"
                    class="collapsed"><span>02</span>Pengembangan kepemimpinan <i
                      class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Event kampus sering memerlukan tim yang terorganisir dengan peran dan tanggung jawab yang jelas.
                      Ini memberikan kesempatan bagi mahasiswa untuk mengembangkan keterampilan kepemimpinan mereka,
                      seperti mengatur tugas, mengambil keputusan, dan menginspirasi anggota tim.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span>
                    Jaringan dan hubungan sosial <i class="bx bx-chevron-down icon-show"></i><i
                      class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Event kampus merupakan tempat yang baik untuk memperluas jaringan sosial dan membangun hubungan
                      dengan sesama mahasiswa, fakultas, staf, dan pemangku kepentingan kampus lainnya. Ini dapat
                      membantu dalam menciptakan persahabatan, kolaborasi akademik, dan peluang karir di masa depan.
                    </p>
                  </div>
                </li>
                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>04</span>
                    Pengenalan budaya dan minat khusus <i class="bx bx-chevron-down icon-show"></i><i
                      class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Event kampus sering kali mencakup kegiatan yang beragam, seperti festival budaya, pameran seni,
                      konser musik, seminar, dan konferensi. Ini memberikan kesempatan bagi mahasiswa untuk mengenal dan
                      menghargai budaya, seni, dan minat khusus lainnya di antara komunitas kampus.
                    </p>
                  </div>
                </li>
              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
            style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Event</h2>
          <p>Get interesting experiences with the latest events that will soon be held on campus. Join and take part in
            these exciting events to broaden your horizons, improve your skills and forge valuable relationships. Do not
            miss this opportunity!</p>
        </div>

        <div class="row">

          <?php foreach ($penjadwalan as $dashboard): ?>
            <div class="col-lg-6 casing-event" data-aos="zoom-in" data-aos-delay="100">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="<?= base_url('uploads/' . $dashboard['gambar']) ?>" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4>
                    <?= $dashboard['Nama_Event']; ?>
                  </h4>
                  <h6>Tanggal :
                    <?= $dashboard['Tanggal']; ?>
                  </h6>
                  <h6>Jam :
                    <?= $dashboard['Jam']; ?>
                  </h6>
                  <h6>Tempat :
                    <?= $dashboard['Tempat']; ?>
                  </h6>
                  <div class="social">
                  <span class="more-user" onclick="window.location.href='<?= $dashboard['Link_Daftar']; ?>'">Daftar</span>


                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>

      </div>
    </section><!-- End Team Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Dokumentasi</h2>
          <p>Documentation is an important part of campus events. Through documentation, we record precious moments,
            share experiences, and promote activities to others. Documentation is also evaluation material and
            inspiration for the next event.</p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">All</li>
          <!-- <li data-filter=".filter-app">Expo</li>
          <li data-filter=".filter-card">UKMI</li>
          <li data-filter=".filter-web">Gemastik</li> -->
        </ul>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <?php foreach ($laporan as $item): ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="pic"><img src="<?= base_url('uploads/' . $item['gambar']) ?>" class="img-fluid" alt="">
              </div>
              <div class="portfolio-info">
                <h4>
                  <?= $item['Judul']; ?>
                </h4>
                <p>
                  <?= $item['Keterangan']; ?>
                </p>
                <a href="<?= $item['gambar']; ?>" data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"></a>

              </div>
            </div>
          <?php endforeach; ?>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <div class="section-title">
            <h2>Mitra</h2>
            <p>Partners are an important element in campus events. Partners can be institutions, companies, or
              individuals who collaborate with campuses to organize events. With partners, campus events can get support
              in terms of resources, funds, facilities and networks. Collaboration with partners can also provide
              additional benefits for event participants, such as internship opportunities, skills enhancement, and
              access to career opportunities..</p>
          </div>

          <div class="row">

            <?php foreach ($datamitra as $data): ?>
              <div class="col-xl-3 col-md-6 d-flex align-items-stretch wadah-mitra" data-aos="zoom-in"
                data-aos-delay="100">
                <div class="icon-box">
                  <div class="pic"><img src="<?= base_url('uploads/' . $data['Dokumen_Terkait']) ?>" class="img-fluid"
                      alt="">
                  </div>
                  <h4 class="judul-mitra">
                    <?= $data['Nama_Mitra']; ?>
                  </h4><br>
                  <p>Kontak:
                    <?= $data['Kontak']; ?>
                  </p>
                  <p>Kategori Mitra:
                    <?= $data['Kategori_Mitra']; ?>
                  </p>
                  <p>Deskripsi:
                    <?= $data['Deskripsi']; ?>
                  </p>
                </div>
              </div>
            <?php endforeach; ?>

          </div>



        </div>
    </section><!-- End Services Section -->

    <!-- ======= Pricing Section ======= -->
    <!-- <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pricing</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit
            in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <h3>Free Plan</h3>
              <h4><sup>$</sup>0<span>per month</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                <li class="na"><i class="bx bx-x"></i> <span>Pharetra massa massa ultricies</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <a href="#" class="buy-btn">Get Started</a>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
              <h3>Business Plan</h3>
              <h4><sup>$</sup>29<span>per month</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
                <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <a href="#" class="buy-btn">Get Started</a>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <h3>Developer Plan</h3>
              <h4><sup>$</sup>49<span>per month</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
                <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <a href="#" class="buy-btn">Get Started</a>
            </div>
          </div>

        </div>

      </div>
    </section> End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>In the context of campus events, there are often several general questions that are often asked by
            participants or potential participants. Here are some frequently asked questions and their answers:.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                data-bs-target="#faq-list-1">What is a campus event? <i class="bx bx-chevron-down icon-show"></i><i
                  class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Campus events are activities or events held on campus or by students and campus institutions for
                  specific purposes. Campus events can include various types of activities, such as seminars,
                  conferences, workshops, art performances, cultural festivals, sports competitions, exhibitions, and
                  many more..
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"
                class="collapsed">Are campus events open to the public? <i class="bx bx-chevron-down icon-show"></i><i
                  class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Policies regarding who can attend campus events can vary depending on the event. Some campus events
                  may be open to the public, while others may only be intended for certain students or campus members.
                  Check the event information to see if the event is open to the public or limited.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3"
                class="collapsed">What benefits can I get from participating in campus events? <i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Participating in campus events can provide various benefits. You can increase your experience and
                  skills, broaden your social and professional networks, gain a better understanding of a particular
                  topic or field, and have the opportunity to interact with experts or practitioners in that field. In
                  addition, campus events can also be a place to explore your interests and talents and broaden your
                  horizons.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4"
                class="collapsed">Are campus events open to the public? <i class="bx bx-chevron-down icon-show"></i><i
                  class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Policies regarding who can attend campus events can vary depending on the event. Some campus events
                  may be open to the public, while others may only be intended for certain students or campus members.
                  Check the event information to see if the event is open to the public or limited.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5"
                class="collapsed">Is there a fee that I have to pay to attend campus events? <i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Fee policies for participating in campus events may vary. Some campus events may be free, while others
                  may require payment of an entry fee or ticket. Information about costs is usually included in the
                  announcement or event registration information. Be sure to pay attention to this information so you
                  know if there is a fee to be paid.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <img src="assets/images/logo.png" alt="" width="100" height="100">
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Universitas Teknokrat Indonesia:</h4>
                <p>JL.ZA.Pagar Alam No.9-11, Labuhan Ratu,Lampung 35132</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>uti@teknokrat.ac.id</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>(0721) 702022</p>
              </div>

              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.226620181534!2d105.2578159!3d-5.382383999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40dadc7970b277%3A0x5b1fe57f83b6416c!2sUniversitas%20Teknokrat%20Indonesia!5e0!3m2!1sid!2sid!4v1685283635997!5m2!1sid!2sid"
                frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Universitas Teknokrat Indonesia</h3>
            <p>
              JL.ZA.Pagar Alam No.9-11,<br>
              Labuhan Ratu,<br>
              Lampung 35132 <br><br>
              <strong>Phone:</strong>(0721) 702022<br>
              <strong>Email:</strong> uti@teknokrat.ac.id<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
           
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
          <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Dokumentasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Mitra</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Tri Ferli Handoyo</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->

      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/laporan.js"></script>


</body>

</html>