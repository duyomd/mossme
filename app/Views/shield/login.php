<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('main') ?>

  <section id="hero" class="hidden"></section>

  <section class="shield">
    <div class="container d-flex justify-content-center" data-aos="fade-up">
      <div class="col-12 col-md-5 shadow-sm">
        <div>
          <div id="title" class="section-title">
          <h2><?=lang('Auth.login')?></h2>
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

          <form action="<?= url_to('login') ?>" method="post">
            <?= csrf_field() ?>

            <!-- Email -->
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" 
                placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
              <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
            </div>

            <!-- Password -->
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="current-password" 
                placeholder="<?= lang('Auth.password') ?>" required>
              <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
            </div>

            <!-- Remember me -->
            <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')): ?> checked<?php endif ?>>
                    <?= lang('Auth.rememberMe') ?>
                </label>
              </div>
            <?php endif; ?>

            <div class="text-center m-3 mt-5">
              <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.login') ?></button>
            </div>

            <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
              <p class="text-center"><?= lang('Auth.forgotPassword') ?> <a href="<?= url_to('magic-link') ?>"><?= lang('Auth.useMagicLink') ?></a></p>
            <?php endif ?>

            <?php if (setting('Auth.allowRegistration')) : ?>
              <p class="text-center"><?= lang('Auth.needAccount') ?> <a href="<?= url_to('register') ?>"><?= lang('Auth.register') ?></a></p>
            <?php endif ?>

          </form>
        </div>
      </div>
    </div>
  </section>

<?= $this->endSection() ?>
