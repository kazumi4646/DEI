<?= $this->extend('templates/base_home'); ?>
<?= $this->section('content'); ?>

<!-- ======= Header ======= -->
<?php if (in_groups('user')) {
  echo $this->include('templates/_partials/user_nav');
} else {
  echo $this->include('templates/_partials/shop_nav');
} ?>
<!-- End Header -->

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="<?= base_url('/shop'); ?>">Shop</a></li>
        <li><?= $page['section']; ?></li>
      </ol>
      <h2><?= $page['section']; ?></h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container" data-aos="fade-up">
      <?= $this->renderSection('inner'); ?>
    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>