<?php $path = dirname(dirname(__FILE__)) . '/'; ?>  
<?php include $path . 'templates/header.php';?>
<!-- End Header -->

  <?php 
    use App\Helpers\Utilities;
    use App\Models\MessageModel;
  ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hidden"></section><!-- End Hero -->
  <!-- End Hero -->

  <main id="main">

    <div class="ajax-loading"><div><?=lang('App.loading')?></div></div>  

    <!-- ======= Content Modal ======= -->
    <div class="modal fade" id="content-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-xl modal-confirm">
          <div class="modal-content">
            <div class="modal-header">
              <h1 id="content-modal-header" class="modal-title fs-5"></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light text-dark">
              <span id="content-modal-body"></span>
            </div>
            <div class="modal-footer">                        
              <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                <?= lang('App.bookmark_btn_close') ?></button>
            </div>
          </div>
      </div>
    </div>
    
    <section class="data-input">
      <div class="container d-md-flex justify-content-center" data-aos="fade-up">
        <div class="row col-lg-12 table-container">

          <div class="row mx-0">
            <button class="btn btn-collapser" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-form" 
              aria-expanded="false" aria-controls="collapseForm">
              <?= lang('App.toggle_form') ?>
            </button>
          </div>

          <div class="collapse mt-3" id="collapse-form">
            <div id="input-form-container" class="mt-lg-0">
              <form action="/messages" method="post" class="ajax-form" data-aos="fade-up" data-aos-delay="100">

                <div>
                  <div class="error-message mb-3"></div>
                  <div class="success-message mb-3"></div>
                </div>

                <div class="row">

                  <div class="col-md-4 form-group">
                    <label for="read_state" class="form-label"><?=lang('App.message_label_state')?></label>
                    <select class="form-select" name="read_state" id="read_state">
                      <option value="1"><?=lang('App.message_state_read')?></option>
                      <option value="0"><?=lang('App.message_state_unread')?></option>
                     </select>
                  </div>

                  <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label for="status" class="form-label"><?=lang('App.message_label_status')?></label>
                    <select class="form-select" name="status" id="status">
                      <option value="1"><?=lang('App.message_status_active')?></option>
                      <option value="0"><?=lang('App.message_status_spam')?></option>
                     </select>
                  </div>

                  <div class="col-md-4 form-group ">
                    <label class="form-label">&nbsp;</label>
                    <div class="text-center text-md-end">
                      <?php if (auth()->user()->inGroup('superadmin')) : ?>
                        <button id="btn-delete" data-bs-target="#confirm-modal" data-bs-toggle="modal"
                          type="button" class="me-2 hidden">
                          <?=lang('App.btn_delete')?>
                        </button>
                        <button id="hdn-delete" type="submit" class="hidden" onclick="setMode('delete')"></button>
                      <?php endif ?>
                      <button id="btn-modify" type="submit" class="hidden" onclick="setMode('modify');">
                        <?=lang('App.btn_modify')?>
                      </button>
                    </div>
                  </div>

                  <?php include $path . 'templates/hiddenFormList.php';?>
                  
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
  <?php $url = 'messages'; include $path . 'templates/table.php';?>

  <!-- JS -->
  <script src="/assets/js/view/messageManager.min.js"></script>
  <script type="text/javascript">
    initMessageManager({
      MSG_SENDER        : '<?=lang('App.message_label_sender')?>', 
      MSG_NAME          : '<?=lang('App.message_label_name')?>', 
      MSG_SUBJECT       : '<?=lang('App.message_label_subject')?>',
      MSG_CONTENT       : '<?=lang('App.message_label_content')?>', 
      MSG_EMAIL         : '<?=lang('App.message_label_email')?>',
      MSG_IP            : '<?=lang('App.message_label_ip')?>', 
      MSG_ULC           : '<?=lang('App.message_label_ulc')?>', 
      MSG_STATUS        : '<?=lang('App.message_label_status')?>', 
      MSG_SENT_AT       : '<?=lang('App.message_label_sent_at')?>',

      ORDER_READ_STATE  : '<?=implode(",", MessageModel::HEADER_READSTATE_ORDERBYS)?>',
      ORDER_SENDER      : '<?=implode(",", MessageModel::HEADER_SENDER_ORDERBYS)?>',
      ORDER_NAME        : '<?=implode(",", MessageModel::HEADER_NAME_ORDERBYS)?>',
      ORDER_SUBJECT     : '<?=implode(",", MessageModel::HEADER_SUBJECT_ORDERBYS)?>',
      ORDER_CONTENT     : '<?=implode(",", MessageModel::HEADER_CONTENT_ORDERBYS)?>',
      ORDER_EMAIL       : '<?=implode(",", MessageModel::HEADER_EMAIL_ORDERBYS)?>',
      ORDER_IP          : '<?=implode(",", MessageModel::HEADER_IPADDRESS_ORDERBYS)?>',
      ORDER_ULC         : '<?=implode(",", MessageModel::HEADER_ULC_ORDERBYS)?>',
      ORDER_STATUS      : '<?=implode(",", MessageModel::HEADER_STATUS_ORDERBYS)?>',
      ORDER_SENT_AT     : '<?=implode(",", MessageModel::HEADER_SENTAT_ORDERBYS)?>',
    });
  </script>

<?php include $path . 'templates/footer.php';?>