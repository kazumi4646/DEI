<?= $this->extend('templates/base_home'); ?>
<?= $this->section('content'); ?>

<?= $this->include('templates/_partials/user_nav'); ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="<?= base_url('/orders'); ?>"><?= (in_groups('user')) ? 'My ' : ''; ?>Orders</a></li>
                <li>Order Details</li>
            </ol>
            <h2>Order Details</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container" data-aos="fade-up">
            <div class="row portfolio-details p-0" id="portfolio-details">
                <!-- Order overview (mobile) -->
                <div class="col-12 mt-0">
                    <div class="portfolio-info d-block d-md-none">
                        <span>Transaction ID:</span>
                        <p class="mb-2">
                            <span class="badge bg-dark"><?= $page['orders']['trx_id']; ?></span>
                        </p>

                        <span>Order Date:</span>
                        <p class="fw-bold mb-2"><?= $page['orders']['order_date']; ?></p>

                        <?php if ($page['orders']['status'] != 'Canceled') : ?>
                            <span>Payment Date:</span>
                            <p class="fw-bold mb-2">
                                <?php if (!$page['orders']['payment_date'] && $page['orders']['status'] != 'Canceled') : ?>
                                    <span class="fw-normal fst-italic">Not Available <?= (in_groups('user')) ? '<a href="' . base_url('/payment') .  '"><i class="far fa-question-circle text-dark fs-5 align-middle"></i></a>' : ''; ?></span>
                                <?php endif; ?>

                                <?php if ($page['orders']['payment_date']) : ?>
                                    <?= $page['orders']['payment_date']; ?>
                                <?php endif; ?>
                            </p>
                        <?php endif; ?>

                        <span>Order Status:</span>
                        <p class="mb-2">
                            <?php if ($page['orders']['status'] == 'Waiting for Payment') : ?>
                                <a href="<?= base_url('/payment'); ?>" title="Learn how to pay">
                                    <span class="badge bg-dark"><?= $page['orders']['status']; ?></span> <i class="far fa-question-circle text-dark fs-5 align-middle"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ($page['orders']['status'] == 'Paid' || $page['orders']['status'] == 'Proceed' || $page['orders']['status'] == 'Delivered') : ?>
                                <span class="badge bg-primary"><?= $page['orders']['status']; ?></span>
                            <?php endif; ?>

                            <?php if ($page['orders']['status'] == 'Success') : ?>
                                <span class="badge bg-success"><?= $page['orders']['status']; ?></span>
                            <?php endif; ?>

                            <?php if ($page['orders']['status'] == 'Canceled') : ?>
                                <span class="badge bg-danger"><?= $page['orders']['status']; ?></span>
                            <?php endif; ?>
                        </p>

                        <?php if ($page['orders']['status'] != 'Canceled') : ?>
                            <span>Shipping Number:</span>
                            <p class="fw-bold mb-2">
                                <?= (!$page['orders']['shipping_number'] && $page['orders']['status'] != 'Canceled') ? '<i class="fw-normal">Not Available</i>' : '<span class="badge bg-dark">' . $page['orders']['shipping_number'] . '</span>'; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Order overview (other screen) -->
                <div class="col-7 d-none d-md-block">
                    <div class="row fw-bold mb-4">
                        <div class="col-4 mb-1">
                            Transaction ID
                        </div>
                        <div class="col-8 mb-1">
                            : <span class="badge bg-dark"><?= $page['orders']['trx_id']; ?></span>
                        </div>
                        <div class="col-4 mb-1">
                            Order Date
                        </div>
                        <div class="col-8 mb-1">
                            : <?= $page['orders']['order_date']; ?>
                        </div>
                        <?php if ($page['orders']['status'] != 'Canceled') : ?>
                            <div class="col-4 mb-1">
                                Payment Date
                            </div>
                            <div class="col-8 mb-1">
                                <?php if (!$page['orders']['payment_date'] && $page['orders']['status'] != 'Canceled') : ?>
                                    : <span class="fw-normal fst-italic">Not Available <?= (in_groups('user')) ? '<a href="' . base_url('/payment') .  '"><i class="far fa-question-circle text-dark fs-5 align-middle"></i></a>' : ''; ?></span>
                                <?php endif; ?>

                                <?php if ($page['orders']['payment_date']) : ?>
                                    : <?= $page['orders']['payment_date']; ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="col-4 mb-1">
                            Order Status
                        </div>
                        <div class="col-8 mb-1">
                            : <?php if ($page['orders']['status'] == 'Waiting for Payment') : ?>
                                <a href="<?= base_url('/payment'); ?>" title="Learn how to pay">
                                    <span class="badge bg-dark"><?= $page['orders']['status']; ?></span> <i class="far fa-question-circle text-dark fs-5 align-middle"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ($page['orders']['status'] == 'Paid' || $page['orders']['status'] == 'Proceed' || $page['orders']['status'] == 'Delivered') : ?>
                                <span class="badge bg-primary"><?= $page['orders']['status']; ?></span>
                            <?php endif; ?>

                            <?php if ($page['orders']['status'] == 'Success') : ?>
                                <span class="badge bg-success"><?= $page['orders']['status']; ?></span>
                            <?php endif; ?>

                            <?php if ($page['orders']['status'] == 'Canceled') : ?>
                                <span class="badge bg-danger"><?= $page['orders']['status']; ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if ($page['orders']['status'] != 'Canceled') : ?>
                            <div class="col-4 mb-1">
                                Shipping Number
                            </div>
                            <div class="col-8 mb-1">
                                : <?= (!$page['orders']['shipping_number'] && $page['orders']['status'] != 'Canceled') ? '<i class="fw-normal">Not Available</i>' : '<span class="badge bg-dark">' . $page['orders']['shipping_number'] . '</span>'; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Order details (other screen) -->
                    <?php for ($i = 0; $i < count($page['detailName']); $i++) : ?>
                        <div class="row align-items-center mb-2">
                            <div class="col-4">
                                <?php if (file_exists('uploads/products/' . $page['detailImage'][$i])) : ?>
                                    <img src="<?= base_url('/uploads/products/' . $page['detailImage'][$i]); ?>" alt="<?= $page['detailName'][$i]; ?>" class="w-100">
                                <?php endif; ?>

                                <?php if (!file_exists('uploads/products/' . $page['detailImage'][$i])) : ?>
                                    <img src="" alt="Image may be changed or deleted.">
                                <?php endif; ?>
                            </div>
                            <div class="col-8">
                                <p class="fw-bold fs-5 mb-1"><?= $page['detailName'][$i]; ?></p>
                                <p class="fs-6"><?= $page['detailQty'][$i] . ' x Rp. ' . number_format($page['detailPrice'][$i], 0, ',', '.'); ?></p>
                            </div>
                        </div>
                    <?php endfor; ?>
                    <div class="row">
                        <div class="col-8 offset-4">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 offset-4">
                            <p class="fw-bold fs-5 mb-1">Total</p>
                            <p class="fs-6"><?= 'Rp. ' . number_format($page['orders']['total_price'], 0, ',', '.'); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Customer overview (responsive) -->
                <div class="col-12 col-md-5">
                    <div class="portfolio-info d-md-block">
                        <h3>Customer Detail</h3>
                        <div class="mb-3">
                            <span>Customer Name:</span>
                            <p><b><?= $page['orders']['customer_name']; ?></b></p>

                            <span>Customer Address:</span>
                            <p><b><?= $page['orders']['shipping_address']; ?></b></p>

                            <span>Customer Phone Number:</span>
                            <p><b><?= $page['orders']['customer_phone']; ?></b></p>

                            <span>Customer Email:</span>
                            <p><b><?= $page['orders']['customer_email']; ?></b></p>
                        </div>
                    </div>
                </div>

                <!-- Order details (mobile) -->
                <div class="col-12 col-md-5">
                    <div class="portfolio-info d-block d-md-none">
                        <h3>Transaction Detail</h3>
                        <?php for ($i = 0; $i < count($page['detailName']); $i++) : ?>
                            <div class="row align-items-start mb-2">
                                <div class="col-4">
                                    <?php if (file_exists('uploads/products/' . $page['detailImage'][$i])) : ?>
                                        <img src="<?= base_url('/uploads/products/' . $page['detailImage'][$i]); ?>" alt="<?= $page['detailName'][$i]; ?>" class="w-100">
                                    <?php endif; ?>

                                    <?php if (!file_exists('uploads/products/' . $page['detailImage'][$i])) : ?>
                                        <img src="" alt="Image may be changed or deleted.">
                                    <?php endif; ?>
                                </div>
                                <div class="col-8">
                                    <p class="fw-bold mb-1"><?= $page['detailName'][$i]; ?></p>
                                    <p class="fs-6"><?= $page['detailQty'][$i] . ' x Rp. ' . number_format($page['detailPrice'][$i], 0, ',', '.'); ?></p>
                                </div>
                            </div>
                        <?php endfor; ?>
                        <div class="row">
                            <div class="col-8 offset-4">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 offset-4">
                                <p class="fw-bold mb-1">Total</p>
                                <p class="fs-6"><?= 'Rp. ' . number_format($page['orders']['total_price'], 0, ',', '.'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>