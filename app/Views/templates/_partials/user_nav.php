<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center">
    <a href="<?= base_url('/'); ?>" class="logo me-auto"><img src="<?= base_url(); ?>/assets/img/logo.png" alt="Logo"></a>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link" href="<?= base_url('/'); ?>">Home</a></li>
        <li class="dropdown"><a class="nav-link active" href="#"><span>Shop</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="<?= base_url('/shop'); ?>">Shopping Page</a></li>
            <li><a href="<?= base_url('/cart'); ?>">My Shopping Cart</a></li>
            <li><a href="<?= base_url('/orders'); ?>">My Orders</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="d-md-block d-none align-items-center">
            <span><i class="bi bi-person-bounding-box fs-4"></i></span>
          </a>
          <a href="<?= base_url('/profile'); ?>" class="d-md-none">
            Profile <i class="bi bi-chevron-down"></i>
          </a>
          <ul>
            <li><a href="<?= base_url('/profile'); ?>"><?= user()->username; ?></a></li>
            <hr class="my-0">
            <li><a href="<?= base_url('/profile'); ?>">My Profile</a></li>
            <li><a data-bs-toggle="modal" data-bs-target="#logoutModal" href="<?= base_url('/logout'); ?>">Logout</a></li>
          </ul>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <a href="<?= (logged_in()) ? base_url('/cart') : base_url('/login'); ?>" class="get-started-btn"><?= (logged_in()) ? '<i class="fas fa-shopping-cart"></i> Cart' : 'Login'; ?></a>
  </div>
</header><!-- End Header -->