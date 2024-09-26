<?php $path = dirname(dirname(__FILE__)) . '/'; ?>  
<?php include $path . 'templates/header.php';?>
<!-- End Header -->

  <?php 
    use App\Helpers\Utilities;
    use App\Models\CommentaryModel;
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
            <form action="/commentaries" method="post" role="form" class="ajax-form" 
                data-aos="fade-up" data-aos-delay="100">

              <div>
                <div class="error-message mb-3"></div>
                <div class="success-message mb-3"></div>
              </div>

              <div class="row">

                <div class="col-md-3 mt-3 mt-md-0">
                  <label for="entry_id" class="form-label"><?=lang('App.commentary_label_entry_id')?></label>
                  <input type="text" class="form-control" disabled
                    value="<?=$entryId?>">
                  <input type="hidden" class="form-control " name="entry_id" id="entry_id"
                    value="<?=$entryId?>">  
                </div>

                <div class="col-md-3 mt-3 mt-md-0">
                  <label for="author" class="form-label"><?=lang('App.commentary_label_author')?></label>
                  <input type="text" class="form-control" name="author" id="author"
                    value="<?= set_value('author') ?>">
                </div>

                <div class="col-md-3 mt-3 mt-md-0">
                  <label for="language_code" class="form-label"><?=lang('App.commentary_label_language')?></label>
                  <select class="form-select" name="language_code" id="language_code">
                    <?php foreach ($languages as $language) :?>
                      <option value="<?= $language->code ?>"><?= $language->language ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="col-md-3 mt-3 mt-md-0">
                  <label for="status" class="form-label"><?=lang('App.commentary_label_status')?></label>
                  <select class="form-select" name="status" id="status">
                    <option value="0"><?=lang('App.commentary_label_status_inactive')?></option>
                    <option value="1"><?=lang('App.commentary_label_status_active')?></option>
                  </select>
                </div>

              </div>

              <div class="row mt-3">

                <div class="col-md-6 mt-3 mt-md-0">
                  <label for="author_note" class="form-label"><?=lang('App.commentary_label_author_note')?></label>
                  <?php $an = array(
                              'class'       => 'form-control',
                              'id'          => 'author_note',
                              'name'        => 'author_note',
                              'value'       => set_value('author_note'),
                              'rows'        => '3',
                  );?>
                  <?= form_textarea($an) ?>
                </div>

                <div class="col-md-6 mt-3 mt-md-0">
                  <label for="notation" class="form-label"><?=lang('App.commentary_label_notation')?></label>
                  <?php $no = array(
                              'class'       => 'form-control',
                              'id'          => 'notation',
                              'name'        => 'notation',
                              'value'       => set_value('notation'),
                              'rows'        => '3',
                  );?>
                  <?= form_textarea($no) ?>
                </div>

              </div>

              <div class="row mt-3">
                <?php include $path . 'templates/ckeditor.php';?>
              </div>

              <input type="hidden" id="entryId" name="entryId" value="<?=$entryId?>">
              <?php include $path . 'templates/hiddenFormList.php';?>
              
              <div class="mt-3 text-center text-md-end">
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
  <?php $url = 'commentaries'; include $path . 'templates/table.php';?>

  <!-- JS -->
  <script type="text/javascript">

    window.onload = function() {
      var option = {
        FIELDS_FETCH:               new Array('id', 'entry_id', 'author', 'language_code', 'language', 
                                      'status', 'status_name', 'author_note', 'notation', 'content'),
        FIELDS_TABLE:               new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'},
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: ''},   
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'entry_id'},
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'language'},
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'author',
                                        CONTENT_FIELD_STICKY: 'true'},                                       
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'content',
                                        CONTENT_FIELD_TRIM: 4},
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'author_note',
                                        CONTENT_FIELD_TRIM: 4},
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'notation',
                                        CONTENT_FIELD_TRIM: 4},
                                      {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'status_name'},),
        FIELDS_TABLE_HEADER:        new Array('',
                                      '<a href="' + backToEntry(`\'<?=$parentEntryId?>\'`) + '"><i class="bi bi-reply"></i></a>',
                                      '<?=lang('App.commentary_label_entry_id')?>', 
                                      '<?=lang('App.commentary_label_language')?>', 
                                      '<?=lang('App.commentary_label_author')?>', 
                                      '<?=lang('App.commentary_label_content')?>',
                                      '<?=lang('App.commentary_label_author_note')?>', 
                                      '<?=lang('App.commentary_label_notation')?>', 
                                      '<?=lang('App.commentary_label_status')?>',),
        FIELDS_TABLE_ORDERBYS:      new Array('',
                                        '',
                                        '<?=implode(",", CommentaryModel::HEADER_ENTRY_ID_ORDERBYS)?>',
                                        '<?=implode(",", CommentaryModel::HEADER_LANGUAGE_ORDERBYS)?>',
                                        '<?=implode(",", CommentaryModel::HEADER_AUTHOR_ORDERBYS)?>',
                                        '<?=implode(",", CommentaryModel::HEADER_CONTENT_ORDERBYS)?>',                                        
                                        '<?=implode(",", CommentaryModel::HEADER_AUTHOR_NOTE_ORDERBYS)?>',
                                        '<?=implode(",", CommentaryModel::HEADER_NOTATION_ORDERBYS)?>',
                                        '<?=implode(",", CommentaryModel::HEADER_STATUS_ORDERBYS)?>',),
        RADIO_SHOW_BUTTON_IDS: new Array('btn-modify', 'btn-delete'),
        noMove: true,                                      
      };
      initTable(option);
    }

    function backToEntry(parentId) {
      if (parentId && parentId != "''") {
        return eval(getFolderUrl(parentId));
      }
      return '/entries';
    }

    function getFolderUrl(entryId) {
      return "'/entries/conditions={&quot;parentId&quot;:&quot;' + " + entryId + " + '&quot;}'";
    }

  </script>

<?php include $path . 'templates/footer.php';?>