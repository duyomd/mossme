<?php

namespace App\Controllers;

use App\Models\CardModel;
use App\Models\CardTranslationModel;
use App\Models\TranslationModel;
use App\Helpers\Utilities;
use App\Config\App;

class Dhamma extends BaseController
{
    public function index(): string
    {
        $user_lang_code = Utilities::getSessionLocale();
        $numOfFeeds = Utilities::getSessionNof();

        // menu items
        $translationModel = model(TranslationModel::class);
        $suttaMenuTranslations = $translationModel->getSuttaMenu($user_lang_code);
        $nonSuttaMenuTranslations = $translationModel->getNonSuttaMenu($user_lang_code);

        // new feed items
        $newFeedTranslations = $translationModel->getNewFeeds($user_lang_code, $numOfFeeds);

        // event cards
        $card_seqs = $this->shuffleDeck(model(CardModel::class)->getActiveCardCount());
        $cardTranslations = model(CardTranslationModel::class)
                                ->getCardTranslationsBySequences($card_seqs, $user_lang_code);
        
        $data = [
            'displayHeader'             => lang('App.ancient_path'),
            'description'               => lang('App.description_home'),
            'suttaMenuTranslations'     => $suttaMenuTranslations,
            'nonSuttaMenuTranslations'  => $nonSuttaMenuTranslations,
            'cardTranslations'          => $cardTranslations,
            'newFeedTranslations'       => $newFeedTranslations,
            'hrefLangs'                 => $this->createHrefLangs(),
        ];
        return view('templates/header', array_merge($this->data, $data)).view('dhamma');
    }

    /**
     * random events
     */
    private function shuffleDeck($max) {
        $seqs = array();
        $start = 1;
        $noc = Utilities::getSessionNoc();

        if ($max <= $noc) {
            for ($i = $start; $i <= $max; $i++) {
                array_push($seqs, $i);
            }
        } else {
            //
            for ($i = $start; $i <= $noc; $i++) {
                while (true) {
                    $random = rand(1, $max);
                    if (!in_array($random, $seqs)) {
                        array_push($seqs, $random);
                        break;
                    }
                }
            }
        }
        
        return $seqs;
    }

    /**
     * create hreflang links for SEO purpose
     */
    private function createHrefLangs() 
    {        
        $hrefLangs = array();
        $baseUrl = base_url();
        $locales = config(App::class)->supportedLocales;
        foreach($locales as $lo) {
            if ($lo != 'sa' && $lo != 'pi') {
                $hrefLang = new \stdClass;
                $hrefLang->lang = $lo;
                $hrefLang->url  = $baseUrl . '?lang=' . $lo;
                array_push($hrefLangs, $hrefLang);
            }
        }
        return $hrefLangs;
    }

}
