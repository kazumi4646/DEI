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
						<th>Request by</th>
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
							<td><?= $request['username']; ?></td>
							<td><img src="<?= base_url() . '/uploads/products/' . $request['image']; ?>" alt="<?= $request['name']; ?>" width="200px"></td>
							<td><?= $request['name']; ?></td>
							<td><?= 'Rp. ' . number_format($request['price'], 0, ',', '.') . '/' . $request['unit_price']; ?></td>
							<td><?= $request['description']; ?></td>
							<td>
								<span class="badge <?= $request['status'] == 'Pre Order' ? 'bg-warning text-dark' : ($request['status'] == 'In Stock' ? 'bg-primary' : 'bg-danger'); ?>"><?= $request['status']; ?></span>
							</td>
							<td><span class="badge bg-dark"><?= $request['request']; ?></span></td>
							<td>
								<div class="approve mb-2">
									<button type="button" id="btn-approve" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approveModal" data-id="<?= $request['id']; ?>" data-name="<?= $request['name']; ?>" title="Approve this product request">
										<i class="fas fa-check-circle"></i> Approve
									</button>
								</div>
								<div class="reject">
									<button type="button" id="rejectModal" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reject" data-id="<?= $request['id']; ?>" data-name="<?= $request['name']; ?>" title="Reject this product request">
										<i class="fas fa-times-circle"></i> Reject
									</button>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Approve Reason -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="modalWindow" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalWindow">Approve request?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url(); ?>/requests/" method="post" id="approveForm">
				<div class="modal-body">
					<input type="hidden" name="id" id="id_approve">
					<div id="info"></div>
					<div class="alert alert-warning mt-3">
						Note: <b>This product will be displayed on <a href="<?= base_url('/shop'); ?>">Shopping Page</a></b>.
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Approve Product Request</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Reject Reason -->
<div class="modal fade" id="reject" tabindex="-1" aria-labelledby="rejectReason" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="rejectReason">Reason to Reject</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('/requests/reject'); ?>" method="post">
				<div class="modal-body">
					<input type="hidden" name="id" id="id_product">
					<div id="info"></div>
					<div class="row my-3">
						<div class="col-3">
							Reason
						</div>
						<div class="col-9">
							<textarea name="reason" class="form-control" cols="5" rows="3" placeholder="Your reason" required></textarea>
						</div>
					</div>
					<div class="alert alert-warning">
						Note: <b>Mitra still can re-submit the product request</b>.
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger">Reject Product Request</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).on('click', '#btn-approve', function() {
		let id = $(this).data('id');
		let name = $(this).data('name');

		$('#id_approve').val(id);
		document.querySelector('#info').innerHTML = 'This action will state <span class="badge bg-success">Approved</span> to product with name "<b>' + name + '</b>".';
	});

	$(document).on('submit', '#approveForm', function() {
		let id = $('#id_approve').val();
		let formAction = $('#approveForm').attr('action');

		$('#approveForm').attr('action', formAction + id + '/approve');
	});

	$(document).on('click', '#rejectModal', function() {
		let id = $(this).data('id');
		let name = $(this).data('name');

		$('#id_product').val(id);
		document.querySelector('#info').innerHTML = 'This action will state <span class="badge bg-danger">Rejected</span> to product with name "<b>' + name + '</b>".<br>Please write down your reason to reject.';
	});
</script>

<?= $this->endSection(); ?>