<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
	<h1 class="mt-4">Product Order</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="<?= base_url('/dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Product Order</li>
	</ol>
	<div class="card mb-4">
		<div class="card-body">
			<?= view('templates/_partials/message'); ?>
			<table id="datatables">
				<thead>
					<tr>
						<th></th>
						<th>Transaction ID</th>
						<th>Email</th>
						<th>Items</th>
						<th>Total Payment</th>
						<th>Order date</th>
						<th>Order Status</th>
						<th>Proof of Payment</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($data['orders'] as $order) : ?>
						<tr>
							<td><?= $i++; ?></td>
							<td><span class="badge bg-dark"><?= $order['trx_id']; ?></span></td>
							<td><?= $order['email']; ?></td>
							<td>
								<?= ($order['total_items'] > 1) ? $order['total_items'] . ' Items' : $order['total_items'] . ' Item' ?>
							</td>
							<td>Rp. <?= number_format($order['total_price'], 0, ',', '.'); ?></td>
							<td><?= $order['order_date']; ?></td>
							<td>
								<?php if ($order['status'] == 'Waiting for Payment') : ?>
									<span class="badge bg-dark">Waiting for Payment</span>
								<?php endif; ?>

								<?php if ($order['status'] == 'Paid') : ?>
									<span class="badge bg-primary">Paid</span>
								<?php endif; ?>

								<?php if ($order['status'] == 'Proceed') : ?>
									<span class="badge bg-warning text-dark">Proceed</span>
								<?php endif; ?>

								<?php if ($order['status'] == 'Delivered') : ?>
									<span class="badge bg-success">Delivered</span>
								<?php endif; ?>
							</td>
							<td>
								<?php if ($order['status'] != 'Waiting for Payment') : ?>
									<a href="#" class="btn btn-sm btn-dark"><i class="fas fa-file-invoice fs-5"></i></a>
								<?php endif; ?>
							</td>
							<td></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>