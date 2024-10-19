<!-- End Header -->

  <main id="main">

    <style>
      /* unreadable text in light theme mode */
      #topbar .contact-info i span, #topbar .theme-mode ul a {
        color: var(--mm-color-font);
      }
    </style>

     <!-- ======= Hero Section ======= -->
    <section id="hero" class="hidden"></section><!-- End Hero -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        
        <div id="title" class="section-title">
          <h2><?=lang('App.info')?></h2>
          <p><?=lang('App.contact')?></p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i id="address" class="bi bi-geo-alt"></i>
                <h4><?=lang('App.location')?></h4>
                <p><?=lang('App.msg_location')?></p>
              </div>

              <div class="email">
                <i id="email" class="bi bi-envelope"></i>
                <h4><?=lang('App.email')?></h4>
                <p><?=lang('App.msg_email')?></p>
              </div>

              <div class="phone">
                <img id="earth" src="/assets/img/contact/earth.gif" alt="<?=lang('App.alt_earth')?>" onclick="toggleAnimation(this);">
                <img id="eye" src="/assets/img/contact/eye.gif" alt="<?=lang('App.alt_eye')?>" onclick="toggleAnimation(this);" class=" hidden" aria-hidden="true">
              </div>

            </div>  
          </div>

          <div id="message-form" class="col-lg-8 mt-5 mt-lg-0">

            <form action="/contact" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
              <?= csrf_field() ?>

              <?php $success = session()->getFlashdata('success'); if (isset($error) || $success) : ?>  
                <div class="mb-3">
                  <?php if (isset($error)) : ?>
                    <div class="error-message d-block"><?= validation_list_errors() != null ? validation_list_errors() : $error ?></div>
                  <?php endif ?>
                  <?php if ($success) : ?>
                    <div class="success-message d-block"><?=lang('App.msg_sent')?></div>
                  <?php endif ?>
                </div>
              <?php endif ?>

              <div class="row">

                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="name"  id="name" placeholder="<?=lang('App.fullname')?>"
                    value="<?= set_value('name') ?>">
                </div>

                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="<?=lang('App.your_mail')?>" 
                    value="<?= set_value('email') ?>">
                </div>
                
              </div>

              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="<?=lang('App.subject')?>"
                  value="<?= set_value('subject') ?>">
              </div>

              <div class="form-group mt-3">
                <?php $ta = array(
                              'class'       => 'form-control',
                              'id'          => 'content',
                              'name'        => 'content',
                              'value'       => set_value('content'),
                              'rows'        => '10',
                              'placeholder' => lang('App.msg_content'),
                              // 'required'    => true,
                );?>
                <?= form_textarea($ta) ?>
              </div>

              <div class="form-group mt-3">
                <div class="row">
                  <div class="col-xl-4 col-md-5 text-md-start text-center" >
                    <img src="/captcha" alt="<?=lang('App.alt_captcha')?>" class="captcha-image">
                    <a href="javascript:void(0)" class="bi bi-bootstrap-reboot d-inline-block ps-3 ps-md-2 refresh-captcha"></a>
                  </div>
                  <div class="col-xl-3 col-md-4 mt-md-0 mt-3">
                    <input type="text" class="form-control" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}" 
                      placeholder="<?=lang('App.captcha_text')?>" value="<?= set_value('captcha_challenge') ?>">
                  </div>
                  <div class="col-xl-5 col-md-3 mt-md-0 mt-3 text-md-end text-center">
                    <button type="submit"><?=lang('App.send')?></button>
                  </div>
                </div>
              </div>
         
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php $footer_text = 
    '<div class="copyright">'
      . lang('App.msg_footer1') .
    '</div>
    <div class="design font-big">'
      . lang('App.msg_footer2') .
    '</div>';
  include 'templates/footer.php';?>

  <!-- Js -->
  <script type="text/javascript">
    const CLASSNAME_FLEX      = "d-flex";
    const CLASSNAME_HIDDEN    = "hidden";
    const CLASSNAME_DARKNESS  = "yami";

    const hiddens = ["eye", "earth", "address", "email", "message-form", "footer"];
    const yamis   = ["body"];
    const dflexs  = ["topbar", "header"];

    function toggleAnimation(elem) {
			if (elem) {
				elem.id.includes('eye') ?  hiru() : yami();
			}
		}

		function yami() {
      loopToggleCss(dflexs, CLASSNAME_FLEX, CLASSNAME_HIDDEN);
      loopToggleCss(yamis, "", CLASSNAME_DARKNESS);
      loopToggleCss(hiddens, "", CLASSNAME_HIDDEN);

      loopToggleCss(new Array(hiddens[0]), " " + CLASSNAME_HIDDEN);
		}
		function hiru() {
      loopToggleCss(dflexs, CLASSNAME_HIDDEN, CLASSNAME_FLEX);
      loopToggleCss(yamis, " " + CLASSNAME_DARKNESS);
      loopToggleCss(hiddens, " " + CLASSNAME_HIDDEN);

      loopToggleCss(new Array(hiddens[0]), "", CLASSNAME_HIDDEN);
		}

    var refreshBtn = document.querySelector(".refresh-captcha");
    refreshBtn.addEventListener('click', () => {
      document.querySelector(".captcha-image").src = '/captcha?' + Date.now();
    });
  </script>