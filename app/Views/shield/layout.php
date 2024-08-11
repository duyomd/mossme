<?php $displayHeader = lang('Auth.login');
      $path = dirname(dirname(__FILE__))  . '/'; ?>
<?php include $path . 'templates/header.php';?>

    <main role="main" class="container">
        <?= $this->renderSection('main') ?>
    </main>

<?= $this->renderSection('pageScripts') ?>
<?php include $path . 'templates/footer.php';?>
