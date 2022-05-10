<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center">
    <a href="<?= base_url('/'); ?>" class="logo me-auto"><img src="<?= base_url(); ?>/assets/img/logo.png" alt="Logo"></a>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link" href="<?= base_url('/'); ?>">Home</a></li>
        <li><a class="nav-link active" href="<?= base_url('/shop'); ?>">Shop</a></li>
        <li><a class="nav-link" href="<?= base_url('/blog'); ?>">Blog</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <?php if (!logged_in()) : ?>
      <a href="<?= base_url('/login'); ?>" class="get-started-btn">Login</a>
    <?php endif; ?>

    <?php if (logged_in()) : ?>
      <?php if (in_groups('admin') || in_groups('mitra')) : ?>
        <a href="<?= base_url('/dashboard'); ?>" class="get-started-btn">Dashboard</a>
      <?php endif; ?>

      <?php if (in_groups('user')) : ?>
        <a href="<?= base_url('/cart'); ?>" class="get-started-btn">Cart</a>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</header><!-- End Header -->