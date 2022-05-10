<?= $this->extend('templates/base_home'); ?>
<?= $this->section('content'); ?>

<?= $this->include('templates/_partials/home_nav'); ?>

<!-- ======= Hero Section ======= -->
<section id="home" class="d-flex align-items-center">

  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <div class="row">
      <div class="col-xl-6">
        <h1>Export your commodity with Desa Ekspor Indonesia.</h1>
        <h2>We are team of talented farmers exporting commodities with DEI.</h2>
        <a href="<?= base_url('/#about'); ?>" class="btn-get-started scrollto">About Us</a>
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">

  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients">
    <div class="container" data-aos="zoom-in">

      <div class="clients-slider swiper">
        <div class="swiper-wrapper align-items-center">
          <div class="swiper-slide"><img src="assets/img/partners/partner-1.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/partners/partner-2.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/partners/partner-3.jpg" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/partners/partner-4.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/partners/partner-5.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/partners/partner-6.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/partners/partner-7.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/partners/partner-8.jpg" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/partners/partner-9.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/partners/partner-10.jpg" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/partners/partner-11.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/partners/partner-12.jpg" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/partners/partner-13.png" class="img-fluid" alt=""></div>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Clients Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about section-bg">
    <div class="container" data-aos="fade-up">

      <div class="row no-gutters">
        <div class="content col-xl-5 d-flex align-items-stretch">
          <div class="content">
            <h3>About Desa Ekspor Indonesia</h3>
            <p>
              The Desa Ekspor Indonesia Foundation & Cooperation is a forum for fostering and developing village community-based on excellence commodity-through socialization, training, mentoring, and marketing/trading.
            </p>
            <a href="<?= base_url('/#services'); ?>" class="about-btn"><span>Our Services</span> <i class="bx bx-chevron-right"></i></a>
          </div>
        </div>
        <div class="col-xl-7 d-flex align-items-stretch">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                <i class="bi bi-book"></i>
                <h4>History</h4>
                <p><a href="<?= base_url('/history'); ?>">Our History <span class="bi bi-caret-right-fill"></span></a></p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-lightbulb"></i>
                <h4>Vision and Mission</h4>
                <p><a href="<?= base_url('/vision'); ?>">Our Vision <span class="bi bi-caret-right-fill"></span></a></p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-images"></i>
                <h4>Activity</h4>
                <p><a href="<?= base_url('/activity'); ?>">Our Activity <span class="bi bi-caret-right-fill"></span></a></p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-info-circle"></i>
                <h4>Information</h4>
                <p><a href="<?= base_url('/activity'); ?>">Press Release <span class="bi bi-caret-right-fill"></span></a></p>
              </div>
            </div>
          </div><!-- End .content-->
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-emoji-smile"></i>
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Happy Clients</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
            <i class="bi bi-journal-richtext"></i>
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
            <p>Projects</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-headset"></i>
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hours Of Support</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-people"></i>
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hard Workers</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services section-bg ">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Services</h2>
        <p>Our services covers several things, here are the things you can find on our website:</p>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-bar-chart"></i>
            <h4>Managing Post Harvest Process & Marketing.</h4>
            <p>Vanilla, Clove, Cashew, Nutmeg, Candlenut, Taro Xanthosoma, Pepper, Honey Trigona, and Bit Blood Vanilla.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <i class="bi bi-currency-dollar"></i>
            <h4>Financial</h4>
            <p>Managing Investment Fund, Managing CSR & Community Development Fund.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-house"></i>
            <h4>Construction Consultant</h4>
            <p>Green House, Screen House, and Drip Irigation.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-people"></i>
            <h4>Cultivation Consultant</h4>
            <p>Training, Mentoring, Monitoring, and Evaluation.</p>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Have any questions? We'd love to hear from you.</p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>info@example.com<br>contact@example.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
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

<?= $this->endSection(); ?>