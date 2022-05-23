<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
	<h1 class="mt-4">Edit Product</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="<?= base_url('/products'); ?>">Products</a></li>
		<li class="breadcrumb-item active">Edit Product</li>
	</ol>
	<div class="card mb-4">
		<div class="card-body">
			<form action="<?= base_url('/products/' . $data['product']['id']); ?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="old_image" value="<?= $data['product']['image']; ?>">
				<div class="row mb-3">
					<div class="col-12 col-md-3">
						<label for="name" class="form-label">Product Name <span class="text-danger">*</span></label>
					</div>
					<div class="col-12 col-md-9">
						<input type="text" class="form-control <?php if (session('errors.name')) : ?>is-invalid<?php endif ?>" name="name" id="name" placeholder="Product Name" value="<?= $data['product']['name']; ?>">
						<div class="invalid-feedback">
							<?= session('errors.name') ?>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-12 col-md-3">
						<label for="price" class="form-label">Product Price <span class="text-danger">*</span></label>
					</div>
					<div class="col-12 col-md-9">
						<div class="input-group">
							<div class="col-7 col-md-8">
								<input type="number" class="form-control <?php if (session('errors.price')) : ?>is-invalid<?php endif ?>" name="price" id="price" placeholder="Product Price" value="<?= $data['product']['price']; ?>">
								<div class="invalid-feedback">
									<?= session('errors.price') ?>
								</div>
							</div>
							<div class="col-1 col-md-1">
								<span class="input-group-text justify-content-center">/</span>
							</div>
							<div class="col-2 col-md-2">
								<input type="number" name="per" class="form-control" placeholder="per" value="<?= (preg_replace('/[^0-9.]/', '', $data['product']['unit_price']) == '') ? '1' : preg_replace('/[^0-9.]/', '', $data['product']['unit_price']); ?>" min="1">
							</div>
							<div class="col-2 col-md-1">
								<select class="form-control" name="unit">
									<option value="g" <?= (preg_replace('/[^a-z]/', '', $data['product']['unit_price']) == 'g') ? 'selected' : ''; ?>>g</option>
									<option value="kg" <?= (preg_replace('/[^a-z]/', '', $data['product']['unit_price']) == 'kg') ? 'selected' : ''; ?>>kg</option>
									<option value="cm" <?= (preg_replace('/[^a-z]/', '', $data['product']['unit_price']) == 'cm') ? 'selected' : ''; ?>>cm</option>
									<option value="m" <?= (preg_replace('/[^a-z]/', '', $data['product']['unit_price']) == 'm') ? 'selected' : ''; ?>>m</option>
									<option value="litre" <?= (preg_replace('/[^a-z]/', '', $data['product']['unit_price']) == 'litre') ? 'selected' : ''; ?>>litre</option>
									<option value="item" <?= (preg_replace('/[^a-z]/', '', $data['product']['unit_price']) == 'item') ? 'selected' : ''; ?>>item</option>
								</select>
								<div class="invalid-feedback">
									<?= session('errors.unit') ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-12 col-md-3">
						<label for="description" class="form-label">Product Description <span class="text-danger">*</span></label>
					</div>
					<div class="col-12 col-md-9">
						<textarea name="description" id="description" cols="5" rows="3" class="form-control <?php if (session('errors.description')) : ?>is-invalid<?php endif ?>" placeholder="Product Description"><?= $data['product']['description']; ?></textarea>
						<div class="invalid-feedback">
							<?= session('errors.description') ?>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-12 col-md-3">
						<label for="status" class="form-label">Product Status <span class="text-danger">*</span></label>
					</div>
					<div class="col-12 col-md-9">
						<select name="status" id="status" class="form-control <?php if (session('errors.status')) : ?>is-invalid<?php endif ?>">
							<option value="Pre Order" <?= ($data['product']['status'] == 'Pre Order') ? 'selected' : ''; ?>>Pre Order</option>
							<option value="In Stock" <?= ($data['product']['status'] == 'In Stock') ? 'selected' : ''; ?>>In Stock</option>
							<option value="Sold Out" <?= ($data['product']['status'] == 'Sold Out') ? 'selected' : ''; ?>>Sold Out</option>
						</select>
						<div class="invalid-feedback">
							<?= session('errors.status') ?>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-12 col-md-3">
						<label for="new_image" class="form-label">Product Image</label>
					</div>
					<div class="col-12 col-md-9">
						<div class="row">
							<div class="preview col-md-4 mb-2">
								<img src="<?= base_url('/uploads/products/' . $data['product']['image']); ?>" id="preview" width="200px">
							</div>
							<div class="col-md-8">
								<input type="file" accept="image/*" class="form-control <?php if (session('errors.new_image')) : ?>is-invalid<?php endif ?>" name="new_image" id="new_image" onchange="showPreview(event)">
								<div class="invalid-feedback">
									<?= session('errors.new_image') ?>
								</div>
								<button type="submit" class="btn btn-primary mt-3 float-end">Save Changes</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	function showPreview(event) {
		if (event.target.files.length > 0) {
			let src = URL.createObjectURL(event.target.files[0]);
			let preview = document.getElementById('preview');

			preview.src = src;
		}
	}
</script>

<?= $this->endSection(); ?>