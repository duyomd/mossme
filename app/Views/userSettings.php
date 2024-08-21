<?php use App\Helpers\Utilities;
      include 'templates/header.php'; 
?>
<!-- End Header -->

<section id="hero" class="hidden"></section>

<main id="main">

  <section class="settings">
    <div class="container d-flex justify-content-center" data-aos="fade-up">

      <div class="row col-md-12 col-lg-8">
        <div id="input-form-container" class="mt-lg-0">

          <form action="/userSettings" method="post" role="form" class="input-form" data-aos="fade-up" data-aos-delay="100">

            <?= csrf_field() ?>  

            <?php $success = session('success'); 
                  $error = session('error');
                  if (isset($error) || $success) : ?>  
              <div class="mb-3">
                <?php if ($error) : ?>
                  <div class="error-message d-block"><?= $error ?></div>
                <?php endif ?>
                <?php if ($success) : ?>
                  <div class="success-message d-block"><?=lang('App.msg_settings_updated')?></div>
                <?php endif ?>
              </div>
            <?php endif ?>
        
            <div class="row px-2 px-md-0">

              <div class="col-md-6 form-group pe-lg-5">
                <label for="language_code" class="form-label title-label"><span><?=lang('App.setting_language')?></span></label>
                <select class="form-select" name="language_code" id="language_code">
                  <?php foreach ($languages as $lang) : ?>
                    <option value="<?=$lang->code?>" 
                      <?php if (isset($userSettings) && $userSettings->language_code == $lang->code) echo "selected";?>>
                      <?=$lang->language?>
                    </option>
                  <?php endforeach ?>   
                </select>
                <p class="fst-italic mt-3 ps-2"><?=lang('App.setting_language_detail')?></p>
              </div>

              <div class="col-md-6 form-group mt-4 mt-md-0 ps-lg-5">
                <label for="rows_per_page" class="form-label title-label"><?=lang('App.setting_num_rows_per_page')?></label>
                <select class="form-select" name="rows_per_page" id="rows_per_page">
                  <?php foreach (Utilities::PAGINATION_RPPS as $num) : ?>
                    <option value="<?=$num?>"
                      <?php if (isset($userSettings) && $userSettings->rows_per_page == $num) echo "selected";?>>
                      <?=$num?>
                    </option>
                  <?php endforeach ?>   
                </select>
                <p class="fst-italic mt-3 ps-2"><?=lang('App.setting_rpp_detail')?></p>
              </div>

            </div>

            <div class="row mt-4 px-2 px-md-0">

              <div class="col-md-6 form-group pe-lg-5">
                <label for="num_of_cards" class="form-label title-label"><?=lang('App.setting_num_of_cards')?></label>
                <select class="form-select" name="num_of_cards" id="num_of_cards">
                  <?php foreach (Utilities::EVENT_NUMS as $num) : ?>
                    <option value="<?=$num?>"
                      <?php if (isset($userSettings) && $userSettings->num_of_cards == $num) echo "selected";?>>
                      <?=$num?>
                    </option>
                  <?php endforeach ?>
                </select>
                <p class="fst-italic mt-3 ps-2"><?=lang('App.setting_noc_detail')?></p>
              </div>

              <div class="col-md-6 form-group mt-4 mt-md-0 ps-lg-5">
                <label for="theme_code" class="form-label title-label"><?=lang('App.setting_theme')?></label>
                <select class="form-select" name="theme_code" id="theme_code">
                  <option value="dark"
                    <?php if (isset($userSettings) && $userSettings->theme_code == 'dark') echo "selected";?>>
                    <?=lang('App.theme_dark')?>
                  </option>
                  <option value="light" 
                    <?php if (isset($userSettings) && $userSettings->theme_code == 'light') echo "selected";?>>
                    <?=lang('App.theme_light')?></option>
                </select>
                <p class="fst-italic mt-3 ps-2"><?=lang('App.setting_theme_detail')?></p>
              </div>

            </div>

            <div class="row mt-4 px-2 px-md-0 mb-4">

              <div class="col-md-6 pe-lg-5">
                <label class="form-label title-label mb-3"><?=lang('App.setting_display_mode')?></label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="lite_mode" id="radio-full" value="0" 
                    <?php if (!isset($userSettings) || $userSettings->lite_mode == 0) echo "checked";?>>
                  <label class="form-check-label" for="radio-full"><?=lang('App.setting_dm_full')?></label>
                </div>
                <div class="form-check form-check-inline float-end me-0">
                  <input class="form-check-input" type="radio" name="lite_mode" id="radio-lite" value="1" 
                    <?php if (isset($userSettings) && $userSettings->lite_mode == 1) echo "checked";?>>
                  <label class="form-check-label" for="radio-lite"><?=lang('App.setting_dm_lite')?></label>
                </div>
                <p class="fst-italic mt-3 ps-2"><?=lang('App.setting_dm_detail')?></p>
              </div>

            </div>

            <div class="mt-4 text-center text-md-end">
              <button id="btn-insert" type="submit" onclick="">
                <?=lang('App.settings_btn_save')?>
              </button>
            </div>
            
          </form>

        </div>
      </div>

    </div>
  </div>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include 'templates/footer.php';?>