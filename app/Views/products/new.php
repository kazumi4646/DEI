<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
	<h1 class="mt-4">New Product</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="<?= base_url('/products'); ?>">Products</a></li>
		<li class="breadcrumb-item active">New Product</li>
	</ol>
	<div class="card mb-4">
		<div class="card-body">
			<form action="<?= base_url('/products'); ?>" method="post" enctype="multipart/form-data">
				<div class="row mb-3">
					<div class="col-12 col-md-3">
						<label for="name" class="form-label">Product Name <span class="text-danger">*</span></label>
					</div>
					<div class="col-12 col-md-9">
						<input type="text" class="form-control <?php if (session('errors.name')) : ?>is-invalid<?php endif ?>" name="name" id="name" placeholder="Product Name" value="<?= old('name'); ?>">
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
								<input type="number" class="form-control <?php if (session('errors.price')) : ?>is-invalid<?php endif ?>" name="price" id="price" placeholder="Product Price" value="<?= old('price'); ?>">
								<div class="invalid-feedback">
									<?= session('errors.price') ?>
								</div>
							</div>
							<div class="col-1 col-md-1">
								<span class="input-group-text justify-content-center">/</span>
							</div>
							<div class="col-2 col-md-2">
								<input type="number" name="per" class="form-control" placeholder="per" min="1">
								<div class="invalid-feedback">
									<?= session('errors.per') ?>
								</div>
							</div>
							<div class="col-2 col-md-1">
								<select class="form-control" name="unit">
									<option value="g">g</option>
									<option value="kg">kg</option>
									<option value="cm">cm</option>
									<option value="m">m</option>
									<option value="litre">litre</option>
									<option value="item">item</option>
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
						<textarea name="description" id="description" cols="5" rows="3" class="form-control <?php if (session('errors.description')) : ?>is-invalid<?php endif ?>" placeholder="Product Description"><?= old('description'); ?></textarea>
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
							<option value="<?= (empty(old('status'))) ? '' : old('status'); ?>" selected><?= (empty(old('status'))) ? 'Product Status' : old('status'); ?></option>
							<option value="Pre Order">Pre Order</option>
							<option value="In Stock">In Stock</option>
							<option value="Sold Out">Sold Out</option>
						</select>
						<div class="invalid-feedback">
							<?= session('errors.status') ?>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-12 col-md-3">
						<label for="image" class="form-label">Product Image <span class="text-danger">*</span></label>
					</div>
					<div class="col-12 col-md-9">
						<input type="file" class="form-control <?php if (session('errors.image')) : ?>is-invalid<?php endif ?>" accept="image/*" name="image" id="image" placeholder="Product Image" value="<?= old('image'); ?>" onchange="showPreview(event)">
						<div class="invalid-feedback">
							<?= session('errors.image') ?>
						</div>
					</div>
				</div>
				<div class="row mb-2">
					<div class="preview col-md-9 offset-md-3">
						<img id="preview" width="200px" style="display: none;">
					</div>
					<div>
						<button type="submit" class="btn btn-primary float-end">Add Product</button>
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
			preview.style.display = 'block';
		}
	}
</script>

<?= $this->endSection(); ?>