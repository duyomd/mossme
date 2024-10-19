<?php $path = dirname(dirname(__FILE__)) . '/'; ?>  
<?php include $path . 'templates/header.php';?>
<!-- End Header -->

  <?php 
    use App\Helpers\Utilities;
    use App\Models\CardModel;
  ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hidden"></section><!-- End Hero -->
  <!-- End Hero -->

  <main id="main">

    <div class="ajax-loading"><div><?=lang('App.loading')?></div></div>  

    <!-- ======= Image Modal ======= -->
    <?php include $path . 'templates/imageModal.php';?>
    
    <section class="data-input">
      <div class="container d-flex justify-content-center" data-aos="fade-up">
        <div class="row col-lg-8 table-container">

          <div id="input-form-container" class="mt-lg-0">
            <form action="/cards" method="post" role="form" class="ajax-form" 
                data-aos="fade-up" data-aos-delay="100">

              <div>
                <div class="error-message mb-3"></div>
                <div class="success-message mb-3"></div>
              </div>

              <div class="row">

                <div class="col-md-3 form-group mt-3 mt-md-0">
                  <label for="memo" class="form-label"><?=lang('App.card_label_memo')?></label>
                  <input type="text" class="form-control" name="memo" id="memo"
                    value="<?= set_value('memo') ?>">
                </div>

                <div class="col-md-3 form-group mt-3 mt-md-0">
                  <label for="sequence" class="form-label"><?=lang('App.card_label_sequence')?></label>
                  <input type="text" class="form-control" name="sequence" id="sequence"
                    value="<?= set_value('sequence') ?>">
                </div>

                <div class="col-md-3 form-group">
                  <label for="image_id" class="form-label"><?=lang('App.card_label_image')?></label>
                  <select class="form-select" name="image_id" id="image_id">
                    <?php foreach ($images as $image) :?>
                      <option value="<?= $image->id ?>"><?= $image->image_name ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="col-md-3 form-group mt-3 mt-md-0">
                  <label for="status" class="form-label"><?=lang('App.card_label_status')?></label>
                  <select class="form-select" name="status" id="status">
                    <option value="0"><?=lang('App.card_label_status_inactive')?></option>
                    <option value="1"><?=lang('App.card_label_status_active')?></option>
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
  <?php $url = 'cards'; include $path . 'templates/table.php';?>

  <!-- JS -->
  <script type="text/javascript">
    window.onload = function() {
      var option = {
        FIELDS_FETCH:               new Array('id', 'memo', 'image_id', 'image_name', 'image_url', 'status', 'status_name', 'sequence'),
        FIELDS_TABLE:               new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'},
                                      {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.memo',
                                        CONTENT_FIELD_STICKY: 'true',  
                                        CONTENT_FIELD_EXTRA: getCardTranslationUrl('item.id')},
                                      {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.image_name',
                                        CONTENT_FIELD_EXTRA_HASH: '"content-modal"',
                                        CONTENT_FIELD_EXTRA_END: 'data-bs-toggle="modal"',
                                        CONTENT_FIELD_EXTRA_ONCLICK: '"setModalContent(`" + encodeURIComponent(item.image_name) + "`,`" + encodeURIComponent(item.image_url) + "`)"'},
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'status_name'},  
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'sequence'}, ),
        FIELDS_TABLE_HEADER:        new Array('',
                                      '<?=lang('App.card_label_memo')?>', 
                                      '<?=lang('App.card_label_image')?>', 
                                      '<?=lang('App.card_label_status')?>', 
                                      '<?=lang('App.card_label_sequence')?>'),
        FIELDS_TABLE_ORDERBYS:      new Array('',
                                        '<?=implode(",", CardModel::HEADER_MEMO_ORDERBYS)?>',
                                        '<?=implode(",", CardModel::HEADER_IMAGE_NAME_ORDERBYS)?>',
                                        '<?=implode(",", CardModel::HEADER_STATUS_ORDERBYS)?>',
                                        '<?=implode(",", CardModel::HEADER_SEQUENCE_ORDERBYS)?>'),
        RADIO_SHOW_BUTTON_IDS: new Array('btn-modify', 'btn-delete'),
        noMove: false,                                      
      };
      initTable(option);
    }

    function setModalContent(title, url) {
      document.querySelector('#content-modal-header').innerHTML = decodeURIComponent(title);
      document.querySelector('#content-modal-body').src = decodeURIComponent(url);
    }

    function getCardTranslationUrl(cardId) {
      return "'/cardTranslations/conditions={&quot;cardId&quot;:&quot;' + " + cardId + " + '&quot;}'";
    }
  </script>

<?php include $path . 'templates/footer.php';?>