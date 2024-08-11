<?php 
    use App\Helpers\Utilities;
    use App\Models\BookmarkModel;
    include 'templates/header.php';
  ?>  
<!-- End Header -->  
  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hidden"></section><!-- End Hero -->
  <!-- End Hero -->

  <main id="main">

    <div class="ajax-loading"><div><?=lang('App.loading')?></div></div>  
    
    <section class="data-input">
      <div class="container d-md-flex justify-content-center" data-aos="fade-up">
        <div class="row col-lg-8 table-container">
          <div class="row mx-0">
            <button class="btn btn-collapser" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-form" 
              aria-expanded="false" aria-controls="collapseForm">
              <?= lang('App.toggle_form') ?>
            </button>
          </div>

          <div class="collapse mt-3" id="collapse-form">
            <div id="input-form-container" class="mt-lg-0">
              <form action="/bookmarks" method="post" role="form" class="ajax-form" 
                  data-aos="fade-up" data-aos-delay="100">

                <div>
                  <div class="error-message mb-3"></div>
                  <div class="success-message mb-3"></div>
                </div>

                <div class="row pe-0">
                  <div class="col-md-4 form-group">
                    <label for="name" class="form-label"><?=lang('App.bookmark_label_name')?></label>
                    <input type="text" class="form-control" name="name" id="name"
                      value="<?= set_value('name') ?>">
                  </div>

                  <div class="col-md-8 form-group mt-3 mt-md-0">
                    <label for="url" class="form-label"><?=lang('App.bookmark_label_url')?></label>
                    <input type="text" class="form-control" name="url" id="url" disabled
                      value="<?= set_value('url') ?>">
                    <input type="hidden"name="url" id="url" value="<?= set_value('url') ?>">  
                  </div>
                </div>

                <input type="hidden"name="sequence" id="sequence" value="<?= set_value('sequence') ?>">  

                <div class="row mt-0 mt-md-3">
                  <div class="form-group mt-3 mt-md-0">
                    <label for="note" class="form-label"><?=lang('App.bookmark_label_note')?></label>
                    <?php $ta = array(
                                'class'       => 'form-control',
                                'id'          => 'note',
                                'name'        => 'note',
                                'value'       => set_value('note'),
                                'rows'        => '3',
                    );?>
                    <?= form_textarea($ta) ?>
                  </div>
                </div>

                <?php include 'templates/hiddenFormList.php';?>
                
                <div class="mt-3 text-center text-md-end">
                  <button id="btn-delete" data-bs-target="#confirm-modal" data-bs-toggle="modal"
                    type="button" class="me-2 hidden">
                    <?=lang('App.btn_delete')?>
                  </button>
                  <button id="btn-modify" type="submit" class="me-2 hidden" onclick="setMode('modify');">
                    <?=lang('App.btn_modify')?>
                  </button>
                  <button id="hdn-delete" type="submit" class="hidden" onclick="setMode('delete')"></button>
                  <button id="hdn-move-up" type="submit" class="hidden" onclick="setMode('move-up')"></button>
                  <button id="hdn-move-down" type="submit" class="hidden" onclick="setMode('move-down')"></button>
                </div>
                
              </form>
            </div>
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
  <?php $url = 'bookmarks'; include 'templates/table.php';?>

  <!-- JS -->
  <script type="text/javascript">
    var option = {
      FIELDS_FETCH:               new Array('id', 'name', 'url', 'note', 'sequence'),
      FIELDS_TABLE:               new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'}, 
                                    {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.name', 
                                      CONTENT_FIELD_STICKY: 'true', 
                                      CONTENT_FIELD_EXTRA: 'item.url'}, 
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'note'}, 
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'sequence'}, ),
      FIELDS_TABLE_HEADER:        new Array('',
                                    '<?=lang('App.bookmark_label_name')?>', 
                                    '<?=lang('App.bookmark_label_note')?>', 
                                    '<?=lang('App.bookmark_label_sequence')?>'),
      FIELDS_TABLE_ORDERBYS:      new Array('',
                                       '<?=implode(",", BookmarkModel::HEADER_NAME_ORDERBYS)?>',
                                       '<?=implode(",", BookmarkModel::HEADER_NOTE_ORDERBYS)?>',
                                       '<?=implode(",", BookmarkModel::HEADER_SEQUENCE_ORDERBYS)?>'),
      RADIO_SHOW_BUTTON_IDS: new Array('btn-modify', 'btn-delete'),
      noMove: false,                                      
    };
    initTable(option);
  </script>

<?php include 'templates/footer.php';?>