<?php 
    use App\Helpers\Utilities;
    use App\Models\SearchModel;
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
          <div id="input-form-container" class="mt-lg-0">
            <form action="/search" method="post" role="form" class="ajax-form" data-aos="fade-up" data-aos-delay="100">

                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-6 ">
                        <label for="serial" class="form-label"><?= lang('App.search_label_serial') ?></label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="serial" name="serial">
                        </div>   
                      </div>
                      <div class="col-6">
                        <label for="content" class="form-label"><?= lang('App.search_label_content') ?></label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="content" name="content" checked>
                        </div>   
                      </div>
                    </div>                    
                  </div>
                  <div class="col-md-6 mt-4 mt-md-0">
                    <div class="row">
                      <div class="col-6">
                        <label for="author" class="form-label"><?= lang('App.search_label_author') ?></label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="author" name="author">
                        </div>   
                      </div>
                      <div class="col-6">
                        <label for="commentary" class="form-label"><?= lang('App.search_label_commentary') ?></label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="commentary" name="commentary">
                        </div>   
                      </div>
                    </div>                    
                  </div>

                </div>

                <div class="row mt-4">
                  <div class="col-md-3 mt-md-0">
                    <label for="status" class="form-label"><?= lang('App.search_label_section') ?></label>
                    <select class="form-select fs-6" name="section" id="section">
                      <option value="1,2,3,4,5,7,8"><?= lang('App.search_section_all') ?></option>
                      <option value="1,2,8"><?= lang('App.search_section_discourse') ?></option>
                      <option value="3"><?= lang('App.search_section_discipline') ?></option>
                      <option value="4"><?= lang('App.search_section_analysis') ?></option>
                      <option value="5"><?= lang('App.search_section_reference') ?></option>
                      <option value="7"><?= lang('App.search_section_history') ?></option>
                    </select>
                  </div>
                  <div class="col-md-9 form-group mt-4 mt-md-0">
                    <label for="keyword" class="form-label"><?= lang('App.search_label_keyword') ?></label>
                    <input type="text" class="form-control" name="keyword" id="keyword" value="<?= set_value('keyword') ?>">
                  </div>                  

                </div>

                <?php include 'templates/hiddenFormList.php';?>
                
                <div class="mt-3 text-center text-md-end">
                  <button id="btn-search" type="submit" onclick="setMode('search')"><?=lang('App.search_btn')?></button>
                </div>

                <div>
                  <div class="error-message mt-3"></div>
                  <div class="success-message mt-3"></div>
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
  <?php $url = 'search'; include 'templates/table.php';?>

  <!-- JS -->
  <script type="text/javascript">
    window.onload = function() {
      addEventSerial();
      
      var option = {
        FIELDS_FETCH:           new Array('id', 'found_in', 'matched_at', 'language', 'entry_id', 
                                          'title', 'title_link', 'title_hash', 'author', 'section', 'section_id'),
        FIELDS_TABLE:           new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'}, 
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'found_in', CONTENT_FIELD_EXTRA: 'item.matched_at'},
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'language'},
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'entry_id'},
                                  {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.title',
                                    CONTENT_FIELD_STICKY: 'true',  
                                    CONTENT_FIELD_EXTRA: 'item.title_link', CONTENT_FIELD_EXTRA_HASH: 'item.title_hash'},
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'author'},
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'section_id', CONTENT_FIELD_EXTRA: 'item.section'}, ),
        FIELDS_TABLE_HEADER:    new Array('',
                                  '<?=lang('App.search_label_matched')?>',
                                  '<?=lang('App.search_label_language')?>',
                                  '<?=lang('App.search_label_serial')?>',
                                  '<?=lang('App.search_label_title')?>',
                                  '<?=lang('App.search_label_author')?>',
                                  '<?=lang('App.search_label_section')?>',),
        FIELDS_TABLE_ORDERBYS:  new Array('',
                                  '<?=implode(",", SearchModel::HEADER_MATCHEDAT_ORDERBYS)?>',
                                  '<?=implode(",", SearchModel::HEADER_LANGUAGE_ORDERBYS)?>',
                                  '<?=implode(",", SearchModel::HEADER_SERIAL_ORDERBYS)?>',
                                  '<?=implode(",", SearchModel::HEADER_TITLE_ORDERBYS)?>',
                                  '<?=implode(",", SearchModel::HEADER_AUTHOR_ORDERBYS)?>',
                                  '<?=implode(",", SearchModel::HEADER_SECTION_ORDERBYS)?>',),
        noMove:                 true,
        noRadio:                true,
      };
      initTable(option);
    }

    function toggleChecks() { 
      if (document.getElementById('serial').checked) {
        document.getElementById('content').disabled = true;
        document.getElementById('content').checked = false;
        document.getElementById('author').disabled = true;
        document.getElementById('author').checked = false;
        document.getElementById('commentary').disabled = true;
        document.getElementById('commentary').checked = false;
      } else {
        document.getElementById('content').disabled = false;
        document.getElementById('author').disabled = false;
        document.getElementById('commentary').disabled = false;
      } 
    }

    function addEventSerial() {
      addEvent(document.getElementById('serial'), 'change', function() {
        toggleChecks();
      });
    }
  </script>

<?php include 'templates/footer.php';?>