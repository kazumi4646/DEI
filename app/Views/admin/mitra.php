<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
	<h1 class="mt-4">Mitra</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="<?= base_url('/dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Mitra</li>
	</ol>
	<div class="card mb-4">
		<div class="card-body">
			<?= view('templates/_partials/message'); ?>
			<table id="datatables">
				<thead>
					<tr>
						<th></th>
						<th>Username</th>
						<th>Nama</th>
						<th>Asal</th>
						<th>Komoditas</th>
						<th>Populasi Pohon</th>
						<th>Tahun Tanam</th>
						<th>Luas Lahan</th>
						<th>Jumlah Panen</th>
						<th>Pembayaran Koperasi</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($data['mitra'] as $mitra) : ?>
						<tr id="detailModal" data-bs-toggle="modal" data-bs-target="#detail" data-username="<?= $mitra['username']; ?>" data-name="<?= $mitra['name']; ?>" data-no_ktp="<?= $mitra['no_ktp']; ?>" data-no_kk="<?= $mitra['no_kk']; ?>" data-village="<?= $mitra['village']; ?>" data-district="<?= $mitra['district']; ?>" data-city="<?= $mitra['city']; ?>" data-province="<?= $mitra['province']; ?>" data-komoditas="<?= $mitra['komoditas']; ?>" data-populasi="<?= $mitra['populasi']; ?>" data-tahun_tanam="<?= $mitra['tahun_tanam']; ?>" data-luas_lahan="<?= $mitra['luas_lahan']; ?>" data-jumlah_panen="<?= $mitra['jumlah_panen']; ?>" data-pembayaran_koperasi="<?= $mitra['pembayaran_koperasi']; ?>">
							<td><?= $i++; ?></td>
							<td><?= $mitra['username']; ?></td>
							<td><?= $mitra['name']; ?></td>
							<td><?= ucwords(strtolower($mitra['village'])) . ', ' . ucwords(strtolower($mitra['district'])) . ', ' . ucwords(strtolower($mitra['city'])) . ', ' . ucwords(strtolower($mitra['province'])); ?></td>
							<td><?= number_format($mitra['komoditas'], 0, ',', '.'); ?></td>
							<td><?= number_format($mitra['populasi'], 0, ',', '.'); ?></td>
							<td><?= number_format($mitra['tahun_tanam'], 0, ',', '.'); ?></td>
							<td><?= number_format($mitra['luas_lahan'], 0, ',', '.'); ?></td>
							<td><?= number_format($mitra['jumlah_panen'], 0, ',', '.'); ?></td>
							<td>
								<span class="badge <?= ($mitra['pembayaran_koperasi'] != 'Lunas') ? 'bg-warning text-dark' : 'bg-success'; ?>"><?= $mitra['pembayaran_koperasi']; ?></span>
							</td>
							<td>
								<?php if ($mitra['pembayaran_koperasi'] != 'Lunas') : ?>
									<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#statusModal" id="btn-status" data-id="<?= $mitra['id']; ?>" data-username="<?= $mitra['username']; ?>">
										Lunas
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

<!-- Detail Mitra -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detailMitra" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailMitra">Detail Mitra</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row mb-2">
					<div class="col-4">
						Username
					</div>
					<div class="col-8">
						: <span id="username"></span>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-4">
						Nama
					</div>
					<div class="col-8">
						: <span id="name"></span>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-4">
						No. KTP
					</div>
					<div class="col-8">
						: <span id="no_ktp"></span>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-4">
						No. KK
					</div>
					<div class="col-8">
						: <span id="no_kk"></span>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-4">
						Kelurahan/Desa
					</div>
					<div class="col-8">
						: <span id="village"></span>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-4">
						Kecamatan
					</div>
					<div class="col-8">
						: <span id="district"></span>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-4">
						Kabupaten/Kota
					</div>
					<div class="col-8">
						: <span id="city"></span>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-4">
						Provinsi
					</div>
					<div class="col-8">
						: <span id="province"></span>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-4">
						Komoditas
					</div>
					<div class="col-8">
						: <span id="komoditas"></span>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-4">
						Populasi Pohon
					</div>
					<div class="col-8">
						: <span id="populasi"></span>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-4">
						Tahun Tanam
					</div>
					<div class="col-8">
						: <span id="tahun_tanam"></span>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-4">
						Luas Lahan
					</div>
					<div class="col-8">
						: <span id="luas_lahan"></span> m<sup>2</sup>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-4">
						Jumlah Panen
					</div>
					<div class="col-8">
						: <span id="jumlah_panen"></span> kg
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						Pembayaran Koperasi
					</div>
					<div class="col-8" id="pembayaran_koperasi">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="modalWindow" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalWindow">Are you sure?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url(); ?>/mitra/" method="post" id="statusForm">
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<div id="info"></div>
					<div class="alert alert-warning mt-3" role="alert">
						Note: <b>This action cannot be undone</b>.
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-success">Lunas</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).on('click', '#detailModal', function() {
		let username = $(this).data('username');
		let name = $(this).data('name');
		let no_ktp = $(this).data('no_ktp');
		let no_kk = $(this).data('no_kk');
		let village = $(this).data('village');
		let district = $(this).data('district');
		let city = $(this).data('city');
		let province = $(this).data('province');
		let komoditas = $(this).data('komoditas');
		let populasi = $(this).data('populasi');
		let tahun_tanam = $(this).data('tahun_tanam');
		let luas_lahan = $(this).data('luas_lahan');
		let jumlah_panen = $(this).data('jumlah_panen');
		let pembayaran_koperasi = $(this).data('pembayaran_koperasi');

		document.querySelector('#username').innerHTML = username;
		document.querySelector('#name').innerHTML = name;
		document.querySelector('#no_ktp').innerHTML = no_ktp;
		document.querySelector('#no_kk').innerHTML = no_kk;
		document.querySelector('#village').innerHTML = village;
		document.querySelector('#district').innerHTML = district;
		document.querySelector('#city').innerHTML = city;
		document.querySelector('#province').innerHTML = province;
		document.querySelector('#komoditas').innerHTML = komoditas;
		document.querySelector('#populasi').innerHTML = populasi;
		document.querySelector('#tahun_tanam').innerHTML = tahun_tanam;
		document.querySelector('#luas_lahan').innerHTML = luas_lahan;
		document.querySelector('#jumlah_panen').innerHTML = jumlah_panen;

		if (pembayaran_koperasi != 'Lunas') {
			document.querySelector('#pembayaran_koperasi').innerHTML = ': <span class="badge bg-warning text-dark">' + pembayaran_koperasi + '</span>';
		} else {
			document.querySelector('#pembayaran_koperasi').innerHTML = ': <span class="badge bg-success">' + pembayaran_koperasi + '</span>';
		}
	});

	$(document).on('click', '#btn-status', function() {
		let id = $(this).data('id');
		let username = $(this).data('username');

		$('#id').val(id);
		document.querySelector('#info').innerHTML = 'This action will permanently state <span class="badge bg-success">Lunas</span> to <b>' + username + "</b>.<br> Please ensure that you've received a payment from <b>" + username + "</b>.";;
	});

	$(document).on('submit', '#statusForm', function() {
		let id = $('#id').val();
		let formAction = $('#statusForm').attr('action');

		$('#statusForm').attr('action', formAction + id + '/lunas');
	});
</script>

<?= $this->endSection(); ?>