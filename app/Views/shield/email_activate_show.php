<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('main') ?>

<section id="hero" class="hidden"></section>

<section class="shield">  
  <div class="container d-flex justify-content-center" data-aos="fade-up">
    <div class="col-12 col-md-5 shadow-sm">
      <div>
        <div>
          <div id="title" class="section-title">
          <h2><?=lang('Auth.emailActivateTitle')?></h2>
        </div>

        <?php if (session('error')) : ?>
          <div class="alert alert-danger"><?= session('error') ?></div>
        <?php endif ?>

        <p><?= lang('Auth.emailActivateBody') ?></p>

        <form action="<?= url_to('auth-action-verify') ?>" method="post">
          <?= csrf_field() ?>

          <!-- Code -->
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="floatingTokenInput" name="token" placeholder="000000" inputmode="numeric"
              pattern="[0-9]*" autocomplete="one-time-code" value="<?= old('token') ?>" required>
            <label for="floatingTokenInput"><?= lang('Auth.token') ?></label>
          </div>

          <div class="text-center mt-4 m-3">
            <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.send') ?></button>
          </div>

          <p class="text-center"><?= lang('Auth.cancelEmail') ?> <a href="<?= url_to('logout') ?>"><?= lang('App.logout') ?></a></p>

        </form>
      </div>
    </div>
  </div>
</section>  

<?= $this->endSection() ?>
