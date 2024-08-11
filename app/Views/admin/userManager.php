<?php $path = dirname(dirname(__FILE__)) . '/'; ?>  
<?php include $path . 'templates/header.php';?>
<!-- End Header -->

  <?php 
    use App\Helpers\Utilities;
    use App\Models\UserModel;
  ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hidden"></section><!-- End Hero -->
  <!-- End Hero -->

  <main id="main">

    <div class="ajax-loading"><div><?=lang('App.loading')?></div></div>  
    
    <section class="data-input">
      <div class="container d-md-flex justify-content-center" data-aos="fade-up">
        <div class="row col-lg-12 table-container">
          <div class="row mx-0">
            <button class="btn btn-collapser" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-form" 
              aria-expanded="true" aria-controls="collapseForm">
              <?= lang('App.toggle_form') ?>
            </button>
          </div>

          <div class="collapse show mt-3" id="collapse-form">
            <div id="input-form-container" class="mt-lg-0">
              <form action="/users" method="post" role="form" class="ajax-form" data-aos="fade-up" data-aos-delay="100">

                <div>
                  <div class="error-message mb-3"></div>
                  <div class="success-message mb-3"></div>
                </div>

                <div class="row">
                  <div class="col-lg-2 col-md-3 form-group">
                    <label for="username" class="form-label"><?=lang('App.users_label_username')?></label>
                    <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>" disabled>
                  </div>

                  <div class="col-lg-2 col-md-3 form-group mt-3 mt-md-0">
                    <label for="email" class="form-label"><?=lang('App.users_label_email')?></label>
                    <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>" disabled>
                  </div>

                  <div class="col-lg-2 col-md-3 mt-3 mt-md-0">
                    <label for="active" class="form-label"><?=lang('App.users_label_active_status')?></label>
                    <select class="form-select" name="active" id="active">
                      <option value="Inactive"><?=lang('App.users_inactive')?></option>
                      <option value="Active"><?=lang('App.users_active')?></option>
                     </select>
                  </div>

                  <div class="col-lg-2 col-md-3 mt-4 mt-md-0">
                    <label for="status" class="form-label"><?=lang('App.users_label_ban_status')?></label>
                    <select class="form-select fs-6" name="status" id="status">
                      <option value="0"><?=lang('App.users_normal')?></option>
                      <option value="Banned"><?=lang('App.users_banned')?></option>
                    </select>
                  </div>

                  <div class="col-lg-4 col-md-12 mt-3 mt-md-0 hidden" id="ban_msg_container">
                    <label for="status_message" class="form-label"><?=lang('App.users_label_ban_message')?></label>
                    <input type="text" class="form-control" name="status_message" id="status_message" value="<?= set_value('status_message') ?>">
                  </div>
                </div>
      
                <div class="row mt-4">
                  <div class="col-md-4 mt-3 mt-md-0">
                    <div class="row">
                      <div class="col-6 ">
                        <label for="superadmin" class="form-label"><?=lang('App.users_group_superadmin')?></label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="superadmin" name="superadmin"
                            <?= !auth()->user()->can('users.manage-admins') ? ' disabled' : '' ?>>
                        </div>   
                      </div>
                      <div class="col-6">
                        <label for="admin" class="form-label"><?=lang('App.users_group_admin')?></label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="admin" name="admin"
                            <?= !auth()->user()->can('users.manage-admins') ? ' disabled' : '' ?>>
                        </div>   
                      </div>
                    </div>                    
                  </div>
                  <div class="col-md-4 mt-4 mt-md-0">
                    <div class="row">
                      <div class="col-6">
                        <label for="developer" class="form-label"><?=lang('App.users_group_developer')?></label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="developer" name="developer">
                        </div>   
                      </div>
                      <div class="col-6">
                        <label for="dataoperator" class="form-label"><?=lang('App.users_group_dataoperator')?></label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="dataoperator" name="dataoperator">
                        </div>   
                      </div>
                    </div>                    
                  </div>
                  <div class="col-md-4 mt-4 mt-md-0">
                    <div class="row">
                      <div class="col-6">
                        <label for="beta" class="form-label"><?=lang('App.users_group_beta')?></label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="beta" name="beta">
                        </div>   
                      </div>
                      <div class="col-6">
                        <label for="user" class="form-label"><?=lang('App.users_group_user')?></label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="user" name="user">
                        </div>   
                      </div>
                    </div>                    
                  </div>
                  <input type="hidden" id="groups" name="groups">
                </div>

                <?php include $path . 'templates/hiddenFormList.php';?>
                
                <div class="mt-5 text-center text-md-end">
                  <button id="btn-delete" data-bs-target="#confirm-modal" data-bs-toggle="modal"
                    type="button" class="me-2 hidden">
                    <?=lang('App.btn_delete')?>
                  </button>
                  <button id="btn-modify" type="submit" class="hidden" onclick="setMode('modify');">
                    <?=lang('App.btn_modify')?>
                  </button>
                  <button id="hdn-delete" type="submit" class="hidden" onclick="setMode('delete')"></button>
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
  <?php $url = 'users'; include $path. 'templates/table.php';?>

  <!-- JS -->
  <script type="text/javascript">
    window.onload = function() {
      addEventBanMessage();

      var option = {
        FIELDS_FETCH:           new Array('id', 'username', 'email', 'active', 'status', 'status_message', 'groups', 'last_login', 'created_at'),
        FIELDS_TABLE:           new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'}, 
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'username',
                                    CONTENT_FIELD_STICKY: 'true', },
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'email'},
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'active'},
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'status'},
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'status_message'},
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'groups'},
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'last_login'},
                                  {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'created_at'}, ),
        FIELDS_TABLE_HEADER:    new Array('',
                                  '<?=lang('App.users_label_username')?>',
                                  '<?=lang('App.users_label_email')?>',
                                  '<?=lang('App.users_label_active_status')?>',
                                  '<?=lang('App.users_label_ban_status')?>',
                                  '<?=lang('App.users_label_ban_message')?>',
                                  '<?=lang('App.users_label_groups')?>',
                                  '<?=lang('App.users_label_last_login')?>',
                                  '<?=lang('App.users_label_created_at')?>',),
        FIELDS_TABLE_ORDERBYS:  new Array('',
                                  '<?=implode(",", UserModel::HEADER_USERNAME_ORDERBYS)?>',
                                  '<?=implode(",", UserModel::HEADER_EMAIL_ORDERBYS)?>',
                                  '<?=implode(",", UserModel::HEADER_ACTIVE_ORDERBYS)?>',
                                  '<?=implode(",", UserModel::HEADER_STATUS_ORDERBYS)?>',
                                  '<?=implode(",", UserModel::HEADER_STATUSMESSAGE_ORDERBYS)?>',
                                  '<?=implode(",", UserModel::HEADER_GROUPS_ORDERBYS)?>',
                                  '<?=implode(",", UserModel::HEADER_LASTLOGIN_ORDERBYS)?>',
                                  '<?=implode(",", UserModel::HEADER_CREATEDAT_ORDERBYS)?>',),
        RADIO_SHOW_BUTTON_IDS:  new Array('btn-modify', 'btn-delete'),
        noMove:                 true,                                      
      };
      initTable(option);
    }

    function toggleBanMsg() { 
      if (document.getElementById('status').value == '0') {
        document.getElementById('ban_msg_container').classList.add('hidden');
        document.getElementById('status_message').disabled = 'disabled';
      } else {
        document.getElementById('ban_msg_container').classList.remove('hidden');
        document.getElementById('status_message').disabled = '';
      } 
    }

    function addEventBanMessage() {
      addEvent(document.getElementById('status'), 'change', function() {
        toggleBanMsg();
      });
    }

    function triggerEventBanMessage() {
      let event = new Event('change');
      document.getElementById('status').dispatchEvent(event);
    }

    function groupsCheck() {
      let groupsEle = document.getElementById('groups');
      if (!groupsEle || !groupsEle.value || groupsEle.value.length == 0) return;

      let checkIds = new Array('superadmin', 'admin', 'developer', 'dataoperator', 'beta', 'user');
      let groups = groupsEle.value.split(',');
      for (let i = 0; i < checkIds.length; i++) {
        let checkId = checkIds[i];
        if (groups.includes(checkId)) {
          document.getElementById(checkId).checked = true;
        } else {
          document.getElementById(checkId).checked = false;
        }
      }
    }

    function extraCallback(isLoadData) {
      triggerEventBanMessage();
      if (isLoadData) {
        groupsCheck();
      }
    }
  </script>

<?php include $path . 'templates/footer.php';?>