<?php $path = dirname(dirname(__FILE__)) . '/'; ?>  
<?php include $path . 'templates/header.php';?>
<!-- End Header -->

  <?php 
    use App\Helpers\Utilities;
    use App\Models\EntryModel;
  ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hidden"></section><!-- End Hero -->
  <!-- End Hero -->

  <main id="main">

    <div class="ajax-loading"><div><?=lang('App.loading')?></div></div>  

    <!-- ======= Image Modal ======= -->
    <?php include $path . 'templates/imageModal.php';?>
    
    <section class="data-input">
      <div class="container d-md-flex justify-content-center" data-aos="fade-up">
        <div class="row col-lg-12 table-container">

          <div id="input-form-container" class="mt-lg-0">
            <form action="/entries" method="post" class="ajax-form" 
                data-aos="fade-up" data-aos-delay="100">

              <div>
                <div class="error-message mb-3"></div>
                <div class="success-message mb-3"></div>
              </div>

              <div class="row">

                <div class="col-md-2 mt-3 mt-md-0">
                  <label for="type" class="form-label"><?=lang('App.entry_label_type')?></label>
                  <select class="form-select" name="type" id="type">
                    <option value="0"><?=lang('App.entry_label_type_folder')?></option>
                    <option value="1"><?=lang('App.entry_label_type_article')?></option>
                  </select>
                </div>

                <div class="col-md-2 mt-3 mt-md-0">
                  <label for="section_id" class="form-label"><?=lang('App.entry_label_section')?></label>
                  <select class="form-select" name="section_id" id="section_id">
                    <?php foreach ($sections as $section) :?>
                      <option value="<?= $section->id ?>"><?= $section->section_name ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="col-md-2 mt-3 mt-md-0">
                  <label for="root_id" class="form-label"><?=lang('App.entry_label_root')?></label>
                  <select class="form-select" name="root_id" id="root_id">
                    <option value=""></option>
                    <?php foreach ($roots as $root) :?>
                      <option value="<?= $root->id ?>"><?= $root->id ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="col-md-2 form-group mt-3 mt-md-0">
                  <label for="parent_id" class="form-label"><?=lang('App.entry_label_parent')?></label>
                  <input type="text" class="form-control" name="parent_id" id="parent_id"
                    value="<?= set_value('parent_id') ?>">
                </div>

                <div class="col-md-2 form-group">
                  <label for="id" class="form-label"><?=lang('App.entry_label_id')?></label>
                  <input type="text" class="form-control" name="id" id="id"
                    value="<?= set_value('id') ?>">
                </div>

                <div class="col-md-2 form-group mt-3 mt-md-0">
                  <label for="serials" class="form-label"><?=lang('App.entry_label_serials')?></label>
                  <input type="text" class="form-control" name="serials" id="serials"
                    value="<?= set_value('serials') ?>">
                </div>
                
              </div>

              <div class="row mt-3">                

                <div class="col-md-2 form-group mt-3 mt-md-0">
                  <label for="tags" class="form-label"><?=lang('App.entry_label_tags')?></label>
                  <input type="text" class="form-control" name="tags" id="tags"
                    value="<?= set_value('tags') ?>">
                </div>

                <div class="col-md-2 form-group mt-3 mt-md-0">
                  <label for="video_url" class="form-label"><?=lang('App.entry_label_video_url')?></label>
                  <input type="text" class="form-control" name="video_url" id="video_url"
                    value="<?= set_value('video_url') ?>">
                </div>
                
                <div class="col-md-2 form-group mt-3 mt-md-0">
                  <label for="reference_source" class="form-label"><?=lang('App.entry_label_reference_source')?></label>
                  <input type="text" class="form-control" name="reference_source" id="reference_source"
                    value="<?= set_value('reference_source') ?>">
                </div>

                <div class="col-md-2 form-group mt-3 mt-md-0">
                  <label for="reference_url" class="form-label"><?=lang('App.entry_label_reference_url')?></label>
                  <input type="text" class="form-control" name="reference_url" id="reference_url"
                    value="<?= set_value('reference_url') ?>">
                </div>

                <div class="col-md-2 form-group mt-3 mt-md-0">
                  <label for="sequence" class="form-label"><?=lang('App.label_sequence')?></label>
                  <input type="text" class="form-control" name="sequence" id="sequence"
                    value="<?= set_value('sequence') ?>">
                </div>

                <div class="col-md-2 form-group mt-3 mt-md-0">
                  <label for="enumeration" class="form-label"><?=lang('App.entry_label_enumeration')?></label>
                  <input type="text" class="form-control" name="enumeration" id="enumeration"
                    value="<?= set_value('enumeration') ?>">
                </div>

              </div>

              <div class="row  mt-3">

              <div class="col-md-2 mt-3 mt-md-0">
                  <label for="image_id_header" class="form-label"><?=lang('App.entry_label_image_header')?></label>
                  <select class="form-select" name="image_id_header" id="image_id_header">
                    <option value=""></option>
                    <?php foreach ($images as $image) :?>
                      <option value="<?= $image->id ?>"><?= $image->image_name ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="col-md-2 mt-3 mt-md-0">
                  <label for="image_id_content" class="form-label"><?=lang('App.entry_label_image_content')?></label>
                  <select class="form-select" name="image_id_content" id="image_id_content">
                    <option value=""></option>
                    <?php foreach ($images as $image) :?>
                      <option value="<?= $image->id ?>"><?= $image->image_name ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="col-md-2 mt-3 mt-md-0">
                  <label for="image_id_commentary" class="form-label"><?=lang('App.entry_label_image_commentary')?></label>
                  <select class="form-select" name="image_id_commentary" id="image_id_commentary">
                    <option value=""></option>
                    <?php foreach ($images as $image) :?>
                      <option value="<?= $image->id ?>"><?= $image->image_name ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="col-md-2 mt-3 mt-md-0">
                  <label for="image_id_footer" class="form-label"><?=lang('App.entry_label_image_footer')?></label>
                  <select class="form-select" name="image_id_footer" id="image_id_footer">
                    <option value=""></option>
                    <?php foreach ($images as $image) :?>
                      <option value="<?= $image->id ?>"><?= $image->image_name ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="col-md-2 mt-3 mt-md-0">
                  <label for="children_groupable" class="form-label"><?=lang('App.entry_label_children_grouping')?></label>
                  <select class="form-select" name="children_groupable" id="children_groupable">
                    <option value="0"><?=lang('App.entry_label_cg_ungroupable')?></option>
                    <option value="1"><?=lang('App.entry_label_cg_groupable')?></option>
                  </select>
                </div>

                <div class="col-md-2 mt-3 mt-md-0">
                  <label for="status" class="form-label"><?=lang('App.entry_label_status')?></label>
                  <select class="form-select" name="status" id="status">
                    <option value="1"><?=lang('App.users_active')?></option>
                    <option value="0"><?=lang('App.users_inactive')?></option>                    
                  </select>
                </div>

              </div>

              <input type="hidden" id="parentId" name="parentId" value="<?=$parentId?>">
              <?php include $path . 'templates/hiddenFormList.php';?>
              
              <div class="row mt-3">
                <div class="col-md-6 d-none d-md-block text-md-start">
                  <?php if (!Utilities::isNullOrBlank($parentId)) : ?>
                    <a href='/entries/conditions={"parentId":"<?=$previousParentId?>"}' 
                      class="me-2 d-inline-block text-center <?php if(!isset($previousParentId)) echo ' disabled'; ?>" type="button">
                      <i class="bi bi-chevron-double-<?= Utilities::isRightToLeft() ? 'right' : 'left' ?>"></i>
                    </a>
                    <a href='/entries/conditions={"parentId":"<?=$nextParentId?>"}'
                      class="d-inline-block text-center <?php if(!isset($nextParentId)) echo ' disabled'; ?>" type="button">
                      <i class="bi bi-chevron-double-<?= Utilities::isRightToLeft() ? 'left' : 'right' ?>"></i>
                    </a>
                  <?php endif ?>
                </div>
                <div class="col-md-6 text-center text-md-end">
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
              </div>

            </form>
          </div>

          <div id="title" class="section-title mt-5">
            <h2>
              <?php if(isset($parentId)) : ?>
                <a href="javascript:void(0)" onclick="upOneLevel(`'<?=$grandParentId?>'`)" class="return">
                  <?=lang('App.back')?> <?=lang('App.to_left')?>
                </a></h2>
              <?php else : ?>
                <?=lang('App.list')?>
              <?php endif ?>
          </div>

          <div class="table-responsive"></div>

        </div>

      </div>
    </section>
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->  
  <?php $url = 'entries'; include $path . 'templates/table.php';?>

  <!-- JS -->
  <script src="/assets/js/view/entryManager.min.js"></script>
  <script type="text/javascript">
    initEntryManager({
      MSG_TRANSLATIONS          : '"<?=lang("App.entry_label_translations")?>"',
      MSG_COMMENTARIES          : '"<?=lang("App.entry_label_commentaries")?>"',
      MSG_VIEW                  : '"<?=lang("App.entry_label_view")?>"',
      
      MSG_SECTION               : '<?=lang('App.entry_label_section')?>',
      MSG_ROOT                  : '<?=lang('App.entry_label_root')?>',
      MSG_PARENT                : '<?=lang('App.entry_label_parent')?>',
      MSG_ID                    : '<?=lang('App.entry_label_id')?>', 
      MSG_SERIALS               : '<?=lang('App.entry_label_serials')?>',
      MSG_ENUMERATION           : '<?=lang('App.entry_label_enumeration')?>',
      MSG_CHILDREN_GROUPABLE    : '<?=lang('App.entry_label_children_grouping')?>',
      MSG_IMAGE_HEADER          : '<?=lang('App.entry_label_image_header')?>',
      MSG_IMAGE_CONTENT         : '<?=lang('App.entry_label_image_content')?>',
      MSG_IMAGE_COMMENTARY      : '<?=lang('App.entry_label_image_commentary')?>',
      MSG_IMAGE_FOOTER          : '<?=lang('App.entry_label_image_footer')?>',
      MSG_STATUS                : '<?=lang('App.entry_label_status')?>', 
      MSG_TAGS                  : '<?=lang('App.entry_label_tags')?>',
      MSG_VIDEO_URL             : '<?=lang('App.entry_label_video_url')?>',
      MSG_REF_SOURCE            : '<?=lang('App.entry_label_reference_source')?>',
      MSG_REF_URL               : '<?=lang('App.entry_label_reference_url')?>',
      MSG_CREATED_BY            : '<?=lang('App.entry_label_created_by')?>',
      MSG_SEQUENCE              : '<?=lang('App.entry_label_sequence')?>',

      ORDER_SECTION             : '<?=implode(",", EntryModel::HEADER_SECTION_ORDERBYS)?>',
      ORDER_ROOT                : '<?=implode(",", EntryModel::HEADER_ROOT_ORDERBYS)?>',
      ORDER_PARENT              : '<?=implode(",", EntryModel::HEADER_PARENT_ORDERBYS)?>',
      ORDER_ID                  : '<?=implode(",", EntryModel::HEADER_ID_ORDERBYS)?>',     
      ORDER_SERIALS             : '<?=implode(",", EntryModel::HEADER_SERIALS_ORDERBYS)?>',
      ORDER_ENUMERATION         : '<?=implode(",", EntryModel::HEADER_ENUMERATION_ORDERBYS)?>',
      ORDER_CHILDREN_GROUPABLE  : '<?=implode(",", EntryModel::HEADER_CHILDREN_GROUPABLE_ORDERBYS)?>',
      ORDER_IMAGE_HEADER        : '<?=implode(",", EntryModel::HEADER_IMAGE_HEADER_ORDERBYS)?>',
      ORDER_IMAGE_CONTENT       : '<?=implode(",", EntryModel::HEADER_IMAGE_CONTENT_ORDERBYS)?>',
      ORDER_IMAGE_COMMENTARY    : '<?=implode(",", EntryModel::HEADER_IMAGE_COMMENTARY_ORDERBYS)?>',
      ORDER_IMAGE_FOOTER        : '<?=implode(",", EntryModel::HEADER_IMAGE_FOOTER_ORDERBYS)?>',
      ORDER_STATUS              : '<?=implode(",", EntryModel::HEADER_STATUS_ORDERBYS)?>',  
      ORDER_TAGS                : '<?=implode(",", EntryModel::HEADER_TAGS_ORDERBYS)?>',
      ORDER_VIDEO_URL           : '<?=implode(",", EntryModel::HEADER_VIDEO_URL_ORDERBYS)?>',
      ORDER_REF_SOURCE          : '<?=implode(",", EntryModel::HEADER_REFERENCE_SOURCE_ORDERBYS)?>',
      ORDER_REF_URL             : '<?=implode(",", EntryModel::HEADER_REFERENCE_URL_ORDERBYS)?>',
      ORDER_CREATED_BY          : '<?=implode(",", EntryModel::HEADER_CREATED_BY_ORDERBYS)?>',
      ORDER_SEQUENCE            : '<?= isset($parentId) ? implode(",", EntryModel::HEADER_SEQUENCE_ORDERBYS) 
                                                        : implode(",", EntryModel::HEADER_SEQUENCE_MIXED_ORDERBYS) ?>',

      rootId                    : "<?=$rootId?>",
      parentId                  : "<?=$parentId?>",
    });
  </script>
  

<?php include $path . 'templates/footer.php';?>