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
  <script type="text/javascript">
    window.onload = function() {
      var option = {
        FIELDS_FETCH:           new Array('id', 'read_state', 'sender', 'ip_address', 'user_language_code', 'language', 'name', 'email', 
                                          'subject', 'content', 'content_str', 'status', 'status_str', 'sent_at', 'sent_at_str'),
        FIELDS_TABLE:           new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'}, 
                                  {CONTENT_TYPE: CONTENT_TYPES.IMAGE, CONTENT_FIELD: 'read_state', 
                                    CONTENT_FIELD_EXTRA: 'item.read_state == 1 ? "" : "<i class=\'unread\'></i>";'}, 
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'sender'}, 
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'name'}, 
                                  {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.subject',
                                    CONTENT_FIELD_STICKY: 'true', 
                                    CONTENT_FIELD_EXTRA_HASH: '"content-modal"',
                                    CONTENT_FIELD_EXTRA_END: 'data-bs-toggle="modal"',
                                    CONTENT_FIELD_EXTRA_ONCLICK: '"setModalContent(`" + encodeURIComponent(item.subject) + "`,`" + encodeURIComponent(item.content) + "`,`" + item.read_state + "`,`" + item.id + "`)"'},
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'content', 
                                    CONTENT_FIELD_EXTRA: 'item.content_str'}, 
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'email'},
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'ip_address'}, 
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'language'},
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'status', 
                                    CONTENT_FIELD_EXTRA: 'item.status_str'}, 
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'sent_at',
                                    CONTENT_FIELD_EXTRA: 'item.sent_at_str'}, ),
        FIELDS_TABLE_HEADER:    new Array('',
                                  '<i class="bi bi-eye"></i>', 
                                  '<?=lang('App.message_label_sender')?>', 
                                  '<?=lang('App.message_label_name')?>', 
                                  '<?=lang('App.message_label_subject')?>',                                     
                                  '<?=lang('App.message_label_content')?>', 
                                  '<?=lang('App.message_label_email')?>',
                                  '<?=lang('App.message_label_ip')?>', 
                                  '<?=lang('App.message_label_ulc')?>', 
                                  '<?=lang('App.message_label_status')?>', 
                                  '<?=lang('App.message_label_sent_at')?>'),
        FIELDS_TABLE_ORDERBYS:  new Array('',
                                  '<?=implode(",", MessageModel::HEADER_READSTATE_ORDERBYS)?>',
                                  '<?=implode(",", MessageModel::HEADER_SENDER_ORDERBYS)?>',
                                  '<?=implode(",", MessageModel::HEADER_NAME_ORDERBYS)?>',
                                  '<?=implode(",", MessageModel::HEADER_SUBJECT_ORDERBYS)?>',                                       
                                  '<?=implode(",", MessageModel::HEADER_CONTENT_ORDERBYS)?>',
                                  '<?=implode(",", MessageModel::HEADER_EMAIL_ORDERBYS)?>',
                                  '<?=implode(",", MessageModel::HEADER_IPADDRESS_ORDERBYS)?>',
                                  '<?=implode(",", MessageModel::HEADER_ULC_ORDERBYS)?>',
                                  '<?=implode(",", MessageModel::HEADER_STATUS_ORDERBYS)?>',
                                  '<?=implode(",", MessageModel::HEADER_SENTAT_ORDERBYS)?>'),
        RADIO_SHOW_BUTTON_IDS: new Array('btn-modify', 'btn-delete'),
        noMove: true,                                      
      };
      initTable(option);
    }

    function setModalContent(title, content, readState, id) {
      document.querySelector('#content-modal-header').innerHTML = decodeURIComponent(title);
      document.querySelector('#content-modal-body').innerHTML = decodeURIComponent(content);
      if (readState != '1') {
        markAsRead(id);
      }
    }

    function markAsRead(id) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        try {
          if (this.readyState == 4) {
            if (this.status == 200) {
              loadTable(parseAjaxResponse(this.responseText));
              callbackFunc(false);
            } else {
              // TODO
            }
            loading(false);
          }
        } catch(e) {
          loading(false);
        }
      };
      xmlhttp.open("GET", "/" + "<?=$url?>" + 
        "/id=" + id +
        "/p=" + _currentSort.currentPage + 
        "/orderby=" + _currentSort.orderBys.toString() +
        "/sortorder=" + _currentSort.sortOrders.toString() +
        "/conditions=" + getConditions(), true);
      xmlhttp.send();
    }
  </script>

<?php include $path . 'templates/footer.php';?>