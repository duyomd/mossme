    <footer id="footer">
      <div class="container">
        <?php if (!isset($footer_text)) $footer_text = 
          '<div class="copyright">'
            . lang('App.copyright_start') . '<strong><span>' . lang('App.project_name') . '</span></strong>' . lang('App.copyright_end') .
          '</div>
          <div class="design">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->'
            . lang('App.design') . '<a href="' . lang('App.design_url') . '" target="_blank" rel="noreferrer noopener">' 
            . lang('App.design_name') . '</a>
          </div>';?>
        <?=$footer_text?>
      </div>
      
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center" 
      aria-label="<?=lang('App.aria_back_to_top')?>"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/common.js"></script>
    <script src="/assets/js/validate.js"></script>

    <!-- ajx -->
    <script type="text/javascript">      
      initMenu();
    </script>

  </body>

</html>