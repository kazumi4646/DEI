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
                <h4>Register as Mitra</h4>
                <a href="<?= base_url('/'); ?>"><img src="<?= base_url(); ?>/assets/img/logo.png" class="my-2" width="100px" alt="Logo"></a>
              </div>
              <div class="card-body">
                <form action="<?= base_url('/mitra') ?>" method="post">
                  <?= csrf_field() ?>

                  <div class="form-floating mb-3">
                    <input class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" type="email" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>"/>
                    <label for="email"><?=lang('Auth.email')?></label>
                    <div class="invalid-feedback">
                      <?= session('errors.email') ?>
                    </div>
                  </div>

                  <div class="form-floating mb-3">
                    <input class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" type="text" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>"/>
                    <label for="username"><?=lang('Auth.username')?></label>
                    <div class="invalid-feedback">
                      <?= session('errors.username') ?>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-3">
                        <input class="form-control <?php if(session('errors.password') || session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="password" type="password" placeholder="<?=lang('Auth.password')?>" autocomplete="off"/>
                        <label for="password"><?=lang('Auth.password')?></label>
                        <div class="invalid-feedback">
                          <?= session('errors.password') ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-3">
                        <input class="form-control <?php if(session('errors.password') || session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" type="password" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off"/>
                        <label for="pass_confirm"><?=lang('Auth.repeatPassword')?></label>
                        <div class="invalid-feedback">
                          <?= session('errors.pass_confirm') ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-floating mb-3">
                    <input class="form-control <?php if(session('errors.name')) : ?>is-invalid<?php endif ?>" name="name" type="text" placeholder="Name" value="<?= old('name') ?>"/>
                    <label for="name">Name</label>
                    <div class="invalid-feedback">
                      <?= session('errors.name') ?>
                    </div>
                  </div>

                  <div class="form-floating mb-3">
                    <input class="form-control <?php if(session('errors.birth')) : ?>is-invalid<?php endif ?>" name="birth" type="date" placeholder="Date of Birth" value="<?= old('birth') ?>"/>
                    <label for="birth">Date of Birth</label>
                    <div class="invalid-feedback">
                      <?= session('errors.birth') ?>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control <?php if(session('errors.no_ktp')) : ?>is-invalid<?php endif ?>" name="no_ktp" type="number" placeholder="NIK" value="<?= old('no_ktp') ?>"/>
                        <label for="no_ktp">NIK</label>
                        <div class="invalid-feedback">
                          <?= session('errors.no_ktp') ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating mb-md-0">
                        <input class="form-control <?php if(session('errors.no_kk')) : ?>is-invalid<?php endif ?>" name="no_kk" type="number" placeholder="No. Kartu Keluarga" value="<?= old('no_kk') ?>"/>
                        <label for="no_kk">No. Kartu Keluarga</label>
                        <div class="invalid-feedback">
                          <?= session('errors.no_kk') ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <select name="province" id="province" class="form-control <?php if(session('errors.province')) : ?>is-invalid<?php endif ?>" placeholder="Province">
                          <option value="<?= (empty(old('province'))) ? '' : old('province') ?>" selected><?= (empty(old('province'))) ? 'Provinsi' : old('province') ?></option>
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
                    <div class="col-md-6">
                      <div class="form-floating mb-md-0">
                        <select name="city" id="city" class="form-control <?php if(session('errors.city')) : ?>is-invalid<?php endif ?>" placeholder="City">
                          <option value="<?= (empty(old('city'))) ? '' : old('city') ?>" selected><?= (empty(old('city'))) ? 'Mohon Pilih Provinsi' : old('city') ?></option>
                        </select>
                        <label for="city">City</label>
                        <div class="invalid-feedback">
                          <?= session('errors.city') ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <select name="districts" id="districts" class="form-control <?php if(session('errors.districts')) : ?>is-invalid<?php endif ?>" placeholder="Districts">
                          <option value="<?= (empty(old('districts'))) ? '' : old('districts') ?>" selected><?= (empty(old('districts'))) ? 'Mohon Pilih Kabupaten/Kota' : old('districts') ?></option>
                        </select>
                        <label for="districts">Districts</label>
                        <div class="invalid-feedback">
                          <?= session('errors.districts') ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating mb-md-0">
                        <select name="village" id="village" class="form-control <?php if(session('errors.village')) : ?>is-invalid<?php endif ?>" placeholder="Village">
                          <option value="<?= (empty(old('village'))) ? '' : old('village') ?>" selected><?= (empty(old('village'))) ? 'Mohon Pilih Kecamatan' : old('village') ?></option>
                        </select>
                        <label for="village">Village</label>
                        <div class="invalid-feedback">
                          <?= session('errors.village') ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-4">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control <?php if(session('errors.komoditas')) : ?>is-invalid<?php endif ?>" name="komoditas" type="number" placeholder="Banyak Komoditas" value="<?= old('komoditas') ?>"/>
                        <label for="komoditas">Banyak Komoditas</label>
                        <div class="invalid-feedback">
                          <?= session('errors.komoditas') ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control <?php if(session('errors.populasi')) : ?>is-invalid<?php endif ?>" name="populasi" type="number" placeholder="Populasi Pohon" value="<?= old('populasi') ?>"/>
                        <label for="populasi">Populasi Pohon</label>
                        <div class="invalid-feedback">
                          <?= session('errors.populasi') ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-floating mb-md-0">
                        <input class="form-control <?php if(session('errors.tahun_tanam')) : ?>is-invalid<?php endif ?>" name="tahun_tanam" type="number" placeholder="Tahun Tanam" value="<?= old('tahun_tanam') ?>"/>
                        <label for="tahun_tanam">Tahun Tanam</label>
                        <div class="invalid-feedback">
                          <?= session('errors.tahun_tanam') ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control <?php if(session('errors.luas_lahan')) : ?>is-invalid<?php endif ?>" name="luas_lahan" type="number" placeholder="Luas Lahan" value="<?= old('luas_lahan') ?>"/>
                        <label for="luas_lahan">Luas Lahan (m<sup>2</sup>)</label>
                        <div class="invalid-feedback">
                          <?= session('errors.luas_lahan') ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating mb-md-0">
                        <input class="form-control <?php if(session('errors.jumlah_panen')) : ?>is-invalid<?php endif ?>" name="jumlah_panen" type="number" placeholder="Jumlah Panen" value="<?= old('jumlah_panen') ?>"/>
                        <label for="jumlah_panen">Jumlah Panen</label>
                        <div class="invalid-feedback">
                          <?= session('errors.jumlah_panen') ?>
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
                    <button type="submit" id="btn-submit" class="btn btn-primary btn-block float-end disabled"><?=lang('Auth.register')?></button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center py-3">
                <div class="small mb-1">
                  <a href="<?= base_url('/login') ?>">Already have an account? Login!</a>
                </div>
                <div class="small">
                  <a href="<?= base_url('/register') ?>">Register as User</a>
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
  $(document).keypress(function(event){
    if (event.which == '13') {
      event.preventDefault();
    }
  });

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