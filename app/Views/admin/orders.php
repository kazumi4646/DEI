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
						<th>Username</th>
						<th>Items</th>
						<th>Total Payment</th>
						<th>Order date</th>
						<th>Order Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>

				</tbody>
			</table>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>