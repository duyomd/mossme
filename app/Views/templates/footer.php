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
    <!-- <script src="/assets/vendor/aos/aos.js" defer></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js" defer></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js" defer></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script> -->

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/js/glightbox.min.js" defer
      integrity="sha256-pDrSUa13vOne5uuB/pSUdT2vNTXsq1i4vtm/xpqJX9w=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/isotope-layout@3.0.6/dist/isotope.pkgd.min.js" defer
      integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11.1.14/swiper-bundle.min.js" defer
      integrity="sha256-JejyoPWTH4vQGeV0iK9egO/wdGB4IvgBRl/+Oo2KT/E=" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.min.js" defer></script>
    <script src="/assets/js/common.min.js" defer></script>
    <script src="/assets/js/validate.min.js" defer></script>

    <!-- ajx -->
    <script type="text/javascript">      
      window.addEventListener('load', () => {initMenu()});
    </script>

  </body>

</html>