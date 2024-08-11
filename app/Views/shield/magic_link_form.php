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
          <h2><?=lang('Auth.useMagicLinkShort')?></h2>
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

        <form action="<?= url_to('magic-link') ?>" method="post">
          <?= csrf_field() ?>

          <!-- Email -->
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="floatingEmailInput" name="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>"
              value="<?= old('email', auth()->user()->email ?? null) ?>">
            <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
          </div>

          <div class="text-center m-3 mt-5">
            <button onclick="loading(true)" type="submit" class="btn btn-primary btn-block"><?= lang('Auth.send') ?></button>
          </div>

        </form>

        <p class="text-center"><a href="<?= url_to('login') ?>"><?= lang('Auth.backToLogin') ?></a></p>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>

