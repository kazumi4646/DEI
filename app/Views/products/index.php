<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
	<div class="d-flex justify-content-between align-items-center">
		<div class="left">
			<h1 class="mt-4">My Products</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="<?= base_url('/dashboard'); ?>">Dashboard</a></li>
				<li class="breadcrumb-item active">My Products</li>
			</ol>
		</div>
		<div class="right">
			<a href="<?= base_url('/products/new'); ?>" class="btn btn-primary">New Product</a>
		</div>
	</div>
	<div class="card mb-4">
		<div class="card-body">
			<?= view('templates/_partials/message'); ?>

			<?php if (in_groups('mitra')) : ?>
				<?php foreach ($data['status'] as $status) : ?>
					<?php if ($status['pembayaran_koperasi'] != 'Lunas') : ?>
						<div class="alert alert-warning" role="alert">
							Please <a href="<?= base_url('/payment'); ?>" class="alert-link">confirm your payment</a> before using this feature.
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>

			<table class="table table-striped" id="datatables">
				<thead>
					<tr>
						<th></th>
						<th>Product Image</th>
						<th>Product Name</th>
						<th>Product Price</th>
						<th>Product Description</th>
						<th>Product Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($data['products'] as $product) : ?>
						<tr>
							<td><?= $i++; ?></td>
							<td><img src="<?= base_url() . '/uploads/' . $product['image']; ?>" alt="<?= $product['name']; ?>" width="200px"></td>
							<td><?= $product['name']; ?></td>
							<td><?= $product['price']; ?></td>
							<td><?= $product['description']; ?></td>
							<td>
								<span class="badge <?= $product['status'] == 'Pre Order' ? 'bg-warning text-dark' : ($product['status'] == 'In Stock' ? 'bg-primary' : 'bg-danger'); ?>"><?= $product['status']; ?></span>
							</td>
							<td>
								<div class="btn-edit mb-2">
									<a href="<?= base_url('/products/' . $product['id'] . '/edit'); ?>" class="btn btn-sm btn-warning" title="Edit this product"><i class="fas fa-pencil-alt"></i> Edit</a>
								</div>
								<div class="btn-delete">
									<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" id="btn-delete" data-id="<?= $product['id']; ?>" data-name="<?= $product['name']; ?>" title="Delete this product">
										<i class="fas fa-trash-alt"></i> Delete
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

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="modalWindow" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalWindow">Are you sure?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url(); ?>/products/" method="post" id="deleteForm">
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<input type="hidden" name="_method" value="DELETE">
					<div class="info">
						This action will permanently delete the product information with name "<b><span id="product_name"></span></b>". <br>
					</div>
					<div class="alert alert-warning mt-3" role="alert">
						Note: <b>This action cannot be undone</b>.
					</div>
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
	$(document).on('click', '#btn-delete', function() {
		let id = $(this).data('id');
		let name = $(this).data('name');

		$('#id').val(id);
		document.querySelector('#product_name').innerHTML = name;
	});

	$(document).on('submit', '#deleteForm', function() {
		let id = $('#id').val();
		let formAction = $('#deleteForm').attr('action');

		$('#deleteForm').attr('action', formAction + id);
	});
</script>

<?= $this->endSection(); ?>