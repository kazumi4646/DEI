<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link active mt-4" href="<?= base_url('/dashboard'); ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <?php if (in_groups('admin') || in_groups('mitra')) : ?>
                <div class="sb-sidenav-menu-heading">Management</div>

                <?php if (in_groups('admin')) : ?>
                    <a class="nav-link" href="<?= base_url('/dashboard/shop'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                        Shop
                    </a>
                <?php endif; ?>

                <a class="nav-link" href="<?= base_url('/products'); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                    My Products
                </a>
            <?php endif; ?>

            <?php if (in_groups('admin')) : ?>
                <a class="nav-link" href="<?= base_url('/accounts'); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                    User Accounts
                </a>
                <a class="nav-link" href="<?= base_url('/mitra'); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                    Mitra
                </a>
                <a class="nav-link" href="<?= base_url('/requests'); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tag"></i></div>
                    Product Request
                </a>
                <a class="nav-link" href="<?= base_url('/orders'); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                    Product Order
                </a>
                <a class="nav-link" href="<?= base_url('/orders/history'); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-invoice"></i></div>
                    Order History
                </a>
            <?php endif; ?>

            <?php if (in_groups('mitra')) : ?>
                <a class="nav-link" href="<?= base_url('/requests'); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tag"></i></div>
                    My Product Request
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <?= user()->username; ?>
    </div>
</nav>

<script>
    $('.nav-link').on('click', function() {
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    });
</script>