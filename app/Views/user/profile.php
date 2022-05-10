<?= $this->extend('templates/base_home'); ?>
<?= $this->section('content'); ?>

<?= $this->include('templates/_partials/profile_nav'); ?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="<?= base_url('/dashboard'); ?>">Dashboard</a></li>
        <li>Profile</li>
      </ol>
      <h2>Profile</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
      <?= view('templates/_partials/message'); ?>

      <form action="<?= base_url('/profile/' . user()->id . '/update'); ?>" method="post">
        <?php foreach ($page['user'] as $user) : ?>
          <div class="row mb-3">
            <div class="col-12 col-md-2">
              <label for="username" class="form-label">Username</label>
            </div>
            <div class="col-12 col-md-10">
              <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" placeholder="Username" value="<?= user()->username; ?>" disabled>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-md-2">
              <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
            </div>
            <div class="col-12 col-md-10">
              <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" id="name" placeholder="Your full name" value="<?= user()->fullname; ?>">
              <div class="invalid-feedback">
                <?= session('errors.fullname') ?>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-md-2">
              <label for="birth" class="form-label">Date of Birth <span class="text-danger">*</span></label>
            </div>
            <div class="col-12 col-md-10">
              <input type="date" class="form-control <?php if (session('errors.birth')) : ?>is-invalid<?php endif ?>" name="birth" id="birth" placeholder="Your date of birth" value="<?= user()->birth; ?>">
              <div class="invalid-feedback">
                <?= session('errors.birth') ?>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-md-2">
              <label for="telp" class="form-label">Phone Number <span class="text-danger">*</span></label>
            </div>
            <div class="col-12 col-md-10">
              <input type="text" class="form-control <?php if (session('errors.telp')) : ?>is-invalid<?php endif ?>" name="telp" id="name" placeholder="Your phone number" value="<?= user()->telp; ?>">
              <div class="invalid-feedback">
                <?= session('errors.telp') ?>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-md-2">
              <label for="address" class="form-label">Shipping Address <span class="text-danger">*</span></label>
            </div>
            <div class="col-12 col-md-10">
              <textarea name="address" id="address" cols="5" rows="3" class="form-control <?php if (session('errors.address')) : ?>is-invalid<?php endif ?>" placeholder="Your address"><?= user()->address; ?></textarea>
              <div class="invalid-feedback">
                <?= session('errors.address') ?>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-end align-items-end">
            <button type="submit" class="btn get-started-btn">Save Changes</button>
          </div>
    </div>
  <?php endforeach; ?>
  </form>
  </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>