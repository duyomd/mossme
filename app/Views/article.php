<!-- End Header -->

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
            <ul class="content-list content-list-parents pt-3">
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
            <?php if ($count > 1) echo $entry->displayEnumTitle; else echo '&nbsp;'; ?>
          </h2>
          
          <div class="btns">
            <a href="/article/<?=$entry->previous_id?>" class="btn-scroll animated fadeInUp scrollto
              <?php if(!isset($entry->previous_id)) echo ' disabled'; ?>">
              <i class="bi bi-chevron-double-<?= App\Helpers\Utilities::isRightToLeft() ? 'right' : 'left' ?>"></i>
            </a>

            <?php if (!$entry->isFolder) : ?>      

              <a id="btn-commentary" href="#commentary" class="btn-scroll animated fadeInUp ms-btns-navi inactive
                <?php if(count($entry->commentaries) == 0) echo ' disabled'; ?>"
                role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="commentary" 
                onclick="commentary(this)">
                <i class="bi bi-zoom-in"></i></a>

              <a id="btn-bilingual" class="btn-scroll animated fadeInUp scrollto ms-btns-navi inactive"
                href="javascript:void(0)" role="button" 
                onclick="bilingual(this)">
                <i id="icon-bilingual" class="bi bi-book-half"></i></a>

            <?php endif ?>  
              
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
    <!-- file type -->
    <?php if (!$entry->isFolder) : ?>     
      
      <section id="article" class="article" style="--bg-article: url(<?=$entry->image_url_content?>);">
        <div class="container" data-aos="fade-up">
        
          <div class=row>
            <div id="col-main" class="">

              <div class="section-title">
                <h2><?=lang('App.article_translation', [$entry->translationCount])?></h2>


                <div id="dd-article" class="dropdown pt-2" lang="auto">

                  <button class="btn dropdown-toggle text-truncate" type="button" id="dropdown-main" 
                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">
                    <span></span>
                  </button>

                  <ul class="dropdown-menu" aria-labelledby="dropdown-main">
                    <?php $i = 0; $count = count($entry->translations); ?>
                    <script type="text/javascript">
                      var js_trans = new Array(<?=$count?>);
                    </script>
                    <?php foreach ($entry->translations as $tran) :?>
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
                        <script type="text/javascript">
                          js_trans[<?=$i?>] = {title: encodeURIComponent("<?=$tran->encodedTitle?>"),
                                               content: encodeURIComponent("<?=$tran->encodedContent?>"),
                                               author: encodeURIComponent("<?=$tran->encodedAuthor?>"),
                                               lang: "<?=$tran->language_code?>"};
                        </script>
                        <li><a class="dropdown-item text-truncate link-main
                              <?php if ($tran->default) echo ' active'; ?>" href="javascript:void(0)"
                              onclick="reloadContent(1, js_trans[<?=$i?>]);
                                       selectDropdownItem(1, this);">
                          <?=$tran->encodedAuthor?></a>
                        </li>
                      <?php endif ?>
                      <?php $i++; ?>
                    <?php endforeach ?>  
                  </ul>

                </div>

                <p id="title-main" class="mt-4 text-center"><?=$entry->displayTitle?></p>
              </div>

              <div class="row">
                <div id="content-main" class="content"></div>
              </div>

            </div> 
            <!-- COL1 end -->

            <!-- COL2 start -->
            <div id="col-sub" class="hidden">
              
              <div class="section-title">
                <h2><?=lang('App.article_translation', [$entry->translationCount])?></h2>
                
                <div id="dd-article" class="dropdown pt-2" lang="auto">
                  
                  <button class="btn dropdown-toggle text-truncate ref" type="button" id="dropdown-sub" 
                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">
                    <span></span>
                  </button>

                  <ul class="dropdown-menu" aria-labelledby="dropdown-sub">
                    <?php $i = 0; $count = count($entry->translations); ?>
                    <script type="text/javascript">
                      var js_trans = new Array(<?=$count?>);
                    </script>
                    <?php foreach ($entry->translations as $tran) :?>
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
                        <script type="text/javascript">
                          js_trans[<?=$i?>] = {title: encodeURIComponent("<?=$tran->encodedTitle?>"),
                                               content: encodeURIComponent("<?=$tran->encodedContent?>"),
                                               author: encodeURIComponent("<?=$tran->encodedAuthor?>"),
                                               lang: "<?=$tran->language_code?>"};
                        </script>
                        <li><a class="dropdown-item text-truncate link-sub
                              <?php if ($tran->default) echo ' active'; ?>" href="javascript:void(0)"
                              onclick="reloadContent(2, js_trans[<?=$i?>]);
                                       selectDropdownItem(2, this);">
                          <?=$tran->encodedAuthor?></a>
                        </li>
                      <?php endif ?>
                      <?php $i++; ?>
                    <?php endforeach ?>  
                  </ul>

                </div>
                <p id="title-sub" class="mt-4 text-center"><?=$entry->displayTitle?></p>
              </div>

              <div class="row">
                <div id="content-sub" class="content"></div>
              </div>

            </div>
            <!-- COL2 end -->

          </div>

        </div>
      </section><!-- End Article Section -->
      
      <section id="commentary" class="commentary collapse" style="--bg-cmt: url(<?=$entry->image_url_commentary?>);">
        <div class="container" data-aos="fade-up" >

          <div class="section-title">

            <h2><?=lang('App.article_commentary', [$entry->commentaryCount])?></h2>
            
            <div id="dd-commentary" class="dropdown pt-2" lang="auto">

              <button class="btn dropdown-toggle text-truncate" type="button" id="dropdown-comm" 
                data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">
                <span></span>
              </button>

              <ul class="dropdown-menu" aria-labelledby="dropdown-comm">
                <?php $i = 0; $count = count($entry->commentaries); ?>
                <script type="text/javascript">
                  var js_comms = new Array(<?=$count?>);
                </script>
                <?php foreach ($entry->commentaries as $comm) :?>
                  <?php if ($comm->pseudo) : ?>
                    <?php if ($i > 0) :?>
                      <?php if ($i < $count - 1) :?>
                        <li><hr class="dropdown-divider"></li>
                      <?php endif ?>    
                    <?php endif ?>
                    <?php if ($i < $count - 1) :?>
                      <li><h6 class="dropdown-header"> <?=$comm->encodedAuthor?></h6></li>
                    <?php endif ?>
                  <?php else : ?>
                    <script type="text/javascript">
                      js_comms[<?=$i?>] = {content: encodeURIComponent("<?=$comm->encodedContent?>"),
                                           author: encodeURIComponent("<?=$comm->encodedAuthor?>"),
                                           lang: "<?=$comm->language_code?>"};
                    </script>
                    <li><a class="dropdown-item text-truncate link-comm
                          <?php if ($comm->default) echo ' active'; ?>" href="javascript:void(0)"
                          onclick="reloadContent(3, js_comms[<?=$i?>]);
                                   selectDropdownItem(3, this);">
                      <?=$comm->encodedAuthor?></a>
                    </li>
                  <?php endif ?>
                  <?php $i++; ?>
                <?php endforeach ?>  
              </ul>

            </div>

          </div>

          <div class="row">
            <div id="content-comm" class="content"></div>
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
                <p id="title-main" class="mt-4"><?= $entry->displayEnumTitle ?></p>
              </div>
          </div>
          <?php if (!App\Helpers\Utilities::isNullOrBlank($entry->displayContent)) : ?>
            <div class="mb-4 row justify-content-center">
              <div><?= $entry->displayContent ?></div>
            </div>
          <?php endif ?>
          <?php if ($entry->isFolder && count($entry->translationsChildren) > 0) : ?>
            <div class="row justify-content-center">
              <div class="col-lg-10">
                  <ul class="content-list">
                    <?php foreach ($entry->translationsChildren as $child) : ?>
                      <li><a href="/article/<?=$child->entry_id?>">
                        <span><?= $child->enum_title ?></span>
                      </a></li>
                    <?php endforeach ?>
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
  <?php if (!$entry->isFolder) : ?>
    <script type="text/javascript">

      const DELAY_PERIOD = 370;

      var _dropindex_main, _dropindex_sub, _dropindex_comm;
      var _bilingual = false;

      function gotoCmt() {
        var cmt = document.getElementById('commentary');
        if (!cmt || !cmt.className) return; 
        if (hasClass(cmt, 'collapse show')) {
          window.location.href = "#commentary";
        }
      }

      function bilingual(e) {
        var col_main = document.getElementById('col-main');
        if (col_main == null) return;
        
        var col_sub = document.getElementById('col-sub');
        var _bilingual = !hasClass(col_sub, 'hidden');
        if (!_bilingual) {
          col_main.className = 'col-6';
          col_sub.className = 'col-6'; 
        } else {
          col_main.className = '';
          col_sub.className = 'hidden'; 
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

      function commentary(e) {
        if (!e) return;
        // forbid continuously clicking
        document.getElementById(e.id).classList.add('disabled');

        var msg = '';
        if (hasClass(e, 'active')) {
          loopToggleCss(new Array(e.id), 'active', 'inactive');
          msg = '<?=lang('App.article_msg_comm_hidden')?>';
        } else {
          loopToggleCss(new Array(e.id), 'inactive', 'active');
          msg = '<?=lang('App.article_msg_comm_shown')?>';
        }
        setToastMessage(msg);

        setTimeout(function(){
          gotoCmt();
          document.getElementById(e.id).classList.remove('disabled');
        }, DELAY_PERIOD);
      }

      function selectDropdownItem(type, e) {        
        if (!e) return;
        var css = type == 1 ? 'link-main' : type == 2 ? 'link-sub' : type == 3 ? 'link-comm' : null;
        if (css == null) return;

        var items = document.querySelectorAll('.' + css);
        loopToggleCssByElements(items, 'active', '');
        loopToggleCssByElements(new Array(e), '', 'active');
      }

      function reloadContent(type, item) {
        if (!item) return;
        var ti, co, au;
        // main dropdown
        if (type == 1) {
          ti = document.getElementById('title-main');
          co = document.getElementById('content-main');
          au = document.getElementById('dropdown-main').children[0];
        // sub dropdown  
        } else if (type == 2) {
          ti = document.getElementById('title-sub');
          co = document.getElementById('content-sub');
          au = document.getElementById('dropdown-sub').children[0];
        // commentary dropdown  
        } else if (type == 3) {
          ti = document.getElementById('title-comm');
          co = document.getElementById('content-comm');
          au = document.getElementById('dropdown-comm').children[0];
        } else {
          return;
        }
        if (ti) {
          ti.innerHTML = decodeURIComponent(item.title);
          ti.setAttribute("lang", item.lang);
        }
        co.innerHTML = decodeURIComponent(item.content);
        co.setAttribute("lang", item.lang);
        au.innerHTML = decodeURIComponent(item.author);
        au.setAttribute("lang", item.lang);
      }

      function initContent(_title, _content, _author, _al, _title_comm, _content_comm, _author_comm, _cl) {
        var tran = {title: _title, content: _content, author: _author, lang: _al};
        var comm = {content: _content_comm, author: _author_comm, lang: _cl};
        if (_author) {
          reloadContent(1, tran);
          reloadContent(2, tran);
        }
        if (_author_comm) {
          reloadContent(3, comm);
        }
      }

      function initToastArticle() {
        initToast(['btn-commentary', 'btn-bilingual']);
      }

      function initDefaultState() {
        if ('<?=$forward?>' == 'commentary') {
          document.getElementById('btn-commentary').click();
        } else if ('<?=$forward?>' == 'translation') {
          setTimeout(function(){
            window.location.hash = '#article';
          }, DELAY_PERIOD);                   
        }
      }
      
      <?php
        // translations
        $defaultTran = null;
        foreach ($entry->translations as $tran) {
          if ($tran->default) {
            $defaultTran = $tran;
            break;
          }
        }
        $title = ''; $content = ''; $author = ''; $lang = 'auto';
        if (isset($defaultTran)) {
           $title = $defaultTran->encodedTitle;
          // $title = $defaultTran->encodedEnumTitle;
          $content = $defaultTran->encodedContent;
          $author = $defaultTran->encodedAuthor;
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
        $content_comm = ''; $author_comm = ''; $lang_comm = 'auto';
        if (isset($defaultComm)) {
          $content_comm = $defaultComm->encodedContent;
          $author_comm = $defaultComm->encodedAuthor; 
          $lang_comm = $defaultComm->language_code;
        }
      ?>

      window.onload = function() {
        initToastArticle();
        initContent(encodeURIComponent('<?=$title?>'),
                  encodeURIComponent('<?=$content?>'),
                  encodeURIComponent('<?=$author?>'),
                  '<?=$lang?>',
                  '',
                  encodeURIComponent('<?=$content_comm?>'),
                  encodeURIComponent('<?=$author_comm?>'),
                  '<?=$lang_comm?>');
        initDefaultState();        
        dropdownOverflow();
      }

      function dropdownOverflow() {
        dropdownArticle();
        dropdownCommentary()
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

      function dropdownCommentary() {
        let dc = document.querySelector('#dd-commentary');
        if (!dc) return;
        let co = document.querySelector('#commentary');
        dc.addEventListener('show.bs.dropdown', () => {            
          var styleElem = document.head.appendChild(document.createElement("style"));
          styleElem.innerHTML = ".commentary:before {position: fixed;}";
          co.style.overflow = 'auto';
        });
        dc.addEventListener('hide.bs.dropdown', () => { 
          var styleElems = document.getElementsByTagName("style");
          for (let i = 0; i < styleElems.length; i++) {
            styleElems[i].remove();
          }
          co.style.overflow = 'hidden';
        });
      }
      
    </script>
  <?php endif ?>