<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
	<div class="alert alert-warning mt-4" role="alert">
		<h4 class="alert-heading">
			<?php
			date_default_timezone_set('Asia/Jakarta');;
			$time = date("H");

			if ($time < "11") {
				echo "Good morning, " . user()->username . '.';
			} else if ($time >= "11" && $time <= "18") {
				echo "Good afternoon, " . user()->username . '.';
			} else if ($time > "18") {
				echo "Good evening, " . user()->username . '.';
			}
			?>
		</h4>
		<p>
			<?php if ($data['requests'] > 0 && $data['orders'] > 0) { ?>

				You have <a href="<?= base_url('/requests'); ?>" class="alert-link" style="text-decoration: underline;"><?= $data['requests']; ?> product request(s)</a> and <a href="<?= base_url('/orders'); ?>" class="alert-link" style="text-decoration: underline;"><?= $data['orders']; ?> unfinished order(s)</a>.

			<?php } else if ($data['requests'] > 0) { ?>

				You have <a href="<?= base_url('/requests'); ?>" class="alert-link" style="text-decoration: underline;"><?= $data['requests']; ?> product request(s)</a>.

			<?php } else if ($data['orders'] > 0) { ?>

				You have <a href="<?= base_url('/orders'); ?>" class="alert-link" style="text-decoration: underline;"><?= $data['orders']; ?> unfinished order(s)</a>.

			<?php } else { ?>

				You don't have any new notification available.

			<?php } ?>
		</p>
		<hr>
		<p class="mb-0">Desa Ekspor Indonesia.</p>
	</div>

	<div class="card mb-4">
		<div class="card-body">

		</div>
	</div>
</div>

<?= $this->endSection(); ?>