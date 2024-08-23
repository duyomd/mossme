<!DOCTYPE html>
<html lang="<?= App\Helpers\Utilities::getSessionLocale()?>" 
      data-bs-theme="<?= App\Helpers\Utilities::getSessionTheme() ?? 'dark'; ?>"
      dir="<?= App\Helpers\Utilities::isRightToLeft() ? 'rtl' : 'auto'?>">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= 
            // strtoupper(lang('App.project_name')) . " " .
            // lang('App.vertical_slash') . " " . 
            $displayHeader 
          ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- RTL CSS -->
  <?php if (App\Helpers\Utilities::isRightToLeft()) : ?>
    <link href="/assets/vendor/bootstrap/css/bootstrap.rtl.min.css" rel="stylesheet">
  <?php endif ?>

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body id="body" class="<?= App\Helpers\Utilities::getSessionLiteMode() ? 'lite' : ''; ?>">

  <!-- ======= Toast Message ======= -->
  <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3">
    <div class="toast text-bg-success bg-gradient border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="/assets/img/favicon.png" class="rounded">
        <strong><?=lang('App.project_name')?></strong>
        <small><?=lang('App.moments')?></small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div id="toast-msg" class="toast-body"></div>
    </div>
  </div>

  <!-- ======= Bookmark Modal ======= -->
  <div class="modal fade" id="bookmark-modal" tabindex="-1" aria-labelledby="bookmark-title" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <form action="/bookmarks/menu" method="post" role="form" class="ajax-form bookmark-form">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="bookmark-title"><?= lang('App.bookmark_modal_title') ?></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body modal-body-form">
            <div>
              <div class="error-message mb-3"></div>
              <div class="success-message mb-3"></div>
            </div>
            <div class="form-floating mb-3">                
              <input type="text" class="form-control" id="bm-name" name="bm-name" placeholder="<?= lang('App.bookmark_label_name') ?>">
              <label for="bm-name" class="col-form-label"><?= lang('App.bookmark_label_name') ?></label>
            </div>
            <div class="mb-3">
              <label for="bm-url-d" class="hidden"><?= lang('App.bookmark_label_url') ?></label>
              <input type="text" class="form-control" id="bm-url-d" value="<?= current_url() . lang('App.ellipsis') ?>" disabled>
              <input type="hidden" id="bm-url" name="bm-url">
            </div>
            <div class="form-floating">                
              <textarea class="form-control" id="bm-note" name="bm-note" placeholder="<?= lang('App.bookmark_label_note') ?>"></textarea>
              <label for="bm-note" class="col-form-label"><?= lang('App.bookmark_label_note') ?></label>
            </div>
            
            <input type="hidden" id="csrf-name" name="csrf-name" value="<?=csrf_token()?>"/>
            <input type="hidden" id="<?=csrf_token()?>" name="<?=csrf_token()?>" value="<?=csrf_hash()?>"/>
          </div>
          <div class="modal-footer">          
            <button type="submit" class="btn me-2" onclick="setBookmarkUrl()"><?= lang('App.bookmark_btn_save') ?></button>
            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal"><?= lang('App.bookmark_btn_close') ?></button>
          </div>
        </div>
      </form> 
    </div>
  </div>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">

        <?php if (!auth()->loggedIn()) : ?>
          <a class="bi bi-person d-flex align-items-center" href="/login" >
            <i><span> <?= lang('App.login') ?></span></i>
          </a>
        
        <?php else : ?>
          <div class="dropdown user-dropdown">
            <a class="bi bi-person d-flex align-items-center dropdown-toggle text-truncate" 
              href="javascript:()" role="button" aria-expanded="false" 
              data-bs-toggle="dropdown" data-bs-auto-close="true">
              <i><span> <?= auth()->user()->username ?></span></i>
            </a>
            <ul class="dropdown-menu user-menu" aria-labelledby="dropdown-main">
              <li>
                <a class="dropdown-item text-truncate" href="/bookmarks"><?= lang('App.bookmarks') ?></a>
              </li>
              <li>
                <a class="dropdown-item text-truncate" href="/userSettings"><?= lang('App.settings') ?></a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item text-truncate ref" href="/logout">
                  <?= lang('App.logout') ?>
                  <i class="bi bi-box-arrow-right float-end"></i>
                </a>              
              </li>
            </ul>
          </div>
        <?php endif ?>

        <a href="/contact" class="bi bi-mailbox d-flex align-items-center ms-4"><i><span> <?=lang('App.contact')?></span></i></a>
      </div>

      <div class="theme-mode d-none d-md-flex align-items-center">
        <ul>
          <?php if (App\Helpers\Utilities::getSessionTheme() == 'light') : ?>
            <li class="bi bi-sun"></li>
            <li>
              <a href="javascript:changeTheme('dark')" class="bi bi-moon"></a>
            </li>  
          <?php else : ?>
            <li>
              <a href="javascript:changeTheme('light')" class="bi bi-sun"></a>
            </li>  
            <li class="bi bi-moon"></li>
          <?php endif ?>  
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0 trim">
        <a class="nav-link scrollto" href="/#hero" title="<?= isset($displayHeader) ? $displayHeader : lang('App.ancient_path') ?>">
          <?= isset($displayHeader) ? $displayHeader : lang('App.ancient_path') ?>
        </a>
      </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li class="dropdown dropdown-language"><a href="javascript:void(0)"><span><?=lang('App.languages')?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="javascript:void(0)" onclick="changeLanguage('en')"><?=lang('App.language_me', [], 'en')?></a></li>

              <li><a href="javascript:void(0)" onclick="changeLanguage('cn')"><?=lang('App.language_me', [], 'cn')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('zh')"><?=lang('App.language_me', [], 'zh')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('ja')"><?=lang('App.language_me', [], 'ja')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('ko')"><?=lang('App.language_me', [], 'ko')?></a></li>

              <li><a href="javascript:void(0)" onclick="changeLanguage('fr')"><?=lang('App.language_me', [], 'fr')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('de')"><?=lang('App.language_me', [], 'de')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('it')"><?=lang('App.language_me', [], 'it')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('es')"><?=lang('App.language_me', [], 'es')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('ca')"><?=lang('App.language_me', [], 'ca')?></a></li>    
              <li><a href="javascript:void(0)" onclick="changeLanguage('pt')"><?=lang('App.language_me', [], 'pt')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('ru')"><?=lang('App.language_me', [], 'ru')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('nl')"><?=lang('App.language_me', [], 'nl')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('no')"><?=lang('App.language_me', [], 'no')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('hu')"><?=lang('App.language_me', [], 'hu')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('sv')"><?=lang('App.language_me', [], 'sv')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('sr')"><?=lang('App.language_me', [], 'sr')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('cs')"><?=lang('App.language_me', [], 'cs')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('pl')"><?=lang('App.language_me', [], 'pl')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('ro')"><?=lang('App.language_me', [], 'ro')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('sl')"><?=lang('App.language_me', [], 'sl')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('fi')"><?=lang('App.language_me', [], 'fi')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('tr')"><?=lang('App.language_me', [], 'tr')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('lt')"><?=lang('App.language_me', [], 'lt')?></a></li>

              <li><a href="javascript:void(0)" onclick="changeLanguage('he')"><?=lang('App.language_me', [], 'he')?></a></li>

              <li><a href="javascript:void(0)" class="disabled" onclick="changeLanguage('ne')"><?=lang('App.language_me', [], 'ne')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('hi')"><?=lang('App.language_me', [], 'hi')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('gu')"><?=lang('App.language_me', [], 'gu')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('kn')"><?=lang('App.language_me', [], 'kn')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('mr')"><?=lang('App.language_me', [], 'mr')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('ta')"><?=lang('App.language_me', [], 'ta')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('bn')"><?=lang('App.language_me', [], 'bn')?></a></li>

              <li><a href="javascript:void(0)" class="disabled" onclick="changeLanguage('bo')"><?=lang('App.language_me', [], 'bo')?></a></li>
              <li><a href="javascript:void(0)" class="disabled" onclick="changeLanguage('dz')"><?=lang('App.language_me', [], 'dz')?></a></li>

              <li><a href="javascript:void(0)" onclick="changeLanguage('vi')"><?=lang('App.language_me', [], 'vi')?></a></li>             
              <li><a href="javascript:void(0)" onclick="changeLanguage('id')"><?=lang('App.language_me', [], 'id')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('si')"><?=lang('App.language_me', [], 'si')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('my')"><?=lang('App.language_me', [], 'my')?></a></li>
              <li><a href="javascript:void(0)" onclick="changeLanguage('th')"><?=lang('App.language_me', [], 'th')?></a></li>
              <li><a href="javascript:void(0)" class="disabled" onclick="changeLanguage('lo')"><?=lang('App.language_me', [], 'lo')?></a></li>
              <li><a href="javascript:void(0)" class="disabled" onclick="changeLanguage('km')"><?=lang('App.language_me', [], 'km')?></a></li>
            </ul>
          </li>          
          
          <li class="dropdown"><a href="javascript:void(0)"><span><?=lang('App.tools')?> </span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a id="copy-link" href="javascript:void(0)" onclick="copyUrl(window.location.href, '<?=lang('App.msg_link_copied')?>')">
                <?=lang('App.copy_link')?> <i class="bi bi-share"></i></a>
              </li>
              <li><a class="<?= (!auth()->loggedIn() ? 'disabled' : '') ?>" href="#bookmark-modal" data-bs-toggle="modal"
                onclick="clearMsg(document.querySelector('.bookmark-form'));setBookmarkSuggestion();" >
                <?=lang('App.bookmark')?> <i class="bi bi-bookmark-check"></i></a>
              </li>
              <li><a class="<?= (!auth()->loggedIn() ? 'disabled' : '') ?>" href="/bookmarks">
                <?=lang('App.bookmark_list')?> <i class="bi bi-bookmarks"></i></a>
              </li>
              <li><a href="/search">
                <?=lang('App.search')?> <i class="bi bi-search"></i></a>
              </li>
              <li><a class="<?= (!auth()->loggedIn() ? 'disabled' : '') ?>" href="/userSettings">
                <?=lang('App.settings')?> <i class="bi bi-gear"></i></a>
              </li>
              <?php if (auth()->loggedIn() && auth()->user()->inGroup('dataoperator', 'admin', 'superadmin')) : ?>
                <li class="dropdown"><a href="javascript:void(0)"><span><?=lang('App.admin')?></span> <i class="bi bi-chevron-down"></i></a>
                  <ul>
                    <li><a href="/messages" class="<?= (!auth()->user()->inGroup('admin', 'superadmin') ? 'hidden' : '') ?>">
                      <?=lang('App.admin_messages')?><i class="bi bi-envelope-open"></i></a></li>
                    <li><a href="/users" class="<?= (!auth()->user()->inGroup('admin', 'superadmin') ? 'hidden' : '') ?>">
                      <?=lang('App.admin_users')?><i class="bi bi-people"></i></a></li>
                    <li><a href="/languages" class="<?= (!auth()->user()->inGroup('dataoperator', 'superadmin') ? 'hidden' : '') ?>">
                      <?=lang('App.admin_languages')?><i class="bi bi-badge-cc"></i></a></li>
                    <li><a href="/imageUrls" class="<?= (!auth()->user()->inGroup('dataoperator', 'superadmin') ? 'hidden' : '') ?>">
                      <?=lang('App.admin_images')?><i class="bi bi-images"></i></a></li>
                    <li><a href="/cards" class="<?= (!auth()->user()->inGroup('dataoperator', 'superadmin') ? 'hidden' : '') ?>">
                      <?=lang('App.admin_cards')?><i class="bi bi-tags"></i></a></li>
                    <li><a href="/entries" class="<?= (!auth()->user()->inGroup('dataoperator', 'superadmin') ? 'hidden' : '') ?>">
                      <?=lang('App.admin_entries')?><i class="bi bi-pencil-square"></i></a></li>
                  </ul>
                </li> 
              <?php endif ?>
            </ul>
          </li>
          <li><a class="nav-link" ></a></li>
          
          <li class="dropdown"><a href="javascript:void(0)"><span><?=lang('App.ancient_path')?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="javascript:void(0)"><span><?=lang('App.discourses')?></span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li class="dropdown"><a href="javascript:void(0)"><span><?=lang('App.dc_pi')?></span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                      <li><a href="/article/dn"><?=lang('App.dc_pi_long')?></a></li>
                      <li><a href="/article/mn"><?=lang('App.dc_pi_middle')?></a></li>
                      <li><a href="/article/sn"><?=lang('App.dc_pi_linked')?></a></li>
                      <li><a href="/article/an"><?=lang('App.dc_pi_numbered')?></a></li>
                      <li><a href="/article/kn"><?=lang('App.dc_pi_minor')?></a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a href="javascript:void(0)"><span><?=lang('App.dc_zh')?></span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                      <li><a href="/article/da"><?=lang('App.dc_zh_long')?></a></li>
                      <li><a href="/article/ma"><?=lang('App.dc_zh_middle')?></a></li>
                      <li><a href="/article/sa"><?=lang('App.dc_zh_linked')?></a></li>
                      <li><a href="/article/ea"><?=lang('App.dc_zh_numbered')?></a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="/article/his"><?=lang('App.history')?></a></li>
            </ul>
          </li>
          
          <li class="dropdown"><a href="javascript:void(0)"><span><?=lang('App.weed')?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/article/vin"><?=lang('App.law')?></a></li>
              <li class="dropdown"><a href="javascript:void(0)"><span><?=lang('App.analysis')?></span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="/article/int"><?=lang('App.internal')?></a></li>
                  <li><a href="/article/ext"><?=lang('App.external')?></a></li>
                </ul>
              </li>
              <li><a href="/article/ref"><?=lang('App.references')?></a></li>
              <li><a href="/#discussions" class="nav-link scrollto dropdown-outlaw"><?=lang('App.niraya_umibe')?></a></li>
            </ul>
          </li>
          
          <li><a class="nav-link scrollto" ></a></li>
          <li><a class="nav-link" href="/credits"><?=lang('App.credits', [])?></a></li>
          <li><a class="nav-link scrollto d-lg-none active" href="/"><?=strtoupper(lang('App.project_name'))?>
            <i class="bi bi-house-door"></i>
          </a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="/" class="home-menu-btn scrollto d-none d-lg-flex"><?=strtoupper(lang('App.project_name'))?></a>

    </div>
  </header>