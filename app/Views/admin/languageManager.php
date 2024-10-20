<?php $path = dirname(dirname(__FILE__)) . '/'; ?>  
<?php include $path . 'templates/header.php';?>
<!-- End Header -->

  <?php 
    use App\Helpers\Utilities;
    use App\Models\LanguageModel;
  ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hidden"></section><!-- End Hero -->
  <!-- End Hero -->

  <main id="main">

    <div class="ajax-loading"><div><?=lang('App.loading')?></div></div>  
    
    <section class="data-input">
      <div class="container d-flex justify-content-center" data-aos="fade-up">
        <div class="row col-lg-8 table-container">

          <div id="input-form-container" class="mt-lg-0">
            <form action="/languages" method="post" role="form" class="ajax-form" 
                data-aos="fade-up" data-aos-delay="100">

              <div>
                <div class="error-message mb-3"></div>
                <div class="success-message mb-3"></div>
              </div>

              <div class="row">

                <div class="col-md-3 form-group">
                  <label for="code" class="form-label"><?=lang('App.label_code')?></label>
                  <input type="text" class="form-control" name="code" id="code"
                    value="<?= set_value('code') ?>">
                </div>

                <div class="col-md-3 form-group mt-3 mt-md-0">
                  <label for="language" class="form-label"><?=lang('App.label_language')?></label>
                  <input type="text" class="form-control" name="language" id="language"
                    value="<?= set_value('language') ?>">
                </div>

                <div class="col-md-3 form-group mt-3 mt-md-0">
                  <label for="sequence" class="form-label"><?=lang('App.label_sequence')?></label>
                  <input type="text" class="form-control" name="sequence" id="sequence"
                    value="<?= set_value('sequence') ?>">
                </div>

                <div class="col-md-3 form-group mt-3 mt-md-0">
                  <label for="status" class="form-label"><?=lang('App.language_label_status')?></label>
                  <select class="form-select" name="status" id="status">
                    <option value="1"><?=lang('App.language_label_status_active')?></option>
                    <option value="0"><?=lang('App.language_label_status_inactive')?></option>                    
                  </select>
                </div>

                <?php include $path . 'templates/hiddenFormList.php';?>
                
              </div>
              
              <div class="mt-3 text-center text-md-end">
                <button id="btn-delete" data-bs-target="#confirm-modal" data-bs-toggle="modal"
                    type="button" class="me-2 hidden">
                    <?=lang('App.btn_delete')?>
                  </button>
                <button id="btn-modify" type="submit" class="me-2 hidden" onclick="setMode('modify');">
                  <?=lang('App.btn_modify')?>
                </button>
                <button id="btn-insert" type="submit" onclick="setMode('insert');">
                  <?=lang('App.btn_insert')?>
                </button>
                <button id="hdn-delete" type="submit" class="hidden" onclick="setMode('delete')"></button>
                <button id="hdn-move-up" type="submit" class="hidden" onclick="setMode('move-up')"></button>
                <button id="hdn-move-down" type="submit" class="hidden" onclick="setMode('move-down')"></button>
              </div>
              
            </form>
          </div>

          <div id="title" class="section-title mt-5">
            <h2><?=lang('App.list')?></h2>
          </div>         
          <div class="table-responsive"></div>

        </div>

      </div>
    </section>
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->  
  <?php $url = 'languages'; include $path . 'templates/table.php';?>

  <!-- JS -->
  <script type="text/javascript">
    var option = {
      FIELDS_FETCH:               new Array('code', 'language', 'status', 'status_name', 'sequence'),
      FIELDS_TABLE:               new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'code'}, 
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'code',
                                      CONTENT_FIELD_STICKY: 'true', }, 
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'language'}, 
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'status_name'}, 
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'sequence'}, ),
      FIELDS_TABLE_HEADER:        new Array('',
                                    '<?=lang('App.label_code')?>', 
                                    '<?=lang('App.label_language')?>', 
                                    '<?=lang('App.language_label_status')?>', 
                                    '<?=lang('App.label_sequence')?>'),
      FIELDS_TABLE_ORDERBYS:      new Array('',
                                       '<?=implode(",", LanguageModel::HEADER_CODE_ORDERBYS)?>',
                                       '<?=implode(",", LanguageModel::HEADER_LANGUAGE_ORDERBYS)?>',
                                       '<?=implode(",", LanguageModel::HEADER_STATUS_ORDERBYS)?>',
                                       '<?=implode(",", LanguageModel::HEADER_SEQUENCE_ORDERBYS)?>'),
      RADIO_SHOW_BUTTON_IDS: new Array('btn-modify', 'btn-delete'),
      noMove: false,                                      
    };
    initTable(option);
  </script>

<?php include $path . 'templates/footer.php';?>