<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <a href="<?= base_url('/'); ?>" class="logo me-auto"><img src="<?= base_url(); ?>/assets/img/logo.png" alt="Logo"></a>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto" href="<?= base_url('/#home'); ?>">Home</a></li>
                <li class="dropdown"><a class="active" href="<?= base_url('/#about'); ?>"><span>About</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="<?= base_url('/activity'); ?>">Activity</a></li>
                        <li><a href="<?= base_url('/history'); ?>">History</a></li>
                        <li class="dropdown"><a href="<?= base_url('/#about'); ?>"><span>Information Center</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="<?= base_url('/release'); ?>">Press Release</a></li>
                                <li><a href="<?= base_url('/policy'); ?>">Privacy Policy</a></li>
                                <li><a href="<?= base_url('/terms'); ?>">Terms of Services</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="<?= base_url('/#services'); ?>">Services</a></li>
                <li><a class="nav-link " href="<?= base_url('/shop'); ?>">Shop</a></li>
                <li><a class="nav-link" href="<?= base_url('/blog'); ?>">Blog</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('/#contact'); ?>">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="<?= (logged_in()) ? base_url('/dashboard') : base_url('/login'); ?>" class="get-started-btn"><?= (logged_in()) ? 'Dashboard' : 'Login'; ?></a>
    </div>
</header><!-- End Header -->