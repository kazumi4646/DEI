
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<title>Desa Ekspor Indonesia</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="<?= base_url(); ?>/assets/css/auth.css" rel="stylesheet" />

	<style>
		a {
			text-decoration: none;
		}
	</style>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
	<script src="<?= base_url(); ?>/assets/js/jquery-3.4.1.min.js"></script>
</head>
<body>
	<?= $this->renderSection('content'); ?>

	<script>
		function activeBtn() {
			const check = document.getElementById('agreement');
			const button = document.getElementById('btn-submit');

			if (check.checked) {
				button.classList.remove('disabled');
			} else {
				button.classList.add('disabled');
			}
		};
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="<?= base_url(); ?>/assets/js/auth.js"></script>
</body>
</html>
