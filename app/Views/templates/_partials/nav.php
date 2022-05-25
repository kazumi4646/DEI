<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between p-3">
    <!-- Navbar Brand-->
    <div class="nav-left">
        <a class="navbar-brand ps-3" href="<?= base_url('/'); ?>"><img src="<?= base_url(); ?>/assets/img/logo.png" width="100px" class="h-100 p-2" alt=""></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    </div>

    <!-- Navbar-->
    <div class="nav-right">
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal" href="<?= base_url('/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>