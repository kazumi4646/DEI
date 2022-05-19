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
								<?php if ($order['status'] == 'Waiting for Payment') : ?>
									<button type="button" id="btn-status" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#statusModal" data-id="<?= $order['id']; ?>" data-trx_id="<?= $order['trx_id']; ?>" data-status="Paid" title="Confirm this order payment">
										<i class="fas fa-thumbs-up"></i> Confirm Payment
									</button>
								<?php endif; ?>

								<?php if ($order['status'] == 'Paid') : ?>
									<button type="button" id="btn-status" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#statusModal" data-id="<?= $order['id']; ?>" data-trx_id="<?= $order['trx_id']; ?>" data-status="Proceed" title="Process this order">
										<i class="fas fa-dolly-flatbed"></i> Proceed Order
									</button>
								<?php endif; ?>

								<?php if ($order['status'] == 'Proceed') : ?>
									<button type="button" id="btn-deliver" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#deliverModal" data-id="<?= $order['id']; ?>" data-trx_id="<?= $order['trx_id']; ?>" data-status="Delivered" title="Deliver this order">
										<i class="fas fa-truck"></i> Deliver Order
									</button>
								<?php endif; ?>

								<?php if ($order['status'] == 'Delivered') : ?>
									<button type="button" id="btn-status" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#statusModal" data-id="<?= $order['id']; ?>" data-trx_id="<?= $order['trx_id']; ?>" data-status="Success" title="Finish this order">
										<i class="fas fa-check-circle"></i> Finish Order
									</button>
								<?php endif; ?>

								<?php if ($order['status'] == 'Waiting for Payment') : ?>
									<button type="button" id="btn-cancel" class="btn btn-sm bg-danger text-light mt-1" data-bs-toggle="modal" data-bs-target="#cancelModal" data-id="<?= $order['id']; ?>" data-trx_id="<?= $order['trx_id']; ?>" data-status="Success" title="Cancel this order">
										<i class="fas fa-times-circle"></i> Cancel Order
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

<!-- Status Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="modalWindow" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalWindow"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url(); ?>/orders/" method="post" id="statusForm">
				<div class="modal-body">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="status" id="status">
					<div id="info">
						This action will state <span id="statusBadge"></span> to order with Transaction ID <span class="badge bg-dark" id="trx_id"></span>
					</div>
					<div id="statusAlert"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<span id="submitButton"></span>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Deliver Modal -->
<div class="modal fade" id="deliverModal" tabindex="-1" aria-labelledby="deliverModalWindow" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deliverModalWindow">Deliver Order?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url(); ?>/orders/" method="post" id="deliverForm">
				<div class="modal-body">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="status" value="Delivered">
					<div id="info">
						This action will state <span class="badge bg-success">Delivered</span> order with Transaction ID <span class="badge bg-dark" id="deliver_trx_id"></span>.
					</div>
					<div class="alert alert-warning mt-3">
						Note: <b>Please fill this order shipping number</b>.
					</div>
					<div class="row">
						<div class="col-4">
							<label for="shippingNumber" class="col-form-label">Shipping Number <span class="text-danger">*</span></label>
						</div>
						<div class="col-8">
							<input type="text" name="shippingNumber" id="shippingNumber" class="form-control" placeholder="Order Shipping Number" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success" title="Deliver this order">Deliver Order</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Cancel Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalWindow" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="cancelModalWindow">Cancel Order?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url(); ?>/orders/" method="post" id="cancelForm">
				<div class="modal-body">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="status" value="Canceled">
					<div id="info">
						This action will <span class="badge bg-danger">Cancel</span> order with Transaction ID <span class="badge bg-dark" id="cancel_trx_id"></span>.
					</div>
					<div class="alert alert-warning mt-3">
						Note: <b>Please tells the customer why this order will be canceled</b>.
					</div>
					<div class="row">
						<div class="col-4">
							<label for="cancelMessage" class="col-form-label">Cancel Message <span class="text-danger">*</span></label>
						</div>
						<div class="col-8">
							<textarea name="cancelMessage" id="cancelMessage" rows="2" placeholder="Message" class="form-control" required></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger" title="Cancel this order">Cancel Order</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).on('click', '#btn-status', function() {
		let id = $(this).data('id');
		let trx_id = $(this).data('trx_id');
		let status = $(this).data('status');
		let formAction = $('#statusForm').attr('action');

		if (status == 'Paid') {
			$('#modalWindow').html('Confirm Payment?');
			$('#statusBadge').html('<span class="badge bg-primary">' + status + '</span>');
			$('#submitButton').html('<button type="submit" class="btn btn-primary" title="Confirm this order payment">Confirm Payment</button>');
			$('#statusAlert').html('<div class="alert alert-warning mt-3">Note: <b>Please confirm that you have receive the payment</b>.</div>');
		} else if (status == 'Proceed') {
			$('#modalWindow').html('Proceed Order?');
			$('#statusBadge').html('<span class="badge bg-dark">' + status + '</span>');
			$('#submitButton').html('<button type="submit" class="btn btn-dark" title="Proceed this order">Proceed Order</button>');
		} else if (status == 'Success') {
			$('#modalWindow').html('Finish Order?');
			$('#statusBadge').html('<span class="badge bg-success">' + status + '</span>');
			$('#submitButton').html('<button type="submit" class="btn btn-success" title="Finish this order">Finish Order</button>');
			$('#statusAlert').html('<div class="alert alert-warning mt-3">Note: <b>Please make sure the customer already received the order</b>.</div>');
		}

		$('#trx_id').html(trx_id);
		$('#status').val(status);
		$('#statusForm').attr('action', formAction + id);
	});

	$(document).on('click', '#btn-deliver', function() {
		let id = $(this).data('id');
		let trx_id = $(this).data('trx_id');
		let formAction = $('#deliverForm').attr('action');

		$('#deliver_trx_id').html(trx_id);
		$('#deliverForm').attr('action', formAction + id);
	});

	$(document).on('click', '#btn-cancel', function() {
		let id = $(this).data('id');
		let trx_id = $(this).data('trx_id');
		let formAction = $('#statusForm').attr('action');

		$('#cancel_trx_id').html(trx_id);
		$('#cancelForm').attr('action', formAction + id);
	});
</script>

<?= $this->endSection(); ?>