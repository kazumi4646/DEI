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
		<div class="container">
			<table class="table" id="datatables" style="width: 100%;">
				<thead>
					<tr>
						<th>Transaction ID</th>
						<th>Total Items</th>
						<th>Total Price</th>
						<th>Order Date</th>
						<th colspan="2">Payment Date</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($page['orders'] as $order) : ?>
						<tr>
							<td>
								<span class="badge bg-dark"><?= $order['trx_id']; ?></span>
							</td>
							<td><a href="<?= base_url('/orders/detail'); ?>" class="text-dark"><?= $order['total_items']; ?> Item(s)</a></td>
							<td>Rp. <?= number_format($order['total_price'], 0, ',', '.'); ?></td>
							<td><?= $order['order_date']; ?></td>
							<td>
								<?= $order['payment_date']; ?>
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
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</section>

</main><!-- End #main -->

<?= $this->endSection(); ?>