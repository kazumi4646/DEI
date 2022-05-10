<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
	<h1 class="mt-4">Product in Shop</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="<?= base_url('/dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Product in Shop</li>
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
						<th>Seller</th>
						<th>Product Status</th>
						<th>Product Status in Shop</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($data['shop'] as $product): ?>
						<tr>
							<td><?= $i++; ?></td>
							<td><img src="<?= base_url() . '/uploads/' . $product['image']; ?>" alt="<?= $product['name']; ?>" width="200px"></td>
							<td><?= $product['name']; ?></td>
							<td><?= $product['price']; ?></td>
							<td><?= $product['description']; ?></td>
							<td><?= $product['username']; ?></td>
							<td>
								<span class="badge <?= $product['status'] == 'Pre Order' ? 'bg-warning text-dark' : ($product['status'] == 'In Stock' ? 'bg-primary' : 'bg-danger'); ?>"><?= $product['status']; ?></span>
							</td>
							<td>
								<span class="badge <?= ($product['shop'] != 'Showed') ? 'bg-warning text-dark' : 'bg-primary'; ?>"><?= $product['shop']; ?></span>
							</td>
							<td>
								<div class="status mb-2">
									<?php if ($product['shop'] == 'Showed'): ?>
										<form action="<?= base_url('/shop/' . $product['id'] . '/remove'); ?>" method="post">
											<button type="submit" class="btn btn-warning">Remove from Shop</button>
										</form>
									<?php endif; ?>
									<?php if ($product['shop'] == 'Not Shown'): ?>
										<form action="<?= base_url('/shop/' . $product['id'] . '/show'); ?>" method="post">
											<button type="submit" class="btn btn-primary">Show to Shop</button>
										</form>
									<?php endif; ?>
								</div>
								<div class="remove">
									<?php if ($product['seller_id'] != user()->id): ?>
										<form action="<?= base_url('/shop/' . $product['id'] . '/delete'); ?>" method="post">
											<button type="submit" class="btn btn-danger">Remove from List</button>
										</form>
									<?php endif; ?>
									<?php if ($product['seller_id'] == user()->id): ?>
										<div class="btn-delete">
											<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" id="btn-delete" data-id="<?= $product['id']; ?>">
												Delete
											</button>
										</div>
									<?php endif; ?>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="modalWindow" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalWindow">Are you sure?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url(); ?>/products/" method="post" id="deleteForm">
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<input type="hidden" name="_method" value="DELETE">
					This action cannot be undone.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-danger">Delete anyway</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).on('click', '#btn-delete', function () {
		let id = $(this).data('id');

		$('#id').val(id);
	});

	$(document).on('submit', '#deleteForm', function() {
		let id = $('#id').val();
		let formAction = $('#deleteForm').attr('action');

		$('#deleteForm').attr('action', formAction + id);
	});
	
</script>

<?= $this->endSection(); ?>