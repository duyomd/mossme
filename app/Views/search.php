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
            <form action="/search" method="post" class="ajax-form" data-aos="fade-up" data-aos-delay="100">

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
                    <label for="section" class="form-label"><?= lang('App.search_label_section') ?></label>
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
  <script src="/assets/js/view/search.js"></script>
  <script type="text/javascript">
    initSearch({
      MSG_MATCHED     : '<?=lang('App.search_label_matched')?>',
      MSG_LANGUAGE    : '<?=lang('App.search_label_language')?>',
      MSG_CODE        : '<?=lang('App.search_label_serial')?>',
      MSG_TITLE       : '<?=lang('App.search_label_title')?>',
      MSG_AUTHOR      : '<?=lang('App.search_label_author')?>',
      MSG_SECTION     : '<?=lang('App.search_label_section')?>',

      ORDER_MATCHED   : '<?=implode(",", SearchModel::HEADER_MATCHEDAT_ORDERBYS)?>',
      ORDER_LANGUAGE  : '<?=implode(",", SearchModel::HEADER_LANGUAGE_ORDERBYS)?>',
      ORDER_CODE      : '<?=implode(",", SearchModel::HEADER_SERIAL_ORDERBYS)?>',
      ORDER_TITLE     : '<?=implode(",", SearchModel::HEADER_TITLE_ORDERBYS)?>',
      ORDER_AUTHOR    : '<?=implode(",", SearchModel::HEADER_AUTHOR_ORDERBYS)?>',
      ORDER_SECTION   : '<?=implode(",", SearchModel::HEADER_SECTION_ORDERBYS)?>',
    });
  </script>

<?php include 'templates/footer.php';?>