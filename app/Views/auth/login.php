<?= $this->extend('templates/base_auth'); ?>

<?= $this->section('content'); ?>

<div id="layoutAuthentication">
  <div id="layoutAuthentication_content">
    <main>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Login</h4>
                <a href="<?= base_url('/'); ?>"><img src="<?= base_url(); ?>/assets/img/logo.png" class="my-2" width="100px" alt="Logo"></a>
              </div>
              <div class="card-body">
                <?= view('templates/_partials/message'); ?>

                <form action="<?= base_url('/login') ?>" method="post">
                  <?= csrf_field() ?>

                  <div class="form-floating mb-3">
                    <input type="text" name="login" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.emailOrUsername')?>" />
                    <label for="login"><?=lang('Auth.emailOrUsername')?></label>
                    <div class="invalid-feedback">
                      <?= session('errors.login') ?>
                    </div>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" />
                    <label for="password"><?=lang('Auth.password')?></label>
                    <div class="invalid-feedback">
                      <?= session('errors.password') ?>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <?php if ($config->activeResetter): ?>
                      <a href="<?= base_url('/forgot') ?>">Forgot password?</a>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.loginAction')?></button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center py-3">
                <div class="small mb-1">
                  <a href="<?= base_url('/register') ?>">Need an account? Register as User!</a>
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

<?= $this->endSection(); ?>