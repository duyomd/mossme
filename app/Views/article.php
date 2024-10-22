<!-- End Header -->
  <?php use App\Helpers\Utilities; ?>

  <div class="ajax-loading"><div><?=lang('App.loading')?></div></div>  

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center hero-article" style="--bg-hero: url(<?=$entry->image_url_header?>);">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">

          <?php $count = count($entry->translationsParents); ?>
          <h1 class="text-lg-start <?php if ($count > 2) echo 'text-start'; else echo 'text-center'; ?>">
            <span lang="<?=$entry->translationsParents[0]->language_code?>">
              <a href="/article/<?= $entry->translationsParents[0]->entry_id ?>">
                <?= $entry->translationsParents[0]->title ?>
              </a>
            </span>
            <?php if ($count == 1) :?>
              <a class="<?= (auth()->loggedIn() && auth()->user()->inGroup('dataoperator', 'superadmin') ? '' : 'hidden') ?> ms-btns-navi"
                aria-label="<?=lang('App.aria_edit')?>"
                href='/translations/conditions={"entryId":"<?=$entry->id?>"}'>
                <i id="icon-bilingual" class="bi bi-pencil-square small" ></i>
              </a>
            <?php endif ?>
          </h1>
          <?php if ($count > 2) : ?>
            <ul class="content-list content-list-parents pt-3 ps-2 ps-lg-4">
              <?php for ($i = 1; $i < $count - 1; $i++) : ?>
                <?php $parent = $entry->translationsParents[$i];
                  echo '<li><h2><a href="/article/' . $parent->entry_id . '" title="' . $parent->title . '">|';
                  for ($j = 0; $j < $i; $j++) echo '_';
                  echo '<span lang="' . $parent->language_code . '">' . $parent->enum_title . '</span></a></h2></li>';
                ?>
              <?php endfor ?>
            </ul>
          <?php endif ?>
          
          <h2 class="article-name">
            <?php if ($count > 1) :?>
              <span lang="<?=$entry->displayLang?>"><?=$entry->displayEnumTitle?></span>
              <a class="<?= (auth()->loggedIn() && auth()->user()->inGroup('dataoperator', 'superadmin') ? '' : 'hidden') ?> ms-btns-navi"
                aria-label="<?=lang('App.aria_edit')?>"
                href='/translations/conditions={"entryId":"<?=$entry->id?>"}'>
                <i id="icon-bilingual" class="bi bi-pencil-square"></i>
              </a>
            <?php endif ?>
          </h2>
          
          <div class="btns">
            <a href="/article/<?=$entry->previous_id?>" class="btn-scroll animated fadeInUp scrollto
              <?php if(!isset($entry->previous_id)) echo ' disabled'; ?>" aria-label="<?=lang('App.aria_previous')?>">
              <i class="bi bi-chevron-double-<?= Utilities::isRightToLeft() ? 'right' : 'left' ?>"></i>
            </a>

            <?php if (!$entry->isFolder) : ?>      

              <a id="btn-commentary" href="#commentary" class="btn-scroll animated fadeInUp ms-btns-navi inactive
                <?php if(count($entry->commentaries) == 0) echo ' disabled'; ?>"
                role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="commentary" 
                aria-label="<?=lang('App.aria_commentary')?>" onclick="commentary(this)">
                <i class="bi bi-zoom-in"></i></a>

              <a id="btn-bilingual" class="btn-scroll animated fadeInUp scrollto ms-btns-navi inactive"
                href="javascript:void(0)" role="button" aria-label="<?=lang('App.aria_bilingual')?>"
                onclick="bilingual(this)">
                <i id="icon-bilingual" class="bi bi-book-half"></i></a>

            <?php endif ?>  
              
            <a href="/article/<?=$entry->next_id?>" class="btn-scroll animated fadeInUp scrollto ms-btns-navi
              <?php if(!isset($entry->next_id)) echo ' disabled'; ?>" aria-label="<?=lang('App.aria_next')?>">
              <i class="bi bi-chevron-double-<?= Utilities::isRightToLeft() ? 'left' : 'right' ?>"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="<?php $video = $entry->video_url; echo (!Utilities::isNullOrBlank($video) ? $video : '#article'); ?>" 
            class="<?= !Utilities::isNullOrBlank($video) ? 'glightbox ' : '' ?>play-btn"
            aria-label="<?=lang('App.aria_play_button')?>"></a> 
        </div>

      </div>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= Article Section ======= -->
    <!-- file type -->
    <?php if (!$entry->isFolder) : ?>     
      
      <section id="article" class="article" style="--bg-article: url(<?=$entry->image_url_content?>);">
        <div class="container" data-aos="fade-up">
        
          <div class="row">
            <script type="text/javascript">
              var js_trans = new Array(1);
            </script>
                    
            <div id="col-main" class="">

              <div class="section-title">
                <h2><?=lang('App.article_translation', [$entry->translationCount])?></h2>

                <div id="dd-article" class="dropdown pt-2">

                  <button class="btn dropdown-toggle text-truncate" type="button" id="dropdown-main" 
                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">
                    <span lang="und"></span>
                  </button>

                  <ul class="dropdown-menu" aria-labelledby="dropdown-main">
                    <?php $i = 0; $count = count($entry->translations); ?>
                    <script type="text/javascript">
                      js_trans[0] = new Array(<?=$count?>);
                    </script>
                    <?php foreach ($entry->translations as $tran) :?>
                      <?php if ($tran->pseudo) : ?>
                        <?php if ($i > 0) :?>
                          <?php if ($i < $count - 1) :?>
                            <li><hr class="dropdown-divider"></li>
                          <?php else : ?>
                            <li>
                              <a class="dropdown-item text-truncate ref" href="<?=htmlspecialchars($tran->notation)?>" 
                                  target="_blank" rel="noreferrer noopener">
                                <span lang="und"><?=$tran->author?></span>
                                <i class="bi bi-box-arrow-up-right float-end"></i>
                              </a>
                            </li>
                          <?php endif ?>    
                        <?php endif ?>
                        <?php if ($i < $count - 1) :?>
                          <li><h6 class="dropdown-header" <?=isset($tran->language_code) ? 'lang="'.$tran->language_code.'"' : ''?>>
                            <?=$tran->author?>
                          </h6></li>
                        <?php endif ?>
                      <?php else : ?>
                        <?php 
                          $item = (object)['id'     => $tran->id,
                                           'title'  => $tran->title,
                                           'author' => $tran->author,
                                           'lang'   => $tran->language_code,
                                            // 'content' =>  $tran->content,
                                          ];  
                        ?>
                        <script type="text/javascript">
                          js_trans[0][<?=$i?>] = <?=json_encode($item)?>;
                        </script>
                        <li><a class="dropdown-item text-truncate link-main-0
                              <?php if ($tran->default) echo ' active'; ?>" 
                              href="javascript:void(0)" role="button"
                              onclick="reloadContent(1, js_trans[0][<?=$i?>], 0);
                                       selectDropdownItem(1, this, 0);">
                          <span lang="und"><?=$tran->author?></span></a>
                        </li>
                      <?php endif ?>
                      <?php $i++; ?>
                    <?php endforeach ?>  
                  </ul>

                </div>

                <p id="title-main" class="mt-4 text-center"><?=$entry->displayTitle?></p>
              </div>

              <div class="row">
                <div id="content-main" class="content ck-content"></div>
              </div>

            </div> 
            <!-- COL1 end -->

            <!-- COL2 start -->
            <div id="col-sub" class="hidden">
              
              <div class="section-title">
                <h2><?=lang('App.article_translation', [$entry->translationCount])?></h2>
                
                <div id="dd-article" class="dropdown pt-2">
                  
                  <button class="btn dropdown-toggle text-truncate ref" type="button" id="dropdown-sub" 
                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">
                    <span lang="und"></span>
                  </button>

                  <ul class="dropdown-menu" aria-labelledby="dropdown-sub">
                    <?php $i = 0; $count = count($entry->translations); ?>
                    <?php foreach ($entry->translations as $tran) :?>
                      <?php if ($tran->pseudo) : ?>
                        <?php if ($i > 0) :?>
                          <?php if ($i < $count - 1) :?>
                            <li><hr class="dropdown-divider"></li>
                          <?php else : ?>
                            <li>
                              <a class="dropdown-item text-truncate ref" href="<?=htmlspecialchars($tran->notation)?>" 
                                  target="_blank" rel="noreferrer noopener">
                                <span lang="und"><?=$tran->author?></span>
                                <i class="bi bi-box-arrow-up-right float-end"></i>
                              </a>
                            </li>
                          <?php endif ?>    
                        <?php endif ?>
                        <?php if ($i < $count - 1) :?>
                          <li><h6 class="dropdown-header" <?=isset($tran->language_code) ? 'lang="'.$tran->language_code.'"' : ''?>>
                            <?=$tran->author?>
                          </h6></li>
                        <?php endif ?>
                      <?php else : ?>
                        <li><a class="dropdown-item text-truncate link-sub-0
                              <?php if ($tran->default) echo ' active'; ?>" 
                              href="javascript:void(0)" role="button"
                              onclick="reloadContent(2, js_trans[0][<?=$i?>], 0);
                                       selectDropdownItem(2, this, 0);">
                          <span lang="und"><?=$tran->author?></span></a>
                        </li>
                      <?php endif ?>
                      <?php $i++; ?>
                    <?php endforeach ?>  
                  </ul>

                </div>
                <p id="title-sub" class="mt-4 text-center"><?=$entry->displayTitle?></p>
              </div>

              <div class="row">
                <div id="content-sub" class="content ck-content"></div>
              </div>

            </div>
            <!-- COL2 end -->

          </div>

          <!-- Parallel articles -->
          <?php $parallelsCount = Utilities::isNullOrBlank($entry->parallels) ? 0 : count(explode(",", $entry->parallels));
            if ($parallelsCount > 0) :?>
            <div class="parallels row mt-5 text-center">
              <div>
                <a role="button" href="javascript:void(0)" onclick="loadParallels('<?=$entry->parallels?>', 0)">
                  <i class="bi bi-search"></i><span class="parallels-title-0"><?=lang('App.article_parallels_search')?></span>
                </a>
              </div>
              <div class="parallels-content-0 mt-3 fst-italic d-none"></div>
            </div>
          <?php endif ?><!-- End Parallels -->

        </div>
      </section><!-- End Article Section -->
      
      <section id="commentary" class="commentary collapse" style="--bg-cmt: url(<?=$entry->image_url_commentary?>);">
        <div class="container" data-aos="fade-up" >

          <div class="section-title">

            <h2><?=lang('App.article_commentary', [$entry->commentaryCount])?></h2>
            
            <div id="dd-commentary" class="dropdown pt-2">

              <button class="btn dropdown-toggle text-truncate" type="button" id="dropdown-comm" 
                data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">
                <span lang="und"></span>
              </button>

              <ul class="dropdown-menu" aria-labelledby="dropdown-comm">
                <?php $i = 0; $count = count($entry->commentaries); ?>
                <script type="text/javascript">
                  var js_comms = new Array(1);
                  js_comms[0] = new Array(<?=$count?>);
                </script>
                <?php foreach ($entry->commentaries as $comm) :?>
                  <?php if ($comm->pseudo) : ?>
                    <?php if ($i > 0) :?>
                      <?php if ($i < $count - 1) :?>
                        <li><hr class="dropdown-divider"></li>
                      <?php endif ?>    
                    <?php endif ?>
                    <?php if ($i < $count - 1) :?>
                      <li><h6 class="dropdown-header" <?=isset($comm->language_code) ? 'lang="'.$comm->language_code.'"' : ''?>>
                        <?=$comm->author?>
                      </h6></li>
                    <?php endif ?>
                  <?php else : ?>
                    <?php 
                      $item = (object)['id'     => $comm->id,
                                       'author' => $comm->author,
                                       'lang'   => $comm->language_code,
                                      //  'content' =>  $comm->content,
                                      ];  
                    ?>
                    <script type="text/javascript">
                      js_comms[0][<?=$i?>] = <?=json_encode($item)?>;
                    </script>
                    </script>
                    <li><a class="dropdown-item text-truncate link-comm-0
                          <?php if ($comm->default) echo ' active'; ?>" 
                          href="javascript:void(0)" role="button"
                          onclick="reloadContent(3, js_comms[0][<?=$i?>], 0);
                                   selectDropdownItem(3, this, 0);">
                      <span lang="und"><?=$comm->author?></span></a>
                    </li>
                  <?php endif ?>
                  <?php $i++; ?>
                <?php endforeach ?>  
              </ul>

            </div>

          </div>

          <div class="row">
            <div id="content-comm" class="content ck-content"></div>
          </div>

        </div>
      </section>

    <!-- folder type -->
    <?php else : ?>

      <section id="article" class="article" style="--bg-article: url(<?=$entry->image_url_content?>);">
        <div class="container" data-aos="fade-up">
        
          <div class="section-title">
              <h2><?=lang('App.article_content')?></h2>
              <div class="text-center">
                <p id="title-main" class="mt-4" lang="<?=$entry->displayLang?>"><?=$entry->displayEnumTitle?></p>
              </div>
          </div>
          <?php if (!Utilities::isNullOrBlank($entry->displayContent)) : ?>
            <div class="mb-4 row justify-content-center">
              <div class="ck-content" lang="<?=$entry->displayLang?>"><?=$entry->displayContent?></div>
            </div>
          <?php endif ?>
          <?php if ($entry->isFolder && count($entry->translationsChildren) > 0) : ?>
            <div class="row justify-content-center">
              <div class="col-lg-10 tree">
                  <ul class="content-list content-list-tree">

                    <?php if ($entry->translationsChildren[0]->type == Utilities::TYPE_FOLDER) : ?>
                      <li>
                        <a role="button" href="javascript:void(0)" onclick="toggleAllNodes()">
                          <i id="btn-toggle-all" class="d-inline bi bi-grid-3x3-gap-fill"></i>
                          <span class="tree-expand"><?=lang('App.article_expand_all')?></span>
                        </a>
                      </li>
                      <li><br/></li>
                    <?php endif ?>
                      
                    <?php foreach ($entry->translationsChildren as $child) : ?>
                      <?php $eId = $child->entry_id; 
                            $isFolder = $child->type == Utilities::TYPE_FOLDER; ?>
                      <li>
                        <?php if ($isFolder) : ?>
                          <a role="button" href="javascript:void(0)" aria-label="<?=lang('App.aria_toggle_node')?>">
                            <i id="<?=$eId?>-tree-i" data-bs-toggle="collapse" href="#<?=$eId?>-tree-ul" 
                              class="d-inline bi bi-plus-square-fill tree-folder-no-parent"
                              onclick="toggleNode('<?=$eId?>', false)"></i>
                          </a>
                        <?php endif ?>
                        <a href="/article/<?=$child->entry_id?>">
                          <span lang="<?=$child->language_code?>" class="<?=$isFolder ? 'tree-folder' : 'tree-leaf-no-parent'?>"><?=$child->enum_title?></span>
                        </a>
                        <?php if ($isFolder) : ?>
                          <ul id="<?=$eId?>-tree-ul" class="content-list content-list-tree collapse"></ul>
                        <?php endif ?>
                      </li>
                    <?php endforeach ?>
                    
                    <!-- Group all items' content in 1 page -->
                    <?php if ($entry->isChildrenGroupable) : ?>
                      <li><br/></li>
                      <li>
                        <a href="/article-group/<?=$entry->id?>">
                          <i class="d-inline bi bi-stack"></i>
                          <span><?=lang('App.article_group_1') . $entry->displayEnumTitle?></span>
                        </a>
                      </li>
                    <?php endif ?>

                  </ul>
              </div>
            </div>
          <?php endif ?>

        </div>
      </section>

    <?php endif ?>                

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery" style="--bg-gallery: url(<?=$entry->image_url_footer?>);">
    </section><!-- End Gallery Section -->

  </main><!-- End #main -->

  <script src="/assets/js/view/article.js"></script>
  <!-- JS -->
  <?php if (!$entry->isFolder) : ?>

    <?php
      $trans = [];
      $comms = [];

      // translations
      $defaultTran = null;
      foreach ($entry->translations as $tran) {
        if ($tran->default) {
          $defaultTran = $tran;
          break;
        }
      }
      $id = ''; $title = ''; $content = ''; $author = ''; $lang = 'und';
      if (isset($defaultTran)) {
        $id = $defaultTran->id;
        $title = $defaultTran->title;
        // $title = $defaultTran->enumTitle;
        $author = $defaultTran->author;
        $content = $defaultTran->content;
        $lang = $defaultTran->language_code;
      }

      // commentaries
      $defaultComm = null;
      foreach ($entry->commentaries as $comm) {
        if ($comm->default) {
          $defaultComm = $comm;
          break;
        }
      }
      $id_comm = ''; $content_comm = ''; $author_comm = ''; $lang_comm = 'und';
      
      if (isset($defaultComm)) {
        $id_comm = $defaultComm->id;          
        $author_comm = $defaultComm->author; 
        $content_comm = $defaultComm->content;
        $lang_comm = $defaultTran->language_code;
      }

      $item_tran = (object)['id'      =>  $id,
                            'title'   =>  $title,                              
                            'author'  =>  $author,
                            'content' =>  $content,
                            'lang'    =>  $lang,
                          ];
      $item_comm = (object)['id'      =>  $id_comm,
                            'author'  =>  $author_comm,
                            'content' =>  $content_comm,
                            'lang'    =>  $lang_comm,
                          ];

      array_push($trans, $item_tran);
      array_push($comms, $item_comm);
    ?>
    
    <script type="text/javascript">

      var _translations = new Array(1);
      _translations[0] = new Map();      
      <?php foreach ($entry->translations as $tran) :?>
        if ('<?=$tran->id?>'.length > 0) {
          _translations[0].set('<?=$tran->id?>', {content  : '<?=esc($tran->content)?>', 
                                                  lang     : '<?=$tran->language_code?>'});
        }
      <?php endforeach ?>
      var _commentaries = new Array(1);
      _commentaries[0] = new Map();
      <?php foreach ($entry->commentaries as $comm) :?>
        if ('<?=$comm->id?>'.length > 0) {
          _commentaries[0].set('<?=$comm->id?>', '<?=esc($comm->content)?>');
        }
      <?php endforeach ?>
      let params = {
        MSG_PARALLELES_LOADING  : "<?=lang('App.article_parallels_loading')?>",
        MSG_PARALLELES_PATIENT  : "<?=lang('App.article_parallels_patient')?>",
        MSG_PARALLELES_ERROR    : "<?=lang('App.article_parallels_error')?>",
        MSG_PARALLELES_FAILED   : "<?=lang('App.article_parallels_failed')?>",
        MSG_MONO_MONOLINGUAL    : "<?=lang('App.article_msg_monolingual')?>",
        MSG_MONO_BILINGUAL      : "<?=lang('App.article_msg_bilingual')?>",
        MSG_COMMENTARY_HIDDEN   : "<?=lang('App.article_msg_comm_hidden')?>",
        MSG_COMMENTARY_DISPLAY  : "<?=lang('App.article_msg_comm_shown')?>",

        ENTRY_COUNT             : 1,
        ANCHOR                  : "<?=$anchor?>",

        TRANSLATIONS_DEFAULT    : <?=json_encode($trans)?>,
        COMMENTARIES_DEFAULT    : <?=json_encode($comms)?>,
        TRANSLATIONS_ALL        : _translations,
        COMMENTARIES_ALL        : _commentaries,
      }
      articleGlobal(params);

    </script>

  <?php else : ?>
    <script type="text/javascript">
      let params = {
        MSG_EXPAND_ALL          : "<?=lang('App.article_expand_all')?>",
        MSG_COLLAPSE_ALL        : "<?=lang('App.article_collapse_all')?>",
        MSG_TOGGLE_NODE         : "<?=lang('App.aria_toggle_node')?>",
      }
      articleGlobal(params);
    </script>
  <?php endif ?>

  <link rel="stylesheet" href="/assets/js/ckeditor5-43.1.0/ckeditor5.css">

  <!-- ======= Footer ======= -->
  <?php $footer_text = 
    '<div class="copyright">' .
      lang('App.article_footer1') .
    '</div>
    <div class="design font-big">' .
      lang('App.article_footer2') .
    '</div>';
  include 'templates/footer.php';?>