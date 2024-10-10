<?php
    use App\Helpers\Utilities;
    $displayHeader = ENVIRONMENT !== 'production' ? lang('Errors.pageNotFound') : lang('Errors.notFound');
    $path = dirname(dirname(dirname(__FILE__))) . '/';
    include $path . 'templates/header.php';?>
<!-- End Header -->

<main id="main">

  <section class="exception">
    <div class="container d-flex justify-content-center" data-aos="fade-up">
        <div class="wrap">
            <?php if (ENVIRONMENT !== 'production') : ?>
                <h1>404</h1>
                <p><?= nl2br(esc($message)) ?></p>
            <?php else : ?>
                <h2><?=lang('Errors.notFound')?></h2>
                <p><?= lang('Errors.cannotFind') ?></p>
            <?php endif; ?>
        </div>
    </div>
  </div>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include $path . 'templates/footer.php';?>