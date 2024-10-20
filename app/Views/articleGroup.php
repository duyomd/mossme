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
            <span><a href="/article/<?= $entry->translationsParents[0]->entry_id ?>">
            <?= $entry->translationsParents[0]->title ?></a></span></h1>
          <?php if ($count > 2) : ?>
            <ul class="content-list content-list-parents pt-3 ps-2 ps-lg-4">
              <?php for ($i = 1; $i < $count - 1; $i++) : ?>
                <?php $parent = $entry->translationsParents[$i];
                  echo '<li><h2><a href="/article/' . $parent->entry_id . '" title="' . $parent->title . '">|';
                  for ($j = 0; $j < $i; $j++) echo '_';
                  echo '<span>' . $parent->enum_title . '</span></a></h2></li>';
                ?>
              <?php endfor ?>
            </ul>
          <?php endif ?>
          
          <h2 class="article-name">
            <?php if ($count > 1) echo $entry->displayEnumTitle . lang('App.article_group_2'); else echo '&nbsp;'; ?>
          </h2>
          
          <div class="btns">
            <a href="/article/<?=$entry->previous_id?>" class="btn-scroll animated fadeInUp scrollto
              <?php if(!isset($entry->previous_id)) echo ' disabled'; ?>">
              <i class="bi bi-chevron-double-<?= Utilities::isRightToLeft() ? 'right' : 'left' ?>"></i>
            </a>

            <a id="btn-bilingual" class="btn-scroll animated fadeInUp scrollto ms-btns-navi inactive"
              href="javascript:void(0)" role="button" onclick="bilingual(this)">
              <i id="icon-bilingual" class="bi bi-book-half"></i></a>
              
            <a href="/article/<?=$entry->next_id?>" class="btn-scroll animated fadeInUp scrollto ms-btns-navi
              <?php if(!isset($entry->next_id)) echo ' disabled'; ?>">
              <i class="bi bi-chevron-double-<?= Utilities::isRightToLeft() ? 'left' : 'right' ?>"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="<?php $video = $entry->video_url; echo (!Utilities::isNullOrBlank($video) ? $video : '#article'); ?>" 
            class="<?= !Utilities::isNullOrBlank($video) ? 'glightbox ' : '' ?>play-btn"></a> 
        </div>

      </div>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= Article Section ======= -->
    <section id="article" class="article" style="--bg-article: url(<?=$entry->image_url_content?>);">
      <div class="container" data-aos="fade-up">
      
        <?php $p = 0; ?>
        <script type="text/javascript">
          var js_trans = new Array(<?=count($entry->entryChildren)?>);
        </script>

        <?php foreach ($entry->entryChildren as $child) :?>

          <!-- Row start -->
          <div class="row <?= $p > 0 ? 'mt-5' : ''?>">

            <?php if(!Utilities::isNullOrBlank($child->chapter_title)) :?>
              <div class="section-title text-center"><p class="chapter"><?=$child->chapter_title?></p></div>
            <?php endif ?>

            <!-- COL1 start -->
            <div id="col-main" class="">
              
                <div class="section-title">
                  <p id="title-main" class="text-center"><?=$child->displayTitle?></p>
                </div>

                <div class="section-title">
                  <h2><?=lang('App.article_translation', [$child->translationCount])?></h2>

                  <div id="dd-article" class="dropdown pt-2" lang="auto">

                    <button class="btn dropdown-toggle text-truncate" type="button" id="dropdown-main" 
                      data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">
                      <span></span>
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdown-main">
                      <?php $i = 0; $count = count($child->translations); ?>
                      <script type="text/javascript">
                        js_trans[<?=$p?>] = new Array(<?=$count?>);
                      </script>
                      <?php foreach ($child->translations as $tran) :?>
                        <?php if ($tran->pseudo) : ?>
                          <?php if ($i > 0) :?>
                            <?php if ($i < $count - 1) :?>
                              <li><hr class="dropdown-divider"></li>
                            <?php else : ?>
                              <li>
                                <a class="dropdown-item text-truncate ref" href="<?=htmlspecialchars($tran->notation)?>" 
                                    target="_blank" rel="noreferrer noopener">
                                    <?=$tran->author?>
                                  <i class="bi bi-box-arrow-up-right float-end"></i>
                                </a>
                              </li>
                            <?php endif ?>    
                          <?php endif ?>
                          <?php if ($i < $count - 1) :?>
                            <li><h6 class="dropdown-header"> <?=$tran->author?></h6></li>
                          <?php endif ?>
                        <?php else : ?>
                          <?php 
                            $item = (object)['id'       =>  $tran->id,
                                             'title'    =>  $tran->enum_title,
                                             'author'   =>  $tran->author,
                                             'lang'     =>  $tran->language_code];  
                          ?>
                          <script type="text/javascript">
                            js_trans[<?=$p?>][<?=$i?>] = <?=json_encode($item)?>;
                          </script>
                          <li><a class="dropdown-item text-truncate link-main-<?=$p?>
                                <?php if ($tran->default) echo ' active'; ?>" 
                                href="javascript:void(0)" role="button"
                                onclick="reloadContent(1, js_trans[<?=$p?>][<?=$i?>], <?=$p?>);
                                          selectDropdownItem(1, this, <?=$p?>);">
                            <?=$tran->author?></a>
                          </li>
                        <?php endif ?>
                        <?php $i++; ?>
                      <?php endforeach ?>  
                    </ul>

                  </div>
                  
                </div>

                <div class="row">
                  <div id="content-main" class="content ck-content"></div>
                </div>              

            </div> 
            <!-- COL1 end -->

            <!-- COL2 start -->
            <div id="col-sub" class="hidden">
              
              <div class="section-title">
                <p id="title-sub" class="text-center"><?=$child->displayTitle?></p>
              </div>

              <div class="section-title">
                <h2><?=lang('App.article_translation', [$child->translationCount])?></h2>

                <div id="dd-article" class="dropdown pt-2" lang="auto">

                  <button class="btn dropdown-toggle text-truncate" type="button" id="dropdown-sub" 
                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">
                    <span></span>
                  </button>

                  <ul class="dropdown-menu" aria-labelledby="dropdown-sub">
                    <?php $i = 0; $count = count($child->translations); ?>
                    <?php foreach ($child->translations as $tran) :?>
                      <?php if ($tran->pseudo) : ?>
                        <?php if ($i > 0) :?>
                          <?php if ($i < $count - 1) :?>
                            <li><hr class="dropdown-divider"></li>
                          <?php else : ?>
                            <li>
                              <a class="dropdown-item text-truncate ref" href="<?=htmlspecialchars($tran->notation)?>" 
                                  target="_blank" rel="noreferrer noopener">
                                  <?=$tran->author?>
                                <i class="bi bi-box-arrow-up-right float-end"></i>
                              </a>
                            </li>
                          <?php endif ?>
                        <?php endif ?>
                        <?php if ($i < $count - 1) :?>
                          <li><h6 class="dropdown-header"> <?=$tran->author?></h6></li>
                        <?php endif ?>
                      <?php else : ?>
                        <li><a class="dropdown-item text-truncate link-sub-<?=$p?>
                              <?php if ($tran->default) echo ' active'; ?>" 
                              href="javascript:void(0)" role="button"
                              onclick="reloadContent(2, js_trans[<?=$p?>][<?=$i?>], <?=$p?>);
                                        selectDropdownItem(2, this, <?=$p?>);">
                          <?=$tran->author?></a>
                        </li>
                      <?php endif ?>
                      <?php $i++; ?>
                    <?php endforeach ?>  
                  </ul>

                </div>

                
              </div>

              <div class="row">
                <div id="content-sub" class="content ck-content"></div>
              </div>

            </div>
            <!-- COL2 end -->
            
            <!-- Parallel articles -->
            <?php $parallelsCount = Utilities::isNullOrBlank($child->parallels) ? 0 : count(explode(",", $child->parallels));
              if ($parallelsCount > 0) :?>
              <div class="parallels row mt-5 text-center">
                <div>
                  <a role="button" href="javascript:void(0)" onclick="loadParallels('<?=$child->parallels?>', <?=$p?>)">
                    <i class="bi bi-search"></i><span class="parallels-title-<?=$p?>"><?=lang('App.article_parallels_search')?></span>
                  </a>
                </div>
                <div class="parallels-content-<?=$p?> mt-3 fst-italic d-none"></div>
              </div>
            <?php endif ?><!-- End Parallels -->

          </div> <!-- Row end -->

          <?php $p++; ?>
        <?php endforeach ?>

      </div><!-- End article container -->
    </section><!-- End Article Section -->
      
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery" style="--bg-gallery: url(<?=$entry->image_url_footer?>);">
    </section><!-- End Gallery Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php $footer_text = 
    '<div class="copyright">' .
      lang('App.article_footer1') .
    '</div>
    <div class="design font-big">' .
      lang('App.article_footer2') .
    '</div>';
  include 'templates/footer.php';?>

  <?php
    $items = [];
    foreach ($entry->entryChildren as $child) {
      $defaultTran = null;
      foreach ($child->translations as $tran) {
        if ($tran->default) {
          $defaultTran = $tran;
          break;
        }
      }
      $title = ''; $content = ''; $author = '';
      if (isset($defaultTran)) {
        $item = (object)['id'       =>  $defaultTran->id, 
                         'title'    =>  $defaultTran->enum_title,
                         'content'  =>  $defaultTran->content,
                         'author'   =>  $defaultTran->author,
                         'lang'     =>  $defaultTran->language_code,
                        ];
        array_push($items, $item);
      }
    }      
  ?>
  
  <!-- JS -->
  <script src="/assets/js/view/article.js"></script>
  <script type="text/javascript">

    const entryCount = <?=count($entry->entryChildren)?>;
    let _translations = new Array(entryCount);
    var p = 0;
    <?php foreach ($entry->entryChildren as $en) :?>
      var map = new Map();      
      <?php foreach ($en->translations as $tran) :?>
        if ('<?=$tran->id?>'.length > 0) {
          map.set('<?=$tran->id?>', '<?=esc($tran->content)?>');
        }
      <?php endforeach ?>
      _translations[p] = map;
      p++;
    <?php endforeach ?>

    let params = {
      MSG_PARALLELES_LOADING  : "<?=lang('App.article_parallels_loading')?>",
      MSG_PARALLELES_PATIENT  : "<?=lang('App.article_parallels_patient')?>",
      MSG_PARALLELES_ERROR    : "<?=lang('App.article_parallels_error')?>",
      MSG_PARALLELES_FAILED   : "<?=lang('App.article_parallels_failed')?>",
      MSG_MONO_MONOLINGUAL    : "<?=lang('App.article_msg_monolingual')?>",
      MSG_MONO_BILINGUAL      : "<?=lang('App.article_msg_bilingual')?>",

      ENTRY_COUNT             : entryCount,
      
      TRANSLATIONS_DEFAULT    : <?=json_encode($items)?>,
      TRANSLATIONS_ALL        : _translations,
    }
    articleGlobal(params);

  </script>
  
  <link rel="stylesheet" href="/assets/js/ckeditor5-43.1.0/ckeditor5.css">