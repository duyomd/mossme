<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('main') ?>

<section id="hero" class="hidden"></section>

<section class="shield">
  <div class="container d-flex justify-content-center" data-aos="fade-up">
    <div class="col-12 col-md-5 shadow-sm">
      <div>
        <div>
          <div id="title" class="section-title">
          <h2><?=lang('Auth.changePassword')?></h2>
        </div>

          <?php if (session('error') !== null) : ?>
              <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
          <?php elseif (session('errors') !== null) : ?>
            <div class="alert alert-danger" role="alert">
              <?php if (is_array(session('errors'))) : ?>
                <?php foreach (session('errors') as $error) : ?>
                  <?= $error ?>
                  <br>
                <?php endforeach ?>
              <?php else : ?>
                <?= session('errors') ?>
              <?php endif ?>
            </div>
          <?php endif ?>

          <?php if (session('message') !== null) : ?>
            <div class="alert alert-success" role="alert"><?= session('message') ?></div>
          <?php endif ?>

        <form action="<?= url_to('changePassword') ?>" method="post">
          <?= csrf_field() ?>

          <!-- New password -->
          <div class="form-floating mb-2">
            <input type="password" class="form-control" id="floatingNewPasswordInput" name="password" inputmode="text" autocomplete="new-password" 
                placeholder="<?= lang('Auth.newPassword') ?>" required>
            <label for="floatingNewPasswordInput"><?= lang('Auth.newPassword') ?></label>
          </div>

          <!-- New password (Again) -->
          <div class="form-floating mb-5">
            <input type="password" class="form-control" id="floatingNewPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" 
                placeholder="<?= lang('Auth.newPasswordConfirm') ?>" required>
            <label for="floatingNewPasswordConfirmInput"><?= lang('Auth.newPasswordConfirm') ?></label>
          </div>

          <div class="text-center m-3">
            <button type="submit" class="btn btn-block"><?= lang('Auth.changePasswordBtn') ?></button>
          </div>

          <p class="text-center"><?= lang('Auth.changePasswordTime') ?></p>
          <p class="text-center"><?= lang('App.back_to') ?> <a href="<?= url_to('/') ?>"><?= lang('App.project_name') ?></a></p>
          
        </form>
      </div>
    </div>
  </div>
</section>  

<?= $this->endSection() ?>
