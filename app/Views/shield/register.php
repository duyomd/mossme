<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('main') ?>

<div class="ajax-loading"><div><?=lang('App.loading')?></div></div>

<section id="hero" class="hidden"></section>

<section class="shield">
  <div class="container d-flex justify-content-center" data-aos="fade-up">
    <div class="col-12 col-md-5 shadow-sm">
      <div>
        <div>
          <div id="title" class="section-title">
          <h2><?=lang('Auth.register')?></h2>
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

        <form action="<?= url_to('register') ?>" method="post">
          <?= csrf_field() ?>

          <!-- Email -->
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" 
                placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
            <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
          </div>

          <!-- Username -->
          <div class="form-floating mb-4">
            <input type="text" class="form-control" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" 
                placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
            <label for="floatingUsernameInput"><?= lang('Auth.username') ?></label>
          </div>

          <!-- Password -->
          <div class="form-floating mb-2">
            <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="new-password" 
                placeholder="<?= lang('Auth.password') ?>">
            <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
          </div>

          <!-- Password (Again) -->
          <div class="form-floating mb-5">
            <input type="password" class="form-control" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" 
                placeholder="<?= lang('Auth.passwordConfirm') ?>">
            <label for="floatingPasswordConfirmInput"><?= lang('Auth.passwordConfirm') ?></label>
          </div>

          <div class="text-center m-3">
            <button onclick="loading(true)" type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
          </div>

          <p class="text-center"><?= lang('Auth.haveAccount') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.login') ?></a></p>

        </form>
      </div>
    </div>
  </div>
</section>  

<?= $this->endSection() ?>
