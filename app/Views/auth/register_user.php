<?= $this->extend('templates/base_auth'); ?>

<?= $this->section('content'); ?>

<div id="layoutAuthentication">
  <div id="layoutAuthentication_content">
    <main>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Register as User</h4>
                <a href="<?= base_url('/'); ?>"><img src="<?= base_url(); ?>/assets/img/logo.png" class="my-2" width="100px" alt="Logo"></a>
              </div>
              <div class="card-body">
                <form action="<?= base_url('/register') ?>" method="post">
                  <?= csrf_field() ?>
                  <div class="form-floating mb-3">
                    <input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" type="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" autofocus />
                    <label for="email"><?= lang('Auth.email') ?></label>
                    <div class="invalid-feedback">
                      <?= session('errors.email') ?>
                    </div>
                  </div>

                  <div class="form-floating mb-3">
                    <input class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" type="text" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" />
                    <label for="username"><?= lang('Auth.username') ?></label>
                    <div class="invalid-feedback">
                      <?= session('errors.username') ?>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control <?php if (session('errors.password') || session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="password" type="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" />
                        <label for="password"><?= lang('Auth.password') ?></label>
                        <div class="invalid-feedback">
                          <?= session('errors.password') ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" type="password" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off" />
                        <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                        <div class="invalid-feedback">
                          <?= session('errors.pass_confirm') ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="agreement" onclick="activeBtn()">
                      <label class="form-check-label" for="agreement">
                        I agree to the <a href="<?= base_url('/terms'); ?>">terms of service</a>.
                      </label>
                    </div>
                    <button type="submit" id="btn-submit" class="btn btn-primary btn-block float-end disabled"><?= lang('Auth.register') ?></button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center py-3">
                <div class="small mb-1">
                  <a href="<?= base_url('/login') ?>">Already have an account? Login!</a>
                </div>
                <div class="small">
                  <a href="<?= base_url('/register/mitra') ?>">Register as Mitra</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <div id="layoutAuthentication_footer">
    <footer class="py-4 bg-light mt-auto">
      <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
          <div class="text-muted">Copyright &copy; <?= date('Y'); ?>, Desa Ekspor Indonesia.</div>
          <div>
            <a href="<?= base_url('/policy'); ?>">Privacy Policy</a>
            &middot;
            <a href="<?= base_url('/terms'); ?>">Terms of Service</a>
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>

<script>
  $(document).keypress(function(event) {
    if (event.which == '13') {
      event.preventDefault();
    }
  });
</script>

<?= $this->endSection(); ?>