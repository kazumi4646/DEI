<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
	<h1 class="mt-4">Edit Profile</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="<?= base_url('/dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Edit Profile</li>
	</ol>
	<div class="card mb-4">
		<div class="card-body">
			<?= view('templates/_partials/message'); ?>

			<form action="<?= base_url('/profile/' . user()->id . '/update'); ?>" method="post">
				<input type="hidden" name="username" value="<?= user()->username; ?>">
				<?php foreach ($data['mitra'] as $mitra): ?>
					<div class="row mb-3">
						<div class="col-12 col-md-2">
							<label for="username" class="form-label">Username</label>
						</div>
						<div class="col-12 col-md-10">
							<input type="text" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" placeholder="Username" value="<?= user()->username; ?>" disabled>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12 col-md-2">
							<label for="name" class="form-label">Name <span class="text-danger">*</span></label>
						</div>
						<div class="col-12 col-md-10">
							<input type="text" class="form-control <?php if(session('errors.name')) : ?>is-invalid<?php endif ?>" name="name" id="name" placeholder="Name" value="<?= $mitra['name']; ?>">
							<div class="invalid-feedback">
								<?= session('errors.name') ?>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12 col-md-2">
							<label for="no_ktp" class="form-label">NIK <span class="text-danger">*</span></label>
						</div>
						<div class="col-12 col-md-10">
							<input type="number" class="form-control <?php if(session('errors.no_ktp')) : ?>is-invalid<?php endif ?>" name="no_ktp" id="no_ktp" placeholder="NIK" value="<?= $mitra['no_ktp']; ?>">
							<div class="invalid-feedback">
								<?= session('errors.no_ktp') ?>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12 col-md-2">
							<label for="no_kk" class="form-label">No. KK <span class="text-danger">*</span></label>
						</div>
						<div class="col-12 col-md-10">
							<input type="number" class="form-control <?php if(session('errors.no_kk')) : ?>is-invalid<?php endif ?>" name="no_kk" id="no_kk" placeholder="No. KK" value="<?= $mitra['no_kk']; ?>">
							<div class="invalid-feedback">
								<?= session('errors.no_kk') ?>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12 col-md-2">
							<label for="birth" class="form-label">Date of Birth <span class="text-danger">*</span></label>
						</div>
						<div class="col-12 col-md-10">
							<input type="date" class="form-control <?php if(session('errors.birth')) : ?>is-invalid<?php endif ?>" name="birth" id="birth" placeholder="Date of Birth" value="<?= user()->birth; ?>">
							<div class="invalid-feedback">
								<?= session('errors.birth') ?>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12 col-md-2">
							<label for="address" class="form-label">Address <span class="text-danger">*</span></label>
						</div>
						<div class="col-12 col-md-10">
							<textarea name="address" id="address" cols="5" rows="3" class="form-control <?php if(session('errors.address')) : ?>is-invalid<?php endif ?>" placeholder="Address"><?= user()->address; ?></textarea>
							<div class="invalid-feedback">
								<?= session('errors.address') ?>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-2 offset-md-2">
							<div class="form-floating mb-3 mb-md-0">
								<select name="province" id="province" class="form-control <?php if(session('errors.province')) : ?>is-invalid<?php endif ?>" placeholder="Province">
									<option value="">Provinsi</option>
									<option value="<?= $mitra['province']; ?>" selected><?= $mitra['province']; ?></option>
									<?php foreach ($data['province'] as $provinsi): ?>
										<option value="<?= $provinsi['name']; ?>"><?= $provinsi['name']; ?></option>
									<?php endforeach; ?>
								</select>
								<label for="province">Province</label>
								<div class="invalid-feedback">
									<?= session('errors.province') ?>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-floating mb-3 mb-md-0">
								<select name="city" id="city" class="form-control <?php if(session('errors.city')) : ?>is-invalid<?php endif ?>" placeholder="City">
									<option value="">Kabupaten/Kota</option>
									<option value="<?= $mitra['city']; ?>" selected><?= $mitra['city']; ?></option>
								</select>
								<label for="city">City</label>
								<div class="invalid-feedback">
									<?= session('errors.city') ?>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-floating mb-3 mb-md-0">
								<select name="districts" id="districts" class="form-control <?php if(session('errors.districts')) : ?>is-invalid<?php endif ?>" placeholder="District">
									<option value="">Kecamatan</option>
									<option value="<?= $mitra['district']; ?>" selected><?= $mitra['district']; ?></option>
								</select>
								<label for="districts">District</label>
								<div class="invalid-feedback">
									<?= session('errors.districts') ?>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-floating mb-3 mb-md-0">
								<select name="village" id="village" class="form-control <?php if(session('errors.village')) : ?>is-invalid<?php endif ?>" placeholder="Village">
									<option value="">Kelurahan/Desa</option>
									<option value="<?= $mitra['village']; ?>" selected><?= $mitra['village']; ?></option>
								</select>
								<label for="village">Village</label>
								<div class="invalid-feedback">
									<?= session('errors.village') ?>
								</div>
							</div>
						</div>
						<div class="col-md-2 d-flex justify-content-end align-items-end">
							<button type="submit" class="btn btn-primary">Save Profile</button>
						</div>
					</div>
				<?php endforeach; ?>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#province').change(function() {
			let province_name = $(this).val();
			let name = $(this).val().replaceAll(' ', '_');
			let url = "<?= site_url('mitra/ajax_city'); ?>/" + name;

			$('#city').load(url);
			$('#city').prop('selectedIndex', 0);
			$('#districts').prop('selectedIndex', 0);
			$('#village').prop('selectedIndex', 0);

			return false;
		});

		$('#city').change(function() {
			let name = $(this).val().replaceAll(' ', '_');
			let url = "<?= site_url('mitra/ajax_district'); ?>/" + name;

			$('#districts').load(url);
			$('#districts').prop('selectedIndex', 0);
			$('#village').prop('selectedIndex', 0);

			return false;
		});

		$('#districts').change(function() {
			let name = $(this).val().replaceAll(' ', '_');
			let url = "<?= site_url('mitra/ajax_village'); ?>/" + name;

			$('#village').load(url);
			$('#village').prop('selectedIndex', 0);

			return false;
		});
	});
</script>

<?= $this->endSection(); ?>