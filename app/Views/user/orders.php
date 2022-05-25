<?= $this->extend('templates/base_home'); ?>
<?= $this->section('content'); ?>

<?= $this->include('templates/_partials/user_nav'); ?>

<main id="main">

	<!-- ======= Breadcrumbs ======= -->
	<section class="breadcrumbs">
		<div class="container">
			<ol>
				<li><a href="<?= base_url('/shop'); ?>">Shop</a></li>
				<li>My Orders</li>
			</ol>
			<h2>My Orders</h2>
		</div>
	</section>
	<!-- End Breadcrumbs -->

	<section class="inner-page">
		<div class="container" data-aos="fade-up">
			<div class="order-table d-none d-md-block">
				<table class="table w-100" id="datatables">
					<thead>
						<tr>
							<th>Transaction ID</th>
							<th>Total Items</th>
							<th>Total Price</th>
							<th>Order Date</th>
							<th>Payment Date</th>
							<th>Order Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($page['orders'] as $order) : ?>
							<tr>
								<td>
									<span class="badge bg-dark"><?= $order['trx_id']; ?></span>
								</td>
								<td><?= $order['total_items']; ?> Item(s)</td>
								<td>Rp. <?= number_format($order['total_price'], 0, ',', '.'); ?></td>
								<td><?= $order['order_date']; ?></td>
								<td>
									<?php if (!$order['payment_date']) : ?>
										<a href="<?= base_url('/payment'); ?>" class="text-dark" title="Learn why Not Available"><i>Not Available</i> <i class="far fa-question-circle text-dark fs-5 align-middle"></i></a>
									<?php endif; ?>

									<?php if ($order['payment_date']) : ?>
										<p><?= $order['payment_date']; ?></p>
									<?php endif; ?>
								</td>
								<td>
									<?php if ($order['status'] == 'Waiting for Payment') : ?>
										<a href="<?= base_url('/payment'); ?>" title="Learn how to pay">
											<span class="badge bg-dark"><?= $order['status']; ?></span> <i class="far fa-question-circle text-dark fs-5 align-middle"></i>
										</a>
									<?php endif; ?>

									<?php if ($order['status'] == 'Paid' || $order['status'] == 'Proceed' || $order['status'] == 'Delivered') : ?>
										<span class="badge bg-primary"><?= $order['status']; ?></span>
									<?php endif; ?>

									<?php if ($order['status'] == 'Success') : ?>
										<span class="badge bg-success"><?= $order['status']; ?></span>
									<?php endif; ?>

									<?php if ($order['status'] == 'Canceled') : ?>
										<span class="badge bg-danger"><?= $order['status']; ?></span>
									<?php endif; ?>
								</td>
								<td>
									<a href="<?= base_url('/orders/' . $order['id']); ?>" class="btn btn-sm btn-outline-dark">
										<i class="fas fa-info-circle"></i> Detail
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

			<div class="row portfolio-details py-0 d-block d-md-none" id="portfolio-details">
				<div class="col-12">
					<?php foreach ($page['orders'] as $order) : ?>
						<div class="portfolio-info">
							<div class="trx-overview d-flex justify-content-between">
								<span class="badge bg-dark"><?= preg_replace('/(\d{4})-(\d{2})-(\d{2})/', '\3-\2-\1', substr($order['order_date'], 0, 10)); ?></span>
								<?php if ($order['status'] == 'Waiting for Payment') : ?>
									<a href="<?= base_url('/payment'); ?>" title="Learn how to pay">
										<span class="badge bg-dark"><?= $order['status']; ?></span> <i class="far fa-question-circle text-dark fs-5 align-middle"></i>
									</a>
								<?php endif; ?>

								<?php if ($order['status'] == 'Paid' || $order['status'] == 'Proceed' || $order['status'] == 'Delivered') : ?>
									<span class="badge bg-primary"><?= $order['status']; ?></span>
								<?php endif; ?>

								<?php if ($order['status'] == 'Success') : ?>
									<span class="badge bg-success"><?= $order['status']; ?></span>
								<?php endif; ?>

								<?php if ($order['status'] == 'Canceled') : ?>
									<span class="badge bg-danger"><?= $order['status']; ?></span>
								<?php endif; ?>
							</div>
							<hr>
							<div class="order-overview d-flex justify-content-between">
								<span><?= $order['total_items']; ?> Item(s)</span>
								<span class="fw-bold"><?= 'Rp. ' . number_format($order['total_price'], 0, ',', '.'); ?></span>
							</div>
							<div class="order-detail d-flex justify-content-end mt-3">
								<a href="<?= base_url('/orders/' . $order['id']); ?>" class="btn btn-sm btn-outline-dark">
									<i class="fas fa-info-circle"></i> Detail
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

</main><!-- End #main -->

<!-- Cancel Modal -->
<div class="modal fade" id="orderDetail" tabindex="-1" aria-labelledby="orderDetailWindow" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="orderDetailWindow">Order Detail</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>