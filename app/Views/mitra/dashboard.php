<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
	<div class="alert alert-warning mt-4" role="alert">
		<h4 class="alert-heading">
			<?php
			date_default_timezone_set('Asia/Jakarta');;
			$time = date("H");

			if ($time < "11") {
				echo "Good morning, " . user()->username . '.';
			} else if ($time >= "11" && $time <= "18") {
				echo "Good afternoon, " . user()->username . '.';
			} else if ($time > "18") {
				echo "Good evening, " . user()->username . '.';
			}
			?>
		</h4>
		<p>
			<?php foreach ($data['status'] as $status): ?>
				<?php if ($status['pembayaran_koperasi'] != 'Lunas'): ?>
					Please <a href="<?= base_url('/payment'); ?>" class="alert-link" style="text-decoration: underline;">confirm your payment</a> before using our feature.
				<?php endif; ?>

				<?php if (user()->address == null && $status['pembayaran_koperasi'] == 'Lunas'): ?>
					You can complete your profile by <a href="<?= base_url('/profile'); ?>" class="alert-link" style="text-decoration: underline;">refer to this page</a>.
				<?php endif; ?>

				<?php if (user()->address != null && $status['pembayaran_koperasi'] == 'Lunas'): ?>
					You don't have any new notification available.
				<?php endif; ?>
			<?php endforeach; ?>
		</p>
		<hr>
		<p class="mb-0">Desa Ekspor Indonesia.</p>
	</div>

	<div class="card mb-4">
		<div class="card-body">
			<h4 class="mb-3">Approved Product Request</h4>
			<table class="table table-striped" id="datatables">
				<thead>
					<tr>
						<th></th>
						<th>Product Image</th>
						<th>Product Name</th>
						<th>Product Price</th>
						<th>Product Description</th>
						<th>Product Status</th>
						<th>Request Status</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($data['requests'] as $request): ?>
						<tr>
							<td><?= $i++; ?></td>
							<td><img src="<?= base_url() . '/uploads/' . $request['image']; ?>" alt="<?= $request['name']; ?>" width="200px"></td>
							<td><?= $request['name']; ?></td>
							<td><?= $request['price']; ?></td>
							<td><?= $request['description']; ?></td>
							<td>
								<span class="badge <?= $request['status'] == 'Pre Order' ? 'bg-warning text-dark' : ($request['status'] == 'In Stock' ? 'bg-primary' : 'bg-danger'); ?>"><?= $request['status']; ?></span>
							</td>
							<td>
								<span class="badge bg-success"><?= $request['request']; ?></span>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>