<?php $path = dirname(dirname(__FILE__)) . '/'; ?>  
<?php include $path . 'templates/header.php';?>
<!-- End Header -->

  <?php 
    use App\Helpers\Utilities;
    use App\Models\CardTranslationModel;
  ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hidden"></section><!-- End Hero -->
  <!-- End Hero -->

  <main id="main">

    <div class="ajax-loading"><div><?=lang('App.loading')?></div></div>  

    <section class="data-input">
      <div class="container d-md-flex justify-content-center" data-aos="fade-up">
        <div class="row col-lg-12 table-container">

          <div id="input-form-container" class="mt-lg-0">
            <form action="/cardTranslations" method="post" role="form" class="ajax-form" 
                data-aos="fade-up" data-aos-delay="100">

              <div>
                <div class="error-message mb-3"></div>
                <div class="success-message mb-3"></div>
              </div>

              <div class="row">

                <div class="col-md-2 mt-3 mt-md-0">
                  <label for="card_id" class="form-label"><?=lang('App.card_translation_label_card_id')?></label>
                  <input type="text" class="form-control" disabled
                    value="<?=$cardId?>">
                  <input type="hidden" class="form-control " name="card_id" id="card_id"
                    value="<?=$cardId?>">  
                </div>

                <div class="col-md-3 mt-3 mt-md-0">
                  <label for="card_id" class="form-label"><?=lang('App.card_label_memo')?></label>
                  <input type="text" class="form-control" disabled value="<?=$cardMemo?>">
                </div>

                <div class="col-md-3 mt-3 mt-md-0">
                  <label for="author" class="form-label"><?=lang('App.card_translation_label_author')?></label>
                  <input type="text" class="form-control" name="author" id="author"
                    value="<?= set_value('author') ?>">
                </div>

                <div class="col-md-2 mt-3 mt-md-0">
                  <label for="language_code" class="form-label"><?=lang('App.card_translation_label_language')?></label>
                  <select class="form-select" name="language_code" id="language_code">
                    <?php foreach ($languages as $language) :?>
                      <option value="<?= $language->code ?>"><?= $language->language ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="col-md-2 mt-3 mt-md-0">
                  <label for="status" class="form-label"><?=lang('App.card_translation_label_status')?></label>
                  <select class="form-select" name="status" id="status">
                    <option value="0"><?=lang('App.card_translation_label_status_inactive')?></option>
                    <option value="1"><?=lang('App.card_translation_label_status_active')?></option>
                  </select>
                </div>

              </div>

              <div class="row mt-3">

                <div class="col-md-6 mt-3 mt-md-0">
                  <label for="header_field" class="form-label"><?=lang('App.card_translation_label_header')?></label>
                  <?php $hd = array(
                              'class'       => 'form-control',
                              'id'          => 'header_field',
                              'name'        => 'header_field',
                              'value'       => set_value('header_field'),
                              'rows'        => '3',
                  );?>
                  <?= form_textarea($hd) ?>
                </div>

                <div class="col-md-6 mt-3 mt-md-0">
                  <label for="footer_field" class="form-label"><?=lang('App.card_translation_label_footer')?></label>
                  <?php $ft = array(
                              'class'       => 'form-control',
                              'id'          => 'footer_field',
                              'name'        => 'footer_field',
                              'value'       => set_value('footer_field'),
                              'rows'        => '3',
                  );?>
                  <?= form_textarea($ft) ?>
                </div>

              </div>

              <div class="row mt-3">
                <?php include $path . 'templates/ckeditor.php';?>
              </div>

              <input type="hidden" id="cardId" name="cardId" value="<?=$cardId?>">
              <?php include $path . 'templates/hiddenFormList.php';?>
              
              <div class="row mt-3">
                <div class="col-md-6 d-none d-md-block text-md-start">
                  <a href='/cardTranslations/conditions={"cardId":"<?=$previousCardId?>"}' 
                    class="me-2 d-inline-block text-center <?php if(!isset($previousCardId)) echo ' disabled'; ?>" type="button">
                    <i class="bi bi-chevron-double-<?= App\Helpers\Utilities::isRightToLeft() ? 'right' : 'left' ?>"></i>
                  </a>
                  <a href='/cardTranslations/conditions={"cardId":"<?=$nextCardId?>"}'
                    class="d-inline-block text-center <?php if(!isset($nextCardId)) echo ' disabled'; ?>" type="button">
                    <i class="bi bi-chevron-double-<?= App\Helpers\Utilities::isRightToLeft() ? 'left' : 'right' ?>"></i>
                  </a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                  <button id="btn-delete" data-bs-target="#confirm-modal" data-bs-toggle="modal"
                      type="button" class="me-2 hidden">
                      <?=lang('App.btn_delete')?>
                    </button>
                  <button id="btn-modify" type="submit" class="me-2 hidden" onclick="onsubmitContent();setMode('modify');">
                    <?=lang('App.btn_modify')?>
                  </button>
                  <button id="btn-insert" type="submit" onclick="onsubmitContent();setMode('insert');">
                    <?=lang('App.btn_insert')?>
                  </button>
                  <button id="hdn-delete" type="submit" class="hidden" onclick="setMode('delete')"></button>
                </div>
              </div>
              
            </form>
          </div>

          <div id="title" class="section-title mt-5">
            <h2><?=lang('App.list')?></h2>
          </div>         
          <div class="table-responsive ck-content"></div>

        </div>

      </div>
    </section>
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->  
  <?php $url = 'cardTranslations'; include $path . 'templates/table.php';?>

  <!-- JS -->
  <script type="text/javascript">

    window.onload = function() {
      var option = {
        FIELDS_FETCH:               new Array('id', 'card_id', 'title', 'author', 'language_code', 'language', 
                                      'status', 'status_name', 'header_field', 'footer_field', 'content'),
        FIELDS_TABLE:               new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'},
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: ''},   
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'card_id'},
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'language'},
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'author'},
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'header_field',
                                        CONTENT_FIELD_TRIM: 4},
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'content',
                                        CONTENT_FIELD_TRIM: 4},
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'footer_field',
                                        CONTENT_FIELD_TRIM: 4},
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'status_name'},),
        FIELDS_TABLE_HEADER:        new Array('',
                                      '<a href="' + backToCard() + '"><i class="bi bi-reply"></i></a>',
                                      '<?=lang('App.card_translation_label_card_id')?>', 
                                      '<?=lang('App.card_translation_label_language')?>', 
                                      '<?=lang('App.card_translation_label_author')?>', 
                                      '<?=lang('App.card_translation_label_header')?>', 
                                      '<?=lang('App.card_translation_label_content')?>',
                                      '<?=lang('App.card_translation_label_footer')?>', 
                                      '<?=lang('App.translation_label_status')?>',),
        FIELDS_TABLE_ORDERBYS:      new Array('',
                                        '',  
                                        '<?=implode(",", CardTranslationModel::HEADER_CARD_ID_ORDERBYS)?>',
                                        '<?=implode(",", CardTranslationModel::HEADER_LANGUAGE_ORDERBYS)?>',
                                        '<?=implode(",", CardTranslationModel::HEADER_AUTHOR_ORDERBYS)?>',
                                        '<?=implode(",", CardTranslationModel::HEADER_HEADER_ORDERBYS)?>',
                                        '<?=implode(",", CardTranslationModel::HEADER_CONTENT_ORDERBYS)?>',                                        
                                        '<?=implode(",", CardTranslationModel::HEADER_FOOTER_ORDERBYS)?>',
                                        '<?=implode(",", CardTranslationModel::HEADER_STATUS_ORDERBYS)?>',),
        RADIO_SHOW_BUTTON_IDS: new Array('btn-modify', 'btn-delete'),
        noMove: true,                                      
      };
      initTable(option);
    }

    function backToCard(parentId) {
      return '/cards';
    }

  </script>

<?php include $path . 'templates/footer.php';?>