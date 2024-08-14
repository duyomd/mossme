<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// Validation language settings
return [
    // Core Messages
    'noRuleSets'      => 'Nėra nustatytų taisyklių rinkinių Validacijos konfigūracijoje.',
    'ruleNotFound'    => '"{0}" nėra galiojanti taisyklė.',
    'groupNotFound'   => '"{0}" nėra taisyklių grupė.',
    'groupNotArray'   => '"{0}" taisyklių grupė turi būti masyvas.',
    'invalidTemplate' => '"{0}" nėra galiojantis Validacijos šablonas.',

        // Rule Messages
    'alpha'                 => 'Laukas {field} gali turėti tik raides.',
    'alpha_dash'            => 'Laukas {field} gali turėti tik alfanumerinius simbolius, pabraukimo ir brūkšnio simbolius.',
    'alpha_numeric'         => 'Laukas {field} gali turėti tik alfanumerinius simbolius.',
    'alpha_numeric_punct'   => 'Laukas {field} gali turėti tik alfanumerinius simbolius, tarpus ir ~ ! # $ % & * - _ + = | : . simbolius.',
    'alpha_numeric_space'   => 'Laukas {field} gali turėti tik alfanumerinius simbolius ir tarpus.',
    'alpha_space'           => 'Laukas {field} gali turėti tik raides ir tarpus.',
    'decimal'               => 'Laukas {field} turi būti dešimtainis skaičius.',
    'differs'               => 'Laukas {field} turi skirtis nuo {param} lauko.',
    'equals'                => 'Laukas {field} turi būti tiksliai: {param}.',
    'exact_length'          => 'Laukas {field} turi būti tiksliai {param} simbolių ilgio.',
    'greater_than'          => 'Laukas {field} turi būti skaičius, didesnis nei {param}.',
    'greater_than_equal_to' => 'Laukas {field} turi būti skaičius, didesnis arba lygus {param}.',
    'hex'                   => 'Laukas {field} gali turėti tik šešioliktainius simbolius.',
    'in_list'               => 'Laukas {field} turi būti vienas iš: {param}.',
    'integer'               => 'Laukas {field} turi būti sveikasis skaičius.',
    'is_natural'            => 'Laukas {field} turi turėti tik skaitmenis.',
    'is_natural_no_zero'    => 'Laukas {field} turi turėti tik skaitmenis ir būti didesnis nei nulis.',
    'is_not_unique'         => 'Laukas {field} turi turėti anksčiau egzistuojančią reikšmę duomenų bazėje.',
    'is_unique'             => 'Laukas {field} turi turėti unikalią reikšmę.',
    'less_than'             => 'Laukas {field} turi būti skaičius, mažesnis nei {param}.',
    'less_than_equal_to'    => 'Laukas {field} turi būti skaičius, mažesnis arba lygus {param}.',
    'matches'               => 'Laukas {field} nesutampa su {param} lauku.',
    'max_length'            => 'Laukas {field} negali viršyti {param} simbolių ilgio.',
    'min_length'            => 'Laukas {field} turi būti bent {param} simbolių ilgio.',
    'not_equals'            => 'Laukas {field} negali būti: {param}.',
    'not_in_list'           => 'Laukas {field} neturi būti vienas iš: {param}.',
    'numeric'               => 'Laukas {field} turi turėti tik skaičius.',
    'regex_match'           => 'Laukas {field} nėra tinkamame formate.',
    'required'              => 'Laukas {field} yra privalomas.',
    'required_with'         => 'Laukas {field} yra privalomas, kai yra {param}.',
    'required_without'      => 'Laukas {field} yra privalomas, kai {param} nėra.',
    'string'                => 'Laukas {field} turi būti galiojantis tekstas.',
    'timezone'              => 'Laukas {field} turi būti galiojanti laiko zona.',
    'valid_base64'          => 'Laukas {field} turi būti galiojantis base64 eilutė.',
    'valid_email'           => 'Laukas {field} turi turėti galiojantį el. pašto adresą.',
    'valid_emails'          => 'Laukas {field} turi turėti visus galiojančius el. pašto adresus.',
    'valid_ip'              => 'Laukas {field} turi turėti galiojantį IP.',
    'valid_url'             => 'Laukas {field} turi turėti galiojantį URL.',
    'valid_url_strict'      => 'Laukas {field} turi turėti galiojantį URL.',
    'valid_date'            => 'Laukas {field} turi turėti galiojančią datą.',
    'valid_json'            => 'Laukas {field} turi turėti galiojantį JSON.',

        // Credit Cards
    'valid_cc_num' => '{field} atrodo kaip negaliojantis kredito kortelės numeris.',

        // Files
    'uploaded' => '{field} nėra galiojantis įkeltas failas.',
    'max_size' => '{field} yra per didelis failas.',
    'is_image' => '{field} nėra galiojantis įkeltas vaizdo failas.',
    'mime_in'  => '{field} neturi galiojančio MIME tipo.',
    'ext_in'   => '{field} neturi galiojančio failo plėtinio.',
    'max_dims' => '{field} nėra vaizdas arba jis yra per platus ar per aukštas.',
];
