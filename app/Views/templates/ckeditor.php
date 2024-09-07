<div>
    <label for="content" class="form-label"><?=lang('App.translation_label_content')?></label>
    <div class="document-editor">
    <div class="document-editor__toolbar"></div>
    <div class="document-editor__editable-container">
        <div class="document-editor__editable"></div>
    </div>
    </div>
    <textarea class="hidden" name='content' id='content' value="<?= set_value('content') ?>"></textarea>
</div>
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "/assets/js/ckeditor5-43.1.0/ckeditor5.js",
            "ckeditor5/": "/assets/js/ckeditor5-43.1.0/"
        }
    }
</script>
<script type="module" src="/assets/js/ckeditor5-43.1.0/ckeditor5-module.js"></script> 
<script type="text/javascript">
    function onsubmitContent() {
        document.querySelector('#content').value = window.editor.getData();
    }
        
    function extraCallback(isLoadData) {
      let content = isLoadData ? document.querySelector('#content').value : '';
      window.editor.setData(content);
    }
</script>
<link rel="stylesheet" href="/assets/js/ckeditor5-43.1.0/ckeditor5.css"> 