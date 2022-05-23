<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Order Details</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= base_url('/order/history'); ?>">Order History</a></li>
        <li class="breadcrumb-item active">Order Details</li>
    </ol>
    <div class="row">
        <!-- Order overview (mobile view) -->
        <div class="col-12 col-md-5 d-block d-md-none mb-3">
            <div class="card">
                <div class="card-body">
                    <span>Transaction ID:</span>
                    <p class="mb-1 fw-bold">
                        <span class="badge bg-dark"><?= $data['orders']['trx_id']; ?></span>
                    </p>

                    <span>Order Date:</span>
                    <p class="fw-bold mb-1"><?= $data['orders']['order_date']; ?></p>

                    <span>Payment Date:</span>
                    <?php if ($data['orders']['status'] != 'Canceled') : ?>
                        <p class="fw-bold mb-1">
                            <?php if (!$data['orders']['payment_date'] && $data['orders']['status'] != 'Canceled') : ?>
                                <span class="fw-normal fst-italic">Not Available <?= (in_groups('user')) ? '<a href="' . base_url('/payment') .  '"><i class="far fa-question-circle text-dark fs-5 align-middle"></i></a>' : ''; ?></span>
                            <?php endif; ?>

                            <?php if ($data['orders']['payment_date']) : ?>
                                <?= $data['orders']['payment_date']; ?>
                            <?php endif; ?>
                        </p>
                    <?php endif; ?>

                    <span>Order Status:</span>
                    <p class="mb-1 fw-bold">
                        <?php if ($data['orders']['status'] == 'Waiting for Payment') : ?>
                            <a href="<?= base_url('/payment'); ?>" title="Learn how to pay">
                                <span class="badge bg-dark"><?= $data['orders']['status']; ?></span> <i class="far fa-question-circle text-dark fs-5 align-middle"></i>
                            </a>
                        <?php endif; ?>

                        <?php if ($data['orders']['status'] == 'Paid' || $data['orders']['status'] == 'Proceed' || $data['orders']['status'] == 'Delivered') : ?>
                            <span class="badge bg-primary"><?= $data['orders']['status']; ?></span>
                        <?php endif; ?>

                        <?php if ($data['orders']['status'] == 'Success') : ?>
                            <span class="badge bg-success"><?= $data['orders']['status']; ?></span>
                        <?php endif; ?>

                        <?php if ($data['orders']['status'] == 'Canceled') : ?>
                            <span class="badge bg-danger"><?= $data['orders']['status']; ?></span>
                        <?php endif; ?>
                    </p>

                    <span>Shipping Number:</span>
                    <p class="fw-bold mb-1">
                        <?= (!$data['orders']['shipping_number'] && $data['orders']['status'] != 'Canceled') ? '<i class="fw-normal fst-italic">Not Available</i>' : '<span class="badge bg-dark">' . $data['orders']['shipping_number'] . '</span>'; ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Order overview & order detail (other screen) -->
        <div class="col-12 col-md-7 d-none d-md-block">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <span>Transaction ID</span>
                        </div>
                        <div class="col-8">
                            <p class="mb-1 fw-bold">
                                : <span class="badge bg-dark"><?= $data['orders']['trx_id']; ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <span>Order Date</span>
                        </div>
                        <div class="col-8">
                            <p class="fw-bold mb-1">: <?= $data['orders']['order_date']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <span>Payment Date</span>
                        </div>
                        <div class="col-8">
                            <?php if ($data['orders']['status'] != 'Canceled') : ?>
                                <p class="fw-bold mb-1">
                                    <?php if (!$data['orders']['payment_date'] && $data['orders']['status'] != 'Canceled') : ?>
                                        : <span class="fw-normal fst-italic">Not Available <?= (in_groups('user')) ? '<a href="' . base_url('/payment') .  '"><i class="far fa-question-circle text-dark fs-5 align-middle"></i></a>' : ''; ?></span>
                                    <?php endif; ?>

                                    <?php if ($data['orders']['payment_date']) : ?>
                                        : <?= $data['orders']['payment_date']; ?>
                                    <?php endif; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <span>Order Status</span>
                        </div>
                        <div class="col-8">
                            <p class="mb-1 fw-bold">
                                <?php if ($data['orders']['status'] == 'Waiting for Payment') : ?>
                                    : <a href="<?= base_url('/payment'); ?>" title="Learn how to pay">
                                        <span class="badge bg-dark"><?= $data['orders']['status']; ?></span> <i class="far fa-question-circle text-dark fs-5 align-middle"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if ($data['orders']['status'] == 'Paid' || $data['orders']['status'] == 'Proceed' || $data['orders']['status'] == 'Delivered') : ?>
                                    : <span class="badge bg-primary"><?= $data['orders']['status']; ?></span>
                                <?php endif; ?>

                                <?php if ($data['orders']['status'] == 'Success') : ?>
                                    : <span class="badge bg-success"><?= $data['orders']['status']; ?></span>
                                <?php endif; ?>

                                <?php if ($data['orders']['status'] == 'Canceled') : ?>
                                    : <span class="badge bg-danger"><?= $data['orders']['status']; ?></span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                    <?php if ($data['orders']['status'] != 'Canceled') : ?>
                        <div class="row">
                            <div class="col-4">
                                <span>Shipping Number</span>
                            </div>
                            <div class="col-8">
                                <p class="fw-bold mb-1">
                                    : <?= (!$data['orders']['shipping_number'] && $data['orders']['status'] != 'Canceled') ? '<i class="fw-normal fst-italic">Not Available</i>' : '<span class="badge bg-dark">' . $data['orders']['shipping_number'] . '</span>'; ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card p-3 mb-3">
                <h5 class="card-title">Transaction Detail</h5>
                <div class="card-body pb-0">
                    <?php for ($i = 0; $i < count($data['detailName']); $i++) : ?>
                        <div class="row align-items-center mb-2">
                            <div class="col-4">
                                <?php if (file_exists('uploads/products/' . $data['detailImage'][$i])) : ?>
                                    <img src="<?= base_url('/uploads/products/' . $data['detailImage'][$i]); ?>" alt="<?= $data['detailName'][$i]; ?>" class="w-100">
                                <?php endif; ?>

                                <?php if (!file_exists('uploads/products/' . $data['detailImage'][$i])) : ?>
                                    <img src="" alt="Image may be changed or deleted.">
                                <?php endif; ?>
                            </div>
                            <div class="col-8">
                                <p class="fw-bold mb-1"><?= $data['detailName'][$i]; ?></p>
                                <p class="fs-6"><?= $data['detailQty'][$i] . ' x Rp. ' . number_format($data['detailPrice'][$i], 0, ',', '.'); ?></p>
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
                            <p class="fs-6"><?= 'Rp. ' . number_format($data['orders']['total_price'], 0, ',', '.'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer detail (all screen) -->
        <div class="col-12 col-md-5 mb-3">
            <div class="card p-3">
                <h5 class="card-title">Customer Detail</h5>
                <div class="card-body pb-0">
                    <span>Customer Name:</span>
                    <p class="fw-bold"><?= $data['orders']['customer_name']; ?></p>

                    <span>Customer Address:</span>
                    <p class="fw-bold"><?= $data['orders']['shipping_address']; ?></p>

                    <span>Customer Phone Number:</span>
                    <p class="fw-bold"><?= $data['orders']['customer_phone']; ?></p>

                    <span>Customer Email:</span>
                    <p class="fw-bold"><?= $data['orders']['customer_email']; ?></p>
                </div>
            </div>
        </div>

        <!-- transaction detail (mobile view) -->
        <div class="col-12 col-md-5 mb-3 d-block d-md-none">
            <div class="card p-3">
                <h5 class="card-title">Transaction Detail</h5>
                <div class="card-body pb-0">
                    <?php for ($i = 0; $i < count($data['detailName']); $i++) : ?>
                        <div class="row align-items-start mb-2">
                            <div class="col-4">
                                <?php if (file_exists('uploads/products/' . $data['detailImage'][$i])) : ?>
                                    <img src="<?= base_url('/uploads/products/' . $data['detailImage'][$i]); ?>" alt="<?= $data['detailName'][$i]; ?>" class="w-100">
                                <?php endif; ?>

                                <?php if (!file_exists('uploads/products/' . $data['detailImage'][$i])) : ?>
                                    <img src="" alt="Image may be changed or deleted.">
                                <?php endif; ?>
                            </div>
                            <div class="col-8">
                                <p class="fw-bold mb-1"><?= $data['detailName'][$i]; ?></p>
                                <p class="fs-6"><?= $data['detailQty'][$i] . ' x Rp. ' . number_format($data['detailPrice'][$i], 0, ',', '.'); ?></p>
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
                            <p class="fs-6"><?= 'Rp. ' . number_format($data['orders']['total_price'], 0, ',', '.'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>