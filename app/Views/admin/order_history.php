<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
	<h1 class="mt-4">Order History</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="<?= base_url('/dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Order History</li>
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
						<th>Total Payment</th>
						<th>Order date</th>
						<th>Payment date</th>
						<th>Order Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($data['histories'] as $history) : ?>
						<tr>
							<td><?= $i++; ?></td>
							<td><span class="badge bg-dark"><?= $history['trx_id']; ?></span></td>
							<td><?= $history['email']; ?></td>
							<td>Rp. <?= number_format($history['total_price'], 0, ',', '.'); ?></td>
							<td><?= $history['order_date']; ?></td>
							<td <?= (!$history['payment_date'] && $history['status'] == 'Canceled') ? 'colspan="2" class="text-center"' : ''; ?>>
								<?php if ($history['payment_date']) : ?>
									<?= $history['payment_date']; ?>
								<?php endif; ?>

								<?php if ($history['status'] == 'Canceled') : ?>
									<span class="badge bg-danger">Canceled</span>
								<?php endif; ?>
							</td>
							<?php if ($history['status'] == 'Success') : ?>
								<td>
									<span class="badge bg-success">Success</span>
								</td>
							<?php endif; ?>
							<td>
								<a href="<?= base_url('/orders/' . $history['id']); ?>" class="btn btn-sm btn-outline-dark"><i class="fas fa-info-circle"></i> Detail</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>