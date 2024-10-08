<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\Dhamma;
use App\Controllers\Credits;
use App\Controllers\Contact;
use App\Controllers\Article;
use App\Controllers\ArticleGroup;
use App\Controllers\LanguageManager;
use App\Controllers\MessageManager;
use App\Controllers\ImageUrlManager;
use App\Controllers\EntryManager;
use App\Controllers\TranslationManager;
use App\Controllers\CommentaryManager;
use App\Controllers\CardManager;
use App\Controllers\CardTranslationManager;
use App\Controllers\BookmarkManager;
use App\Controllers\UserManager;
use App\Controllers\Ajax;
use App\Controllers\ChangePassword;
use App\Controllers\MagicLink;
use App\Controllers\UserSettings;
use App\Controllers\Search;
use App\Controllers\Captcha;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Dhamma::class, 'index']);

$routes->get('credits', [Credits::class, 'index']);

$routes->get('contact', [Contact::class, 'index']);
$routes->post('contact', [Contact::class, 'save']);

$routes->get('article/(:segment)', [Article::class, 'show']);
$routes->get('article/(:segment)/forward=(:alpha)/(:segment)/', [Article::class, 'show']);

$routes->get('article-group/(:segment)', [ArticleGroup::class, 'show']);

$routes->get('userSettings', [UserSettings::class, 'show']);
$routes->post('userSettings', [UserSettings::class, 'action']);

$routes->post('bookmarks/menu', [BookmarkManager::class, 'bookmarkInsert']);
$routes->get('bookmarks', [BookmarkManager::class, 'show']);
$routes->get('bookmarks/p=(:segment)/orderby=(:segment)/sortorder=(:segment)/conditions=(:segment)', [BookmarkManager::class, 'changePage']);
$routes->get('bookmarks/(:segment)', [BookmarkManager::class, 'ajaxFind']);
$routes->post('bookmarks', [BookmarkManager::class, 'ajaxSubmit']);

$routes->get('search', [Search::class, 'show']);
$routes->get('search/p=(:segment)/orderby=(:segment)/sortorder=(:segment)/conditions=(:segment)', [Search::class, 'changePage']);
$routes->post('search', [Search::class, 'action']);

$routes->get('languages', [LanguageManager::class, 'index']);
$routes->get('languages/p=(:segment)/orderby=(:segment)/sortorder=(:segment)/conditions=(:segment)', [LanguageManager::class, 'changePage']);
$routes->get('languages/(:segment)', [LanguageManager::class, 'ajaxFind']);
$routes->post('languages', [LanguageManager::class, 'ajaxSubmit']);

$routes->get('messages', [MessageManager::class, 'show']);
$routes->get('messages/p=(:segment)/orderby=(:segment)/sortorder=(:segment)/conditions=(:segment)', [MessageManager::class, 'changePage']);
$routes->get('messages/id=(:segment)/p=(:segment)/orderby=(:segment)/sortorder=(:segment)/conditions=(:segment)', [MessageManager::class, 'markAsRead']);
$routes->get('messages/(:segment)', [MessageManager::class, 'ajaxFind']);
$routes->post('messages', [MessageManager::class, 'ajaxSubmit']);

$routes->get('imageUrls', [ImageUrlManager::class, 'show']);
$routes->get('imageUrls/p=(:segment)/orderby=(:segment)/sortorder=(:segment)/conditions=(:segment)', [ImageUrlManager::class, 'changePage']);
$routes->get('imageUrls/(:segment)', [ImageUrlManager::class, 'ajaxFind']);
$routes->post('imageUrls', [ImageUrlManager::class, 'ajaxSubmit']);

$routes->get('users', [UserManager::class, 'show']);
$routes->get('users/p=(:segment)/orderby=(:segment)/sortorder=(:segment)/conditions=(:segment)', [UserManager::class, 'changePage']);
$routes->get('users/(:segment)', [UserManager::class, 'ajaxFind']);
$routes->post('users', [UserManager::class, 'ajaxSubmit']);

$routes->get('entries', [EntryManager::class, 'show']);
$routes->get('entries/conditions=(:segment)', [EntryManager::class, 'show']);
$routes->get('entries/p=(:segment)/orderby=(:segment)/sortorder=(:segment)/conditions=(:segment)', [EntryManager::class, 'changePage']);
$routes->get('entries/(:segment)', [EntryManager::class, 'ajaxFind']);
$routes->post('entries', [EntryManager::class, 'ajaxSubmit']);

$routes->get('translations', [TranslationManager::class, 'show']);
$routes->get('translations/conditions=(:segment)', [TranslationManager::class, 'show']);
$routes->get('translations/p=(:segment)/orderby=(:segment)/sortorder=(:segment)/conditions=(:segment)', [TranslationManager::class, 'changePage']);
$routes->get('translations/(:segment)', [TranslationManager::class, 'ajaxFind']);
$routes->post('translations', [TranslationManager::class, 'ajaxSubmit']);

$routes->get('commentaries', [CommentaryManager::class, 'show']);
$routes->get('commentaries/conditions=(:segment)', [CommentaryManager::class, 'show']);
$routes->get('commentaries/p=(:segment)/orderby=(:segment)/sortorder=(:segment)/conditions=(:segment)', [CommentaryManager::class, 'changePage']);
$routes->get('commentaries/(:segment)', [CommentaryManager::class, 'ajaxFind']);
$routes->post('commentaries', [CommentaryManager::class, 'ajaxSubmit']);

$routes->get('cards', [CardManager::class, 'show']);
$routes->get('cards/p=(:segment)/orderby=(:segment)/sortorder=(:segment)/conditions=(:segment)', [CardManager::class, 'changePage']);
$routes->get('cards/(:segment)', [CardManager::class, 'ajaxFind']);
$routes->post('cards', [CardManager::class, 'ajaxSubmit']);

$routes->get('cardTranslations', [CardTranslationManager::class, 'show']);
$routes->get('cardTranslations/conditions=(:segment)', [CardTranslationManager::class, 'show']);
$routes->get('cardTranslations/p=(:segment)/orderby=(:segment)/sortorder=(:segment)/conditions=(:segment)', [CardTranslationManager::class, 'changePage']);
$routes->get('cardTranslations/(:segment)', [CardTranslationManager::class, 'ajaxFind']);
$routes->post('cardTranslations', [CardTranslationManager::class, 'ajaxSubmit']);

$routes->get('lang=(:segment)', [Ajax::class, 'changeLanguage']);
$routes->get('theme=(:segment)', [Ajax::class, 'changeTheme']);
$routes->get('parallels=(:segment)', [Ajax::class, 'loadParallels']);
$routes->get('articleContent/type=(:segment)/id=(:segment)', [Ajax::class, 'loadArticleContent']);
$routes->get('rpp=(:alphanum)/conditions=(:segment)/url=(:any)', [Ajax::class, 'changeRowsPerPage']);

service('auth')->routes($routes, ['except' => ['magic-link']]);
$routes->get('login/magic-link', [MagicLink::class, 'loginView'], ['as' => 'magic-link']);
$routes->post('login/magic-link', [MagicLink::class, 'loginAction']);
$routes->get('login/verify-magic-link', [MagicLink::class, 'verify'], ['as' => 'verify-magic-link']);

$routes->get('changePassword', [ChangePassword::class, 'show'], ['as' => 'change_password']);
$routes->post('changePassword', [ChangePassword::class, 'action']);

$routes->get('captcha', [Captcha::class, 'show']);

// TODO:
// page not found?
$routes->get('(:any)', [Dhamma::class, 'index']);