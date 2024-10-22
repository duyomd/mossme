<!-- ======= Confirm Modal ======= -->
<div class="modal fade" id="confirm-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-confirm">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5"><?= lang('App.confirm') ?></h1>
          <button id="confirm-btn-close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-light text-dark">
          <span><?= lang('App.msg_confirm') ?></span>
        </div>
        <div class="modal-footer">          
          <button type="submit" class="btn me-2" onclick="clickBtn('#hdn-delete');clickBtn('#confirm-btn-close')">
            <?= lang('App.btn_delete') ?></button>
          <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
            <?= lang('App.bookmark_btn_close') ?></button>
        </div>
      </div>
  </div>
</div>

<script src="/assets/js/view/table.min.js"></script>
<script type="text/javascript">
  function initTable(option) {
    MSG_RPP               = "<?=lang('App.num_rows_per_page')?>";
    MSG_FORWARD_SLASH     = "<?=lang('App.forward_slash')?>";
    MSG_MOVE_UP           = "<?=lang('App.aria_move_up')?>";
    MSG_MOVE_DOWN         = "<?=lang('App.aria_move_down')?>";

    PAGINATION_RPPS       = <?=json_encode(App\Helpers\Utilities::PAGINATION_RPPS)?>;
    PAGINATION_MAX_NUM    = <?=App\Helpers\Utilities::PAGINATION_MAX_NUM?>;

    FIELDS_FETCH          = option.FIELDS_FETCH;
    FIELDS_TABLE          = option.FIELDS_TABLE;
    FIELDS_TABLE_HEADER   = option.FIELDS_TABLE_HEADER;
    FIELDS_TABLE_ORDERBYS = option.FIELDS_TABLE_ORDERBYS;
    RADIO_SHOW_BUTTON_IDS = option.RADIO_SHOW_BUTTON_IDS;

    _noMove               = option.noMove;
    _noRadio              = option.noRadio;
    _url                  = "<?=$url?>";
    
    let resJson = <?=json_encode($responseJsonList)?>;
    loadTable(parseAjaxResponse(resJson));
  }
</script>    