<?php use App\Helpers\Utilities; ?>

<!DOCTYPE html>
<html data-bs-theme="<?= Utilities::getSessionTheme() ?? 'dark'; ?>"
      dir="<?= Utilities::isRightToLeft() ? 'rtl' : 'auto'?>"
      lang="<?= isset($description) ? Utilities::getSessionLocale() : 'und' ?>">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php if(!isset($description)) : ?>
    <meta name="robots" content="noindex, nofollow">
  <?php endif ?>

  <title><?= 
            // strtoupper(lang('App.project_name')) . " " .
            // lang('App.vertical_slash') . " " . 
            $displayHeader 
          ?></title>
  
  <meta name="description" content="<?=isset($description) ? $description : ''?>">
  <meta name="keywords" content="">

  <!-- hreflang links -->
  <?php if (isset($hrefLangs)) : ?>
    <?php foreach ($hrefLangs as $href) : ?>
      <link rel="alternate" hreflang="<?=$href->lang?>" href="<?=$href->url?>">
    <?php endforeach; ?>
  <?php endif; ?>
  
  <!-- Favicons -->
  <link href="/assets/img/favicon.webp" rel="icon">
  <link href="/assets/img/apple-touch-icon.webp" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" 
    rel="stylesheet" media="none" onload="this.media='all'">

  <!-- Vendor CSS Files -->
  <!-- <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet" media="none" onload="this.media='all'">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet" media="none" onload="this.media='all'">  
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" media="none" onload="this.media='all'">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" media="none" onload="this.media='all'">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" media="none" onload="this.media='all'"> -->

  <link href="/assets/css/critical.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" media="none" onload="this.media='all'"
    integrity="sha256-X7rrn44l1+AUO65h1LGALBbOc5C5bOstSYsNlv9MhT8=" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css" media="none" onload="this.media='all'">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" media="none" onload="this.media='all'"
    integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" media="none" onload="this.media='all'" 
    integrity="sha256-Yg7qJLDO4djMg5XIDylc8ue2+rliSTwmtJqNQrY6Tck=" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/css/glightbox.min.css" media="none" onload="this.media='all'"
    integrity="sha256-bT9i1NF5afnHDpQ4z2cQBHJQGehoEj8uvClaAG+NXS0=" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8.4.7/swiper-bundle.min.css" media="none" onload="this.media='all'"
    integrity="sha256-Mi0V2Z77eSyUGlIC+o/H7p6TKEcic4P/lgUWMzigjqw=" crossorigin="anonymous">  
  <!-- RTL CSS -->
  <?php if (Utilities::isRightToLeft()) : ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" 
      integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
  <?php else : ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
      integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
  <?php endif ?>

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.min.css" rel="stylesheet">
</head>

