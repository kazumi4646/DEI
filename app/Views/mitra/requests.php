<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
	<h1 class="mt-4">Product Request</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="<?= base_url('/dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Product Request</li>
	</ol>
	<div class="card mb-4">
		<div class="card-body">
			<?= view('templates/_partials/message'); ?>
			<table id="datatables">
				<thead>
					<tr>
						<th></th>
						<th>Product Image</th>
						<th>Product Name</th>
						<th>Product Price</th>
						<th>Product Description</th>
						<th>Product Status</th>
						<th>Request Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($data['requests'] as $request) : ?>
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
								<?php if ($request['request'] == 'Not Requested') : ?>
									<span class="badge bg-dark"><?= $request['request']; ?></span>
								<?php endif; ?>

								<?php if ($request['request'] == 'Requested') : ?>
									<span class="badge bg-primary"><?= $request['request']; ?></span>
								<?php endif; ?>

								<?php if ($request['request'] == 'Approved') : ?>
									<span class="badge bg-success"><?= $request['request']; ?></span>
								<?php endif; ?>

								<?php if ($request['request'] == 'Rejected') : ?>
									<span class="badge bg-danger"><?= $request['request']; ?></span>
									<div class="alert alert-warning mt-2" role="alert">
										<b>Reject Reason:</b><br>
										<?= $request['reason']; ?>
									</div>
								<?php endif; ?>
							</td>
							<td>
								<?php if ($request['request'] == 'Not Requested' || $request['request'] == 'Rejected') : ?>
									<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#requestModal" id="btn-request" data-id="<?= $request['id']; ?>">
										<i class="fas fa-handshake"></i> Request
									</button>
								<?php endif; ?>

								<?php if ($request['request'] == 'Requested' || $request['request'] == 'Approved') : ?>
									<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal" id="btn-cancel" data-id="<?= $request['id']; ?>" data-status="<?= $request['request']; ?>">
										<i class="fas fa-handshake-alt-slash"></i> <?= ($request['request'] != 'Approved') ? 'Cancel' : 'Remove'; ?>
									</button>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Request Modal -->
<div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="modalWindow" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalWindow">Request product?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url(); ?>/requests/" method="post" id="requestForm">
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					You're about to request this product to be displayed on Desa Ekspor Indonesia <a href="<?= base_url('/shop'); ?>">Shopping Page</a>.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Request Product</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Cancel Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="modalWindow" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalWindow">Are you sure?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url(); ?>/requests/" method="post" id="cancelForm">
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<span id="status"></span> Desa Ekspor Indonesia <a href="<?= base_url('/shop'); ?>">Shopping Page</a>.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-danger" id="action"></button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	// Request Modal
	$(document).on('click', '#btn-request', function() {
		let id = $(this).data('id');

		$('#id').val(id);
	});

	$(document).on('submit', '#requestForm', function() {
		let id = $('#id').val();
		let formAction = $('#requestForm').attr('action');

		$('#requestForm').attr('action', formAction + id + '/request');
	});

	// Cancel Modal
	$(document).on('click', '#btn-cancel', function() {
		let id = $(this).data('id');
		let status = $(this).data('status');
		let message = '';
		let action = '';

		if (status != 'Approved') {
			message = "You'll need to request this product again in order to be displayed on";
			action = 'Cancel Product Request';
		} else {
			message = "You're about to remove this product from";
			action = 'Remove Product';
		}

		$('#id').val(id);
		document.querySelector('#status').innerHTML = message;
		document.querySelector('#action').innerHTML = action;
	});

	$(document).on('submit', '#cancelForm', function() {
		let id = $('#id').val();
		let formAction = $('#cancelForm').attr('action');

		$('#cancelForm').attr('action', formAction + id + '/cancel');
	});
</script>

<?= $this->endSection(); ?>