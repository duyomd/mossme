<!-- End Header -->

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
              <i class="bi bi-chevron-double-<?= App\Helpers\Utilities::isRightToLeft() ? 'right' : 'left' ?>"></i>
            </a>

            <a id="btn-bilingual" class="btn-scroll animated fadeInUp scrollto ms-btns-navi inactive"
              href="javascript:void(0)" role="button" onclick="bilingual(this)">
              <i id="icon-bilingual" class="bi bi-book-half"></i></a>
              
            <a href="/article/<?=$entry->next_id?>" class="btn-scroll animated fadeInUp scrollto ms-btns-navi
              <?php if(!isset($entry->next_id)) echo ' disabled'; ?>">
              <i class="bi bi-chevron-double-<?= App\Helpers\Utilities::isRightToLeft() ? 'left' : 'right' ?>"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="<?php $video = $entry->video_url; echo (!App\Helpers\Utilities::isNullOrBlank($video) ? $video : '#article'); ?>" 
            class="<?= !App\Helpers\Utilities::isNullOrBlank($video) ? 'glightbox ' : '' ?>play-btn"></a> 
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
          var js_trans_main = new Array(<?=count($entry->entryChildren)?>);
          var js_trans_sub = new Array(<?=count($entry->entryChildren)?>);
        </script>

        <?php foreach ($entry->entryChildren as $child) :?>

          <!-- Row start -->
          <div class="row <?= $p > 0 ? 'mt-5' : ''?>">

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
                        js_trans_main[<?=$p?>] = new Array(<?=$count?>);
                      </script>
                      <?php foreach ($child->translations as $tran) :?>
                        <?php if ($tran->pseudo) : ?>
                          <?php if ($i > 0) :?>
                            <?php if ($i < $count - 1) :?>
                              <li><hr class="dropdown-divider"></li>
                            <?php else : ?>
                              <li>
                                <a class="dropdown-item text-truncate ref" href="<?=htmlspecialchars($tran->encodedNotation)?>" 
                                    target="_blank" rel="noreferrer noopener">
                                    <?=$tran->encodedAuthor?>
                                  <i class="bi bi-box-arrow-up-right float-end"></i>
                                </a>
                              </li>
                            <?php endif ?>    
                          <?php endif ?>
                          <?php if ($i < $count - 1) :?>
                            <li><h6 class="dropdown-header"> <?=$tran->encodedAuthor?></h6></li>
                          <?php endif ?>
                        <?php else : ?>
                          <?php 
                            $item = (object)['title'    =>  $tran->enum_title,
                                            'content'  =>  $tran->content,
                                            'author'   =>  $tran->author,
                                            'lang'     =>  $tran->language_code,];  
                          ?>
                          <script type="text/javascript">
                            js_trans_main[<?=$p?>][<?=$i?>] = <?=json_encode($item)?>;
                          </script>
                          <li><a class="dropdown-item text-truncate link-main-<?=$p?>
                                <?php if ($tran->default) echo ' active'; ?>" href="javascript:void(0)"
                                onclick="reloadContent(1, js_trans_main[<?=$p?>][<?=$i?>], <?=$p?>);
                                          selectDropdownItem(1, this, <?=$p?>);//TODO">
                            <?=$tran->encodedAuthor?></a>
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
                    <script type="text/javascript">
                      js_trans_sub[<?=$p?>] = new Array(<?=$count?>);
                    </script>
                    <?php foreach ($child->translations as $tran) :?>
                      <?php if ($tran->pseudo) : ?>
                        <?php if ($i > 0) :?>
                          <?php if ($i < $count - 1) :?>
                            <li><hr class="dropdown-divider"></li>
                          <?php else : ?>
                            <li>
                              <a class="dropdown-item text-truncate ref" href="<?=htmlspecialchars($tran->encodedNotation)?>" 
                                  target="_blank" rel="noreferrer noopener">
                                  <?=$tran->encodedAuthor?>
                                <i class="bi bi-box-arrow-up-right float-end"></i>
                              </a>
                            </li>
                          <?php endif ?>
                        <?php endif ?>
                        <?php if ($i < $count - 1) :?>
                          <li><h6 class="dropdown-header"> <?=$tran->encodedAuthor?></h6></li>
                        <?php endif ?>
                      <?php else : ?>
                        <?php 
                          $item = (object)['title'    =>  $tran->enum_title,
                                          'content'  =>  $tran->content,
                                          'author'   =>  $tran->author,
                                          'lang'     =>  $tran->language_code,];  
                        ?>
                        <script type="text/javascript">
                          js_trans_sub[<?=$p?>][<?=$i?>] = <?=json_encode($item)?>;
                        </script>
                        <li><a class="dropdown-item text-truncate link-sub-<?=$p?>
                              <?php if ($tran->default) echo ' active'; ?>" href="javascript:void(0)"
                              onclick="reloadContent(2, js_trans_sub[<?=$p?>][<?=$i?>], <?=$p?>);
                                        selectDropdownItem(2, this, <?=$p?>);">
                          <?=$tran->encodedAuthor?></a>
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
            <?php $parallelsCount = App\Helpers\Utilities::isNullOrBlank($child->parallels) ? 0 : count(explode(",", $child->parallels));
              if ($parallelsCount > 0) :?>
              <div class="parallels row mt-5 text-center">
                <div>
                  <a href="javascript:void(0)" onclick="loadParallels('<?=$child->parallels?>', <?=$p?>)">
                    <i class="bi bi-search"></i><span class="parallels-title"><?=lang('App.article_parallels_search')?></span>
                  </a>
                </div>
                <div class="parallels-content mt-3 fst-italic d-none"></div>
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

  <!-- JS -->
  <script type="text/javascript">

    var _bilingual = false;

    var _parallelsOns = new Array(<?=count($entry->entryChildren)?>);
    for (let i = 0; i < _parallelsOns.length; i++) {_parallelsOns[i] = false;}

    function loadParallels(pars, i) {
      if (_parallelsOns[i]) return;        
      loading(true);
      var titleEle = document.querySelectorAll('.parallels-title')[i];
      var contentEle = document.querySelectorAll('.parallels-content')[i];
      parallelsSearching(titleEle, contentEle);
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          try {
            if (this.readyState == 4) {
              if (this.status == 200) {                  
                parallelsResult(titleEle, contentEle, this.responseText);                  
                _parallelsOns[i] = true;
              } else {                  
                parallelsError(titleEle, contentEle);
              }
              loading(false);
            }
          } catch(e) {
            parallelsError(titleEle, contentEle)
            loading(false);
          }
        };          
        xmlhttp.open("GET", "/parallels=" + pars, true);
        xmlhttp.send();
    }

    function parallelsSearching(titleEle, contentEle) {
      titleEle.innerHTML = "<?=lang('App.article_parallels_loading')?>";
      contentEle.innerHTML = "<?=lang('App.article_parallels_patient')?>";
      contentEle.classList.remove('d-none');        
    }

    function parallelsResult(titleEle, contentEle, responseText) {
      var data = JSON.parse(responseText);
      var result = data['urls'];
      var msg = data['msg'];
      var content = '';
      for (var i = 0; i < result.length; i++) {
        par = result[i];
        if (content.length > 0) {
          content += ", ";
        }
        if (par.url) {
          content += '<a href="' + par.url + '">' + par.entry_id + '</a>';
        } else {
          content += '<span>' + par.entry_id + '</span>';
        }
      }
      contentEle.classList.add("text-uppercase");
      contentEle.innerHTML = content;
      titleEle.innerHTML = msg;  
    }

    function parallelsError(titleEle, contentEle) {
      contentEle.innerHTML = "<?=lang('App.article_parallels_error')?>";
      titleEle.innerHTML = "<?=lang('App.article_parallels_failed')?>"
      titleEle.parentElement.removeAttribute("href");
      titleEle.parentElement.removeAttribute("onclick");
    }

    function bilingual(e) {
      var col_mains = document.querySelectorAll('#col-main');
      if (col_mains == null || col_mains.length <= 0) return;
      
      var col_subs = document.querySelectorAll('#col-sub');
      var _bilingual = !hasClass(col_subs[0], 'hidden');
      for (var i = 0; i < col_mains.length; i++) {
        let col_main = col_mains[i];
        let col_sub = col_subs[i];
        if (!_bilingual) {
          col_main.className = 'col-6';
          col_sub.className = 'col-6'; 
        } else {
          col_main.className = '';
          col_sub.className = 'hidden'; 
        }
      }

      if (!e) return;
      var msg = '';
      if (_bilingual) {
        loopToggleCss(new Array(e.id), 'active', 'inactive');
        msg = '<?=lang('App.article_msg_monolingual')?>';
      } else {
        loopToggleCss(new Array(e.id), 'inactive', 'active');
        msg = '<?=lang('App.article_msg_bilingual')?>';
      }
      setToastMessage(msg);

      window.location.href = '#article';
    }

    function selectDropdownItem(type, e, i) {        
      if (!e) return;
      var css = type == 1 ? ('link-main-' + i) : type == 2 ? ('link-sub-' + i) : null;
      if (css == null) return;

      var items = document.querySelectorAll('.' + css);
      loopToggleCssByElements(items, 'active', '');
      loopToggleCssByElements(new Array(e), '', 'active');
    }

    function reloadContent(type, item, i) {
      if (!item) return;
      var ti, co, au;
      // main dropdown
      if (type == 1) {        
        ti = document.querySelectorAll('#title-main')[i];
        co = document.querySelectorAll('#content-main')[i];
        au = document.querySelectorAll('#dropdown-main')[i].children[0];
      // sub dropdown  
      } else if (type == 2) {
        ti = document.querySelectorAll('#title-sub')[i];
        co = document.querySelectorAll('#content-sub')[i];
        au = document.querySelectorAll('#dropdown-sub')[i].children[0];
      } else {
        return;
      }
      if (ti) {
        ti.innerHTML = item.title;
        ti.setAttribute("lang", item.lang); // unnecessary though?
      }
      co.innerHTML = item.content;
      co.setAttribute("lang", item.lang);
      au.innerHTML = item.author;
      au.setAttribute("lang", item.lang);
    }

    function initContent(items) {
      if (!items || items.length <= 0) return;      
      for (var i = 0; i < items.length; i++) {
        reloadContent(1, items[i], i);
        reloadContent(2, items[i], i);
      }
    }

    function initToastArticle() {
      initToast(['btn-bilingual']);
    }

    function dropdownOverflow() {
      dropdownArticle();
    }

    function dropdownArticle() {
      let das = document.querySelectorAll('#dd-article');
      if (!das || das.length <= 0) return;
      let ar = document.querySelector('#article');
      for (var i = 0; i < das.length; i++) {
        let da = das[i];
        da.addEventListener('show.bs.dropdown', () => {
          ar.style.overflow = 'auto';
        });
        da.addEventListener('hide.bs.dropdown', () => { 
          ar.style.overflow = 'hidden';
        });
      }
    }

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
        $title = ''; $content = ''; $author = ''; $lang = 'auto';
        if (isset($defaultTran)) {
          $item = (object)['title'    =>  $defaultTran->enum_title,
                           'content'  =>  $defaultTran->content,
                           'author'   =>  $defaultTran->author,
                           'lang'     =>  $defaultTran->language_code,];
          array_push($items, $item);
        }
      }      
    ?>

    window.onload = function() {
      initToastArticle();
      initContent(<?=json_encode($items)?>);
      dropdownOverflow();
    }
    
  </script>
  <link rel="stylesheet" href="/assets/js/ckeditor5-43.1.0/ckeditor5.css">