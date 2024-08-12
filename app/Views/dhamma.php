<!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>
            <?php $lc = App\Helpers\Utilities::getSessionLocale(); 
              if ($lc != 'ja' && $lc != 'cn' && $lc != 'zh' && $lc != 'ko' 
                && $lc != 'hu' && $lc != 'sv') : ?>
              <?=lang('App.hero_caption_start')?><span><?=lang('App.hero_caption_end')?></span>
            <?php else : ?>
              <span><?=lang('App.hero_caption_start')?></span><?=lang('App.hero_caption_end')?>
            <?php endif ?>  
          </h1>
          <h2><?=lang('App.hero_text')?></h2>
          
          <div class="btns">
            <a href="#menu" class="btn-scroll animated fadeInUp scrollto"><?=lang('App.library')?></a>
            <a href="#events" class="btn-scroll animated fadeInUp scrollto ml-btns"><?=lang('App.card')?></a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" 
            data-aos="zoom-in" data-aos-delay="200">
          <a href="<?=lang('App.video_url_home')?>" class="glightbox play-btn"></a> 
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Legacy Section ======= -->
    <section id="legacy" class="legacy">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="legacy-img">
              <img src="/assets/img/legacy.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3><?=lang('App.legacy_caption')?></h3>
            <p class="fst-italic">
            <?=lang('App.legacy_header')?>
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i><?=lang('App.legacy_content1')?></li>
              <li><i class="bi bi-check-circle"></i><?=lang('App.legacy_content2')?></li>
              <li><i class="bi bi-check-circle"></i><?=lang('App.legacy_content3')?></li>
            </ul>
            <p><?=lang('App.legacy_footer1')?></p>
            <p><?=lang('App.legacy_footer2')?></p>
            <p><?=lang('App.legacy_footer3')?></p>
          </div>
        </div>

      </div>
    </section><!-- End Legacy Section -->

    <!-- ======= Sati Section ======= -->
    <section id="sati" class="sati">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?=lang('App.sati')?></h2>
          <p><?=lang('App.sati_caption')?></p>
        </div>

        <div class="row">

          <?php for ($i = 0; $i < 3; $i++) :?>
            <div class="col-lg-4<?= $i > 0 ? ' mt-4 mt-lg-0' : '' ?>">
              <div class="box" data-aos="zoom-in" data-aos-delay="100">
                <span><?=lang('App.satis.' . $i . '.caption')?>
                  <p class="float-end"><?=lang('App.satis.' . $i . '.footer')?></p>
                </span>
                <h4><?=lang('App.satis.' . $i . '.header')?></h4>
                <p><?=lang('App.satis.' . $i . '.content')?></p>
                
              </div>
            </div>
          <?php endfor ?>

        </div>

      </div>
    </section><!-- End Sati Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?=lang('App.sutta')?></h2>
          <p><?=lang('App.ancient_path')?></p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active"><?=lang('App.total')?></li>
              <li data-filter=".filter-pali"><?=lang('App.pi')?></li>
              <li data-filter=".filter-agama"><?=lang('App.zh')?></li>
              <li data-filter=".filter-history"><?=lang('App.history_short')?></li>
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

          <?php foreach ($suttaMenuTranslations as $tran) : ?>
            <div class="col-lg-6 menu-item <?=$tran->isPali() ? 'filter-pali' : 
                                             ($tran->isAgama() ? 'filter-agama' : 'filter-history')?>">
              <a href="/article/<?=$tran->entry_id?>">
                <img src="<?=$tran->image_url_header?>" class="menu-img" alt="">
              </a>
              <div class="menu-content">
                <a href="/article/<?=$tran->entry_id?>"><?=$tran->title?></a><!--<span>152</span>-->
              </div>
              <div class="menu-description">
                <?=$tran->encodedAuthorNote?>
              </div>
            </div>  
          <?php endforeach ?>  

        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Discussions Section ======= -->
    <section id="discussions" class="discussions">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?=lang('App.vinaya_abhi')?></h2>
          <p><?=lang('App.weed')?></p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">

              <?php $i = 1; $css = ''; foreach ($nonSuttaMenuTranslations as $tran) : ?>
                <li class="nav-item">
                  <?php $css = $i == 1 ? ' active show' : ($tran->isOutlaw() ? ' nav-link-outlaw' : ''); ?>
                  <a class="nav-link<?=$css?>" data-bs-toggle="tab" href="#tab-<?=$i?>">
                    <?= $tran->title ?>
                  </a>
                </li>
                <?php $i++; ?>
              <?php endforeach ?>  

            </ul>
          </div>

          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">

              <?php $i = 1; $css = ''; foreach ($nonSuttaMenuTranslations as $tran) : ?>
                <?php $css = $i == 1 ? ' active show' : ($tran->isOutlaw() ? ' link-outlaw' : ''); ?>
                <div class="tab-pane<?=$css?>" id="tab-<?=$i?>">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3><?=$tran->encodedAuthor?></h3>
                      <p class="fst-italic"><?=$tran->encodedAuthorNote?></p>
                      <p><?=$tran->encodedNotation?>
                        <a href="/article/<?=$tran->entry_id?>" class="<?=$css?>">
                          <?= $tran->isOutlaw() ? lang('App.samsara_link') : lang('App.detail_link') ?>
                        </a>
                      </p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="<?=$tran->image_url_header?>" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <?php $i++; ?>
              <?php endforeach ?>    

            </div>
          </div>

        </div>        
      </div>
    </section><!-- End Discussions Section -->

    <!-- ======= Events Section ======= -->
    <?php if (count($cardTranslations) > 0) : ?>
      <section id="events" class="events">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2><?=lang('App.card')?></h2>
            <p><?=lang('App.card_caption')?></p>
          </div>

          <div class="events-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

              <?php foreach ($cardTranslations as $cardTran) :?>
                <div class="swiper-slide">
                <div class="row event-item">
                  <div class="col-lg-6">
                    <img src="<?=$cardTran->image_url?>" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h3><?=$cardTran->author?></h3>
                    <div class="sequence">
                      <p><span><?=lang('App.sequence', [$cardTran->id])?></span></p>
                    </div>
                    <p class="fst-italic">
                      <?=$cardTran->header?>
                    </p>
                    <?=$cardTran->content?>
                    <p>
                      <?=$cardTran->footer?>
                    </p>
                  </div>
                </div>
              </div>  
              <?php endforeach?>  

            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
      </section>
    <?php endif ?><!-- End Events Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2><?=lang('App.gallery_caption')?></h2>
          <p></p>
        </div>

        <div class="row">
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <p><?=lang('App.gall_text1')?><br/>
               <?=lang('App.gall_text2')?><br/>
               <?=lang('App.gall_text3')?></p>
            <p class="fst-italic">              
              <?=lang('App.gall_footer')?>
            </p>
          </div>
        </div>

      </div>

    </section><!-- End Gallery Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?=lang('App.parinamana')?></h2>
          <p><?=lang('App.prn_caption')?></p>
        </div>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <?php for ($i = 0; $i < 4; $i++) :?>
              <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    <?= lang('App.prns.' . $i . '.content') ?>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="<?= lang('App.prns.' . $i . '.img_url') ?>" class="testimonial-img" alt="">
                <h3><?= lang('App.prns.' . $i . '.footer1') ?></h3>
                <h4><?= lang('App.prns.' . $i . '.footer2') ?></h4>
              </div>
            </div>  
            <?php endfor ?>  

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'templates/footer.php';?>