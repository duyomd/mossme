<?php

namespace App\Controllers;

use App\Models\CardModel;
use App\Models\CardTranslationModel;
use App\Models\TranslationModel;
use App\Helpers\Utilities;

class Dhamma extends BaseController
{
    public function index(): string
    {
        $user_lang_code = Utilities::getSessionLocale();

        // menu items
        $translationModel = model(TranslationModel::class);
        $suttaMenuTranslations = $translationModel->getSuttaMenu($user_lang_code);
        $nonSuttaMenuTranslations = $translationModel->getNonSuttaMenu($user_lang_code);

        // event cards
        $card_seqs = $this->shuffleDeck(model(CardModel::class)->getActiveCardCount());
        $cardTranslations = model(CardTranslationModel::class)
                                ->getCardTranslationsBySequences($card_seqs, $user_lang_code);
        
        $data = [
            'displayHeader'             => lang('App.ancient_path'),
            'suttaMenuTranslations'     => $suttaMenuTranslations,
            'nonSuttaMenuTranslations'  => $nonSuttaMenuTranslations,
            'cardTranslations'          => $cardTranslations,
        ];
        return view('templates/header', $data).view('dhamma');
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
}
