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
            <form action="/cards" method="post" class="ajax-form" 
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
  <script src="/assets/js/view/cardManager.js"></script>
  <script type="text/javascript">
    initCardManager({
      MSG_MEMO        : '<?=lang('App.card_label_memo')?>',
      MSG_IMAGE       : '<?=lang('App.card_label_image')?>', 
      MSG_STATUS      : '<?=lang('App.card_label_status')?>', 
      MSG_SEQUENCE    : '<?=lang('App.card_label_sequence')?>',

      ORDER_MEMO      : '<?=implode(",", CardModel::HEADER_MEMO_ORDERBYS)?>',
      ORDER_IMAGE     : '<?=implode(",", CardModel::HEADER_IMAGE_NAME_ORDERBYS)?>',
      ORDER_STATUS    : '<?=implode(",", CardModel::HEADER_STATUS_ORDERBYS)?>',
      ORDER_SEQUENCE  : '<?=implode(",", CardModel::HEADER_SEQUENCE_ORDERBYS)?>',
    });
  </script>

<?php include $path . 'templates/footer.php';?>