<body id="body" class="<?= Utilities::getSessionLiteMode() ? 'lite' : ''; ?>">

  <!-- ======= Toast Message ======= -->
  <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3">
    <div class="toast text-bg-success bg-gradient border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="/assets/img/favicon.webp" class="rounded" alt="<?=lang('App.alt_favicon')?>">
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
      <form action="/bookmarks/menu" method="post" class="ajax-form bookmark-form">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="bookmark-title"><?= lang('App.bookmark_modal_title') ?></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body modal-body-form lazy-bg" data-bg="--bg-settings">
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
          <?php if (Utilities::getSessionTheme() == 'light') : ?>
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
          <li class="dropdown dropdown-language"><a role="button" href="javascript:void(0)"><span><?=lang('App.languages')?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php if(isset($languages)) : ?>
                <?php foreach($languages as $lang) : ?>
                  <?php if($lang->status == Utilities::STATUS_ACTIVE) : ?>
                    <li>
                      <a href="/?lang=<?=$lang->code?>"
                        onclick="changeLanguage('<?=$lang->code?>'); return false;">
                        <?=lang('App.language_me', [], $lang->code)?></a>
                    </li>
                  <?php endif ?>
                <?php endforeach ?>
              <?php else : ?>
                <!-- for pages without fetching languages, just in case -->
                <!-- TODO: extending Shield's Login/Register Controllers... -->
                <li><a href="/?lang=en" onclick="changeLanguage('en'); return false;"><?=lang('App.language_me', [], 'en')?></a></li>

                <li><a href="/?lang=zh-Hans" onclick="changeLanguage('zh-Hans'); return false;"><?=lang('App.language_me', [], 'zh-Hans')?></a></li>
                <li><a href="/?lang=zh-Hant" onclick="changeLanguage('zh-Hant'); return false;"><?=lang('App.language_me', [], 'zh-Hant')?></a></li>
                <li><a href="/?lang=ja" onclick="changeLanguage('ja'); return false;"><?=lang('App.language_me', [], 'ja')?></a></li>
                <li><a href="/?lang=ko" onclick="changeLanguage('ko'); return false;"><?=lang('App.language_me', [], 'ko')?></a></li>

                <li><a href="/?lang=fr" onclick="changeLanguage('fr'); return false;"><?=lang('App.language_me', [], 'fr')?></a></li>
                <li><a href="/?lang=de" onclick="changeLanguage('de'); return false;"><?=lang('App.language_me', [], 'de')?></a></li>
                <li><a href="/?lang=it" onclick="changeLanguage('it'); return false;"><?=lang('App.language_me', [], 'it')?></a></li>
                <li><a href="/?lang=es" onclick="changeLanguage('es'); return false;"><?=lang('App.language_me', [], 'es')?></a></li>
                <li><a href="/?lang=ca" onclick="changeLanguage('ca'); return false;"><?=lang('App.language_me', [], 'ca')?></a></li>    
                <li><a href="/?lang=pt" onclick="changeLanguage('pt'); return false;"><?=lang('App.language_me', [], 'pt')?></a></li>
                <li><a href="/?lang=ru" onclick="changeLanguage('ru'); return false;"><?=lang('App.language_me', [], 'ru')?></a></li>
                <li><a href="/?lang=nl" onclick="changeLanguage('nl'); return false;"><?=lang('App.language_me', [], 'nl')?></a></li>
                <li><a href="/?lang=no" onclick="changeLanguage('no'); return false;"><?=lang('App.language_me', [], 'no')?></a></li>
                <li><a href="/?lang=hu" onclick="changeLanguage('hu'); return false;"><?=lang('App.language_me', [], 'hu')?></a></li>
                <li><a href="/?lang=sv" onclick="changeLanguage('sv'); return false;"><?=lang('App.language_me', [], 'sv')?></a></li>
                <li><a href="/?lang=sr" onclick="changeLanguage('sr'); return false;"><?=lang('App.language_me', [], 'sr')?></a></li>
                <li><a href="/?lang=cs" onclick="changeLanguage('cs'); return false;"><?=lang('App.language_me', [], 'cs')?></a></li>
                <li><a href="/?lang=pl" onclick="changeLanguage('pl'); return false;"><?=lang('App.language_me', [], 'pl')?></a></li>
                <li><a href="/?lang=ro" onclick="changeLanguage('ro'); return false;"><?=lang('App.language_me', [], 'ro')?></a></li>
                <li><a href="/?lang=sl" onclick="changeLanguage('sl'); return false;"><?=lang('App.language_me', [], 'sl')?></a></li>
                <li><a href="/?lang=fi" onclick="changeLanguage('fi'); return false;"><?=lang('App.language_me', [], 'fi')?></a></li>
                <li><a href="/?lang=tr" onclick="changeLanguage('tr'); return false;"><?=lang('App.language_me', [], 'tr')?></a></li>
                <li><a href="/?lang=lt" onclick="changeLanguage('lt'); return false;"><?=lang('App.language_me', [], 'lt')?></a></li>

                <li><a href="/?lang=he" onclick="changeLanguage('he'); return false;"><?=lang('App.language_me', [], 'he')?></a></li>

                <li><a href="/?lang=ne" class="hidden" onclick="changeLanguage('ne'); return false;"><?=lang('App.language_me', [], 'ne')?></a></li>
                <li><a href="/?lang=hi" onclick="changeLanguage('hi'); return false;"><?=lang('App.language_me', [], 'hi')?></a></li>
                <li><a href="/?lang=gu" onclick="changeLanguage('gu'); return false;"><?=lang('App.language_me', [], 'gu')?></a></li>
                <li><a href="/?lang=kn" onclick="changeLanguage('kn'); return false;"><?=lang('App.language_me', [], 'kn')?></a></li>
                <li><a href="/?lang=mr" onclick="changeLanguage('mr'); return false;"><?=lang('App.language_me', [], 'mr')?></a></li>
                <li><a href="/?lang=ta" onclick="changeLanguage('ta'); return false;"><?=lang('App.language_me', [], 'ta')?></a></li>
                <li><a href="/?lang=bn" onclick="changeLanguage('bn'); return false;"><?=lang('App.language_me', [], 'bn')?></a></li>

                <li><a href="/?lang=bo" class="hidden" onclick="changeLanguage('bo'); return false;"><?=lang('App.language_me', [], 'bo')?></a></li>
                <li><a href="/?lang=dz" class="hidden" onclick="changeLanguage('dz'); return false;"><?=lang('App.language_me', [], 'dz')?></a></li>

                <li><a href="/?lang=vi" onclick="changeLanguage('vi'); return false;"><?=lang('App.language_me', [], 'vi')?></a></li>             
                <li><a href="/?lang=id" onclick="changeLanguage('id'); return false;"><?=lang('App.language_me', [], 'id')?></a></li>
                <li><a href="/?lang=si" onclick="changeLanguage('si'); return false;"><?=lang('App.language_me', [], 'si')?></a></li>
                <li><a href="/?lang=my" onclick="changeLanguage('my'); return false;"><?=lang('App.language_me', [], 'my')?></a></li>
                <li><a href="/?lang=th" onclick="changeLanguage('th'); return false;"><?=lang('App.language_me', [], 'th')?></a></li>
                <li><a href="/?lang=lo" class="hidden" onclick="changeLanguage('lo'); return false;"><?=lang('App.language_me', [], 'lo')?></a></li>
                <li><a href="/?lang=km" class="hidden" onclick="changeLanguage('km'); return false;"><?=lang('App.language_me', [], 'km')?></a></li>
              <?php endif ?>
            </ul>
          </li>          
          
          <li class="dropdown"><a role="button" href="javascript:void(0)"><span><?=lang('App.tools')?> </span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a id="copy-link" role="button" href="javascript:void(0)" onclick="copyUrl(window.location.href, '<?=lang('App.msg_link_copied')?>')">
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
                <li class="dropdown"><a role="button" href="javascript:void(0)"><span><?=lang('App.admin')?></span> <i class="bi bi-chevron-down"></i></a>
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

          <li><span class="ps-4"></a></li>
          
          <li class="dropdown"><a role="button" href="javascript:void(0)"><span><?=lang('App.ancient_path')?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a role="button" href="javascript:void(0)"><span><?=lang('App.dc_pi')?></span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="/article/dn"><?=lang('App.dc_pi_long')?></a></li>
                  <li><a href="/article/mn"><?=lang('App.dc_pi_middle')?></a></li>
                  <li><a href="/article/sn"><?=lang('App.dc_pi_linked')?></a></li>
                  <li><a href="/article/an"><?=lang('App.dc_pi_numbered')?></a></li>
                  <li><a href="/article/kn"><?=lang('App.dc_pi_minor')?></a></li>
                </ul>
              </li>
              <li class="dropdown"><a role="button" href="javascript:void(0)"><span><?=lang('App.dc_zh')?></span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="/article/da"><?=lang('App.dc_zh_long')?></a></li>
                  <li><a href="/article/ma"><?=lang('App.dc_zh_middle')?></a></li>
                  <li><a href="/article/sa"><?=lang('App.dc_zh_linked')?></a></li>
                  <li><a href="/article/ea"><?=lang('App.dc_zh_numbered')?></a></li>
                </ul>
              </li>
              <li><a href="/article/sot"><?=lang('App.sutta_other')?></a></li>
            </ul>
          </li>
          
          <li class="dropdown"><a role="button" href="javascript:void(0)"><span><?=lang('App.weed')?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/article/vin"><?=lang('App.law')?></a></li>
              <li class="dropdown"><a role="button" href="javascript:void(0)"><span><?=lang('App.analysis')?></span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="/article/int"><?=lang('App.internal')?></a></li>
                  <li><a href="/article/ext"><?=lang('App.external')?></a></li>
                </ul>
              </li>
              <li><a href="/article/ref"><?=lang('App.references')?></a></li>
              <li><a href="/article/his"><?=lang('App.history')?></a></li>
              <li><a href="/#discussions" class="nav-link dropdown-outlaw"><?=lang('App.niraya_umibe')?></a></li>
            </ul>
          </li>
          
          <li><span class="ps-4"></a></li>

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