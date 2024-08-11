<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('main') ?>

  <section id="hero" class="hidden"></section>

  <section class="shield">
    <div class="container d-flex justify-content-center" data-aos="fade-up">
      <div class="col-12 col-md-5 shadow-sm">
        <div>
          <div>
            <div id="title" class="section-title">
            <h2><?=lang('Auth.useMagicLink')?></h2>
          </div>

          <p><b><?= lang('Auth.checkYourEmail') ?></b></p>

          <p><?= lang('Auth.magicLinkDetails', [setting('Auth.magicLinkLifetime') / 60]) ?></p>
        </div>
      </div>
    </div>
  </section>

<?= $this->endSection() ?>
