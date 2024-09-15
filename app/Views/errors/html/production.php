<?php
    use App\Helpers\Utilities;
    $displayHeader = lang('Errors.error');
    $path = dirname(dirname(dirname(__FILE__))) . '/';
    include $path . 'templates/header.php';?>
<!-- End Header -->

<main id="main">

  <section class="errors">
    <div class="container d-flex justify-content-center" data-aos="fade-up">
        <div class="wrap">
            <h2><?=lang('Errors.somethingWrong')?></h2>
            <p><?=lang('Errors.gotError')?></p>
            <p class="mt-0"><?=lang('Errors.pleaseContact')?></p>
        </div>
    </div>
  </div>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include $path . 'templates/footer.php';?>