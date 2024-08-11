<!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hidden"></section><!-- End Hero -->

  <main id="main">

    <style>
      /* unreadable text in light theme mode */
      #topbar .contact-info i span, #topbar .theme-mode ul a {
        color: var(--mm-color-font);
      }
    </style>

    <!-- ======= Credits Section ======= -->
    <section id="credits" class="credits">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-center">
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3><?=lang('App.credits_gratitude')?></h3><br/>
            <p><?=lang('App.credits_foundation')?></p>
            <ul>
              <li><i class="bi bi-check-circle"></i><?=lang('App.credits_foundation_1')?></li>
              <li><i class="bi bi-check-circle"></i><?=lang('App.credits_foundation_2')?></li>
              <li><i class="bi bi-check-circle"></i><?=lang('App.credits_foundation_3')?></li>
              <li><i class="bi bi-check-circle"></i><?=lang('App.credits_foundation_4')?></li>
            </ul>

            <p><?=lang('App.credits_now')?></p>
            <ul>
              <li><i class="bi bi-check-circle"></i><?=lang('App.credits_now_1')?></li>
              <li><i class="bi bi-check-circle"></i><?=lang('App.credits_now_2')?></li>
              <li><i class="bi bi-check-circle"></i><?=lang('App.credits_now_3')?></li>
            </ul>

            <p><?=lang('App.credits_future')?></p>
            <ul>
              <li><i class="bi bi-check-circle"></i><?=lang('App.credits_future_1')?></li>
              <li><i class="bi bi-check-circle"></i><?=lang('App.credits_future_2')?></li>
            </ul>

            <br/>
            <p class="fst-italic"><?=lang('App.credits_license')?><a href="/contact"><?=lang('App.credits_contact')?></a><?=lang('App.credits_dot')?></p>            
          </div>
        </div>        

      </div>
    </section><!-- End Legacy Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'templates/footer.php';?>