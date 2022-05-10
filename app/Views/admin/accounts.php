<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
	<h1 class="mt-4">User Accounts</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="<?= base_url('/dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">User Accounts</li>
	</ol>
	<div class="card mb-4">
		<div class="card-body">
			<?= view('templates/_partials/message'); ?>
			<table id="datatables">
				<thead>
					<tr>
						<th></th>
						<th>Email</th>
						<th>Username</th>
						<th>Created at</th>
						<th>Updated at</th>
						<th>Account Role</th>
						<th>Account Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($data['accounts'] as $account): ?>
						<tr>
							<td><?= $i++; ?></td>
							<td><?= $account['email']; ?></td>
							<td><?= $account['username']; ?></td>
							<td><?= $account['created_at']; ?></td>
							<td><?= $account['updated_at']; ?></td>
							<td>
								<span class="badge <?= ($account['name'] != 'mitra') ? 'bg-success' : 'bg-primary'; ?>"><?= $account['name']; ?></span>
							</td>
							<td>
								<span class="badge rounded-pill <?= ($account['active'] != 0) ? 'bg-dark' : 'bg-warning text-dark'; ?>"><?= ($account['active'] != 0) ? 'Active' : 'Inactive'; ?></span>
							</td>
							<td>
								<div class="row">
									<div class="col-auto mb-2">
										<button type="button" class="btn <?= ($account['active'] != 0) ? 'btn-warning' : 'btn-dark'; ?>" data-bs-toggle="modal" data-bs-target="#activeModal" id="btn-active" data-id="<?= $account['id']; ?>" data-active="<?= $account['active']; ?>" data-username="<?= $account['username']; ?>">
											<?= ($account['active'] != 0) ? 'Deactive' : 'Activate'; ?>
										</button>
									</div>

									<div class="col-auto">
										<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" id="btn-delete" data-id="<?= $account['id']; ?>" data-username="<?= $account['username']; ?>">
											Delete
										</button>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Active/Deactive Modal -->
<div class="modal fade" id="activeModal" tabindex="-1" aria-labelledby="modalWindow" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalWindow"><span id="action"></span>?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url(); ?>/accounts/" method="post" id="activeForm">
				<div class="modal-body">
					<input type="hidden" name="id" id="id_active" value="">
					<input type="hidden" name="status" id="status" value="">
					<div id="info"></div>
					<div class="alert alert-warning mt-3" role="alert" id="alert"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn" id="btn-action"></button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="modalWindow" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalWindow">Delete Account?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url(); ?>/accounts/" method="post" id="deleteForm">
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<div class="info">
						This action will permanently delete the user and their complete profile information with credential "<b><span id="username"></span></b>". <br>
					</div>
					<div class="alert alert-warning mt-2 mb-3" role="alert">
						To continue, please type your password. <br> 
						Note: <b>This action cannot be undone</b>.
					</div>
					<div class="row">
						<div class="col-3">
							Password
						</div>
						<div class="col-9">
							<input type="password" name="confirm" class="form-control" cols="5" rows="3" placeholder="Your Password">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-danger">Delete account</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	// Active/Deactive Modal
	$(document).on('click', '#btn-active', function () {
		let status;
		let action = '';
		let style = '';
		let message = '';

		let id = $(this).data('id');
		let active = $(this).data('active');
		let username = $(this).data('username');

		if (active != 0) {
			status = 0;
			action = 'Deactive account';
			style = "btn-danger";
			message = 'This action will deactive account with credential "<b>' + username + '</b>".';
			alert = 'Note: <b>This user cannot log into their account until you re-activate their account</b>.';
		} else {
			status = 1;
			action = 'Activate account';
			style = "btn-dark";
			message = 'This action will re-activate account with credential "<b>' + username + '</b>".';
			alert = 'Note: <b>User with this account will be granted to log into their account</b>.';
		}

		$('#id_active').val(id);
		$('#status').val(status);
		$('#btn-action').addClass(style);

		document.querySelector('#action').innerHTML = action;
		document.querySelector('#alert').innerHTML = alert;
		document.querySelector('#info').innerHTML = message;
		document.querySelector('#btn-action').innerHTML = action;
	});

	$(document).on('submit', '#activeForm', function() {
		let id = $('#id_active').val();
		let status = $('#status').val();
		let formAction = $('#activeForm').attr('action');

		$('#activeForm').attr('action', formAction + id + '/status');
	});

	// Delete Modal
	$(document).on('click', '#btn-delete', function () {
		let id = $(this).data('id');
		let username = $(this).data('username');

		$('#id').val(id);
		document.querySelector('#username').innerHTML = username;
	});

	$(document).on('submit', '#deleteForm', function() {
		let id = $('#id').val();
		let formAction = $('#deleteForm').attr('action');

		$('#deleteForm').attr('action', formAction + id + '/delete');
	});
</script>

<?= $this->endSection(); ?>