<?php

namespace App\Helpers;

class Utilities
{  
    public const TYPE_FOLDER    = "0";
    public const TYPE_FILE      = "1";

    public const STATUS_ACTIVE     = 1;

    public const SERIALS_DELIMETER  = " ";
    public const URL_ARTICLE        = "/article/";

    public const EVENT_DEFAULT_NUM  = 3;
    public const EVENT_NUMS         = [0, 1, 3];

    public const NEWFEED_DEFAULT_NUM    = 5;
    public const NEWFEED_NUMS           = [0, 3, 5, 7, 9];

    public const DEFAULT_LANGUAGES = ["en", "vi", "zh", "pi"];
    public const DEFAULT_LANGUAGE  = "en";

    public const THEME_DEFAULT          = "dark";
    public const LITE_MODE_DEFAULT      = 0;

    public const PAGINATION_DEFAULT_RPP     = 10;
    public const PAGINATION_MAX_NUM         = 9;    // TODO: too many pages will break layout => [<][1][2]...[20][>]
    public const PAGINATION_RPPS            = [5, 10, 25, 50, 100];

    public const SECTION_ID_NIKAYA      = 1;
    public const SECTION_ID_AGAMA       = 2;
    public const SECTION_ID_OUTLAW      = 6;
    public const SECTION_ID_HISTORY     = 7;
    public const SECTION_IDS_MENU_SUTTA = [self::SECTION_ID_NIKAYA, 
                                           self::SECTION_ID_AGAMA, 
                                           self::SECTION_ID_HISTORY];

    public const IMAGE_FOLDER_BACKGROUND    = 'background';
    public const IMAGE_FOLDER_MENU          = 'menu';
    public const IMAGE_FOLDER_DISCUSSIONS   = 'discussions'; 
    
    private const LANGUAGES_RTL                 = ["he"];
    private const LANGUAGES_TITLE_REVERSE       = ["ja", "cn", "zh", "ko", 
                                                    "hi", "gu", "kn", "mr", "ta", "bn",
                                                    "si", "my",
                                                    "hu", "sv", "fi", "tr"];  
    private const LANGUAGES_TITLE_TALL          = ["my"];
    
    /**
     * encode some special characters
     */
    public static function encodeDataHtml($srcStr = null, $slash = true) 
    {
        $result = $srcStr;
        if (isset($srcStr) && strlen($srcStr) > 0) {
            // line break
            // $result = nl2br($result);
            $result = str_replace(array("\r\n", "\r", "\n"), "<br>", $result);
            // ' " \ 
            if ($slash) $result = addslashes($result);
        }
        return $result;
    }

    /**
     * Datetime to string
     */
    public static function formatDatetime($date, $format = null) {
        if (isset($date) && !is_string($date)) {
            try {
                if (!isset($format)) $format = 'Y-m-d H:i:s';
                return $date->format($format);
            } catch (\Exception $e) {
                return $date;
            }
        }
        return $date;
    }

    /**
     * set locale value to session
     */
    public static function getSessionLocale(): string
    {
        $session = session();
        if (!isset($session) || !isset($session->lang)) return self::DEFAULT_LANGUAGE;
        return $session->lang;
    }

    public static function setSessionLocale($lang = null)
    {
        $session = session();
        if (!isset($session)) return;
        $session->set('lang', $lang);
    }

    /**
     * Number of rows per list page
     */
    public static function getSessionRpp(): int
    {
        $session = session();
        if (!isset($session) || !isset($session->rpp)) return self::PAGINATION_DEFAULT_RPP;
        return $session->rpp;
    }

    public static function setSessionRpp($rpp = null)
    {
        $session = session();
        if (!isset($session)) return;
        $session->set('rpp', $rpp);
    }

    public static function getSessionNoc(): int
    {
        $session = session();
        if (!isset($session) || !isset($session->noc)) return self::EVENT_DEFAULT_NUM;
        return $session->noc;
    }

