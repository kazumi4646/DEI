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
							<td>
								<?php if ($order['status'] == 'Waiting for Payment') : ?>
									<button type="button" id="btn-confirm" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#paidModal" data-id="<?= $order['id']; ?>" data-trx_id="<?= $order['trx_id']; ?>" data-payment_proof="<?= $order['payment_proof']; ?>" title="Confirm order payment">
										<i class="fas fa-check-circle"></i> Confirm Payment
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

<!-- Paid Modal -->
<div class="modal fade" id="paidModal" tabindex="-1" aria-labelledby="modalWindow" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalWindow">Confirm Payment?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('/orders'); ?>" method="post" id="confirmForm">
				<div class="modal-body">
					<input type="hidden" name="id" id="id_confirm">
					<div class="row">
						<div class="col-8">
							<img src="<?= base_url() . '/uploads/payments/' . $order['payment_proof']; ?>" alt="Proof of Payment" width="100px">
						</div>
					</div>
					<div id="info"></div>
					<div class="alert alert-warning mt-3">
						Note: <b>Please confirm that you have receive the payment</b>.
					</div>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, totam labore. Provident repellendus modi accusamus ipsum! Praesentium provident voluptas laboriosam illo. Explicabo voluptates minus a molestias consequuntur excepturi aspernatur similique doloremque dolorum ipsa repudiandae voluptatibus, deserunt voluptatum nemo, delectus possimus autem adipisci, libero vel nihil. Vitae dolores quidem placeat voluptatum id sed, vel ea, quae a saepe facilis rem quibusdam ex! Labore corrupti, velit iusto enim repudiandae, autem ut veniam fugit, doloribus exercitationem atque ipsa. Dolore, mollitia! Fugiat nam officiis reprehenderit ducimus illum iusto blanditiis dolore tempore aliquam, accusantium dolorum distinctio architecto hic possimus sed vero molestiae excepturi repellendus quam!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Confirm Payment</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).on('click', '#btn-confirm', function() {
		let id = $(this).data('id');
		let trx_id = $(this).data('trx_id');
		let payment_proof = $(this).data('payment_proof');

		$('#id_confirm').val(id);
		document.querySelector('#info').innerHTML = 'This action will state <span class="badge bg-primary">Paid</span> to order with Transaction ID <span class="badge bg-dark">' + trx_id + '</span>';
	});

	$(document).on('submit', '#approveForm', function() {
		let id = $('#id_confirm').val();
		let formAction = $('#approveForm').attr('action');

		$('#approveForm').attr('action', formAction + id + '/approve');
	});
</script>

<?= $this->endSection(); ?>