    public static function setSessionNoc($noc = null)
    {
        $session = session();
        if (!isset($session)) return;
        $session->set('noc', $noc);
    }

    public static function getSessionNof(): int
    {
        $session = session();
        if (!isset($session) || !isset($session->nof)) return self::NEWFEED_DEFAULT_NUM;
        return $session->nof;
    }

    public static function setSessionNof($nof = null)
    {
        $session = session();
        if (!isset($session)) return;
        $session->set('nof', $nof);
    }

    public static function getSessionTheme(): string
    {
        $session = session();
        if (!isset($session) || !isset($session->theme)) return self::THEME_DEFAULT;
        return $session->theme;
    }

    public static function setSessionTheme($theme = null)
    {
        $session = session();
        if (!isset($session)) return;
        $session->set('theme', $theme);
    }

    public static function getSessionLiteMode(): int
    {
        $session = session();
        if (!isset($session) || !isset($session->liteMode)) return self::LITE_MODE_DEFAULT;
        return $session->liteMode;
    }

    public static function setSessionLiteMode($liteMode = null)
    {
        $session = session();
        if (!isset($session)) return;
        $session->set('liteMode', $liteMode);
    }

    public static function setSessionUserSettings($userSettings) {
        if (!isset($userSettings)) return;
        self::setSessionLocale($userSettings->language_code);
        self::setSessionRpp($userSettings->rows_per_page);
        self::setSessionNoc($userSettings->num_of_cards);
        self::setSessionNof($userSettings->num_of_feeds);
        self::setSessionTheme($userSettings->theme_code);
        self::setSessionLiteMode($userSettings->lite_mode);
    }

    public static function createLanguageArray(string $user_language_code) {
        $langs = self::DEFAULT_LANGUAGES;
        array_push($langs, $user_language_code);
        return $langs;
    }

    public static function createHtmlValidatedMsg($msgs) {
        $html = '';
        if (isset($msgs)) {
            if (count((array)$msgs) > 1) {
                $html = '<ul>';
                foreach ($msgs as $msg_key => $msg_value) {
                    $html = $html . '<li>' . $msg_value . '</li>';
                }
                $html = $html . '</ul>';
            } else {
                foreach ($msgs as $msg_key => $msg_value) {
                    $html = $msg_value;
                    break;
                }
            }
        }
        return $html;
    }

    public static function createHtmlDbError($dbError) {
        $errString = '';
        if (isset($dbError)) {            
            foreach ($dbError as $errKey => $errVal) { 
                if (!empty($errString)) {
                    $errString = $errString . '<br>';  
                }
                $errString = $errString . $errKey . ': ' . $errVal;
            }        
        }
        return $errString;
    }

    public static function shortenString($original, $length) {
        if (!isset($length) || $length < 0) return $original;
        $short = $original;
        if (isset($short) && strlen($short) > 0 && strlen($short) > $length) {
            $short = substr($short, 0, $length);
            if (!str_ends_with($short, lang('App.ellipsis'))) {
                $short = $short . lang('App.ellipsis');
            };
        }
        return $short;
    }

    public static function isNullOrBlank($src) {
        if (!isset($src)) return true;
        if (is_string($src)) {
            if (strlen(trim($src)) <= 0) {
                return true;
            }
        }   
        return false;
    }

    public static function trimInput($src) {
        if (self::isNullOrBlank($src)) return null;
        return trim($src);
    }

    public static function isRightToLeft() {
        return in_array(self::getSessionLocale(), self::LANGUAGES_RTL);
    }

    public static function isRevertibleTitle() {
        return in_array(self::getSessionLocale(), self::LANGUAGES_TITLE_REVERSE);
    }

    public static function isTallTitle() {
        return in_array(self::getSessionLocale(), self::LANGUAGES_TITLE_TALL);
    }

    /*
    public static function urlExists($fullUrl) {
        $file_headers = @get_headers($fullUrl);
        if($file_headers && !strpos($file_headers[0], '404')) {
            return true;
        }
        return false;
    }
    */
    
}