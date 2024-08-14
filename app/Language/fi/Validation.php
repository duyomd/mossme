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
    'noRuleSets'      => 'Validation-konfiguraatiossa ei ole määritetty sääntöjoukkoja.',
    'ruleNotFound'    => '"{0}" ei ole voimassa oleva sääntö.',
    'groupNotFound'   => '"{0}" ei ole validoimisryhmä.',
    'groupNotArray'   => '"{0}" sääntöryhmän täytyy olla taulukko.',
    'invalidTemplate' => '"{0}" ei ole voimassa oleva Validation-malli.',

    // Rule Messages
    'alpha'                 => '{field} -kenttä voi sisältää vain aakkosellisia merkkejä.',
    'alpha_dash'            => '{field} -kenttä voi sisältää vain alfanumeerisia merkkejä, alaviivoja ja viivoja.',
    'alpha_numeric'         => '{field} -kenttä voi sisältää vain alfanumeerisia merkkejä.',
    'alpha_numeric_punct'   => '{field} -kenttä voi sisältää vain alfanumeerisia merkkejä, välejä ja merkkejä ~ ! # $ % & * - _ + = | : .',
    'alpha_numeric_space'   => '{field} -kenttä voi sisältää vain alfanumeerisia merkkejä ja välejä.',
    'alpha_space'           => '{field} -kenttä voi sisältää vain aakkosellisia merkkejä ja välejä.',
    'decimal'               => '{field} -kenttä täytyy sisältää desimaaliluku.',
    'differs'               => '{field} -kenttä täytyy poiketa {param} -kentästä.',
    'equals'                => '{field} -kentän täytyy olla tarkalleen: {param}.',
    'exact_length'          => '{field} -kentän täytyy olla tarkalleen {param} merkkiä pitkä.',
    'greater_than'          => '{field} -kentän täytyy sisältää luku, joka on suurempi kuin {param}.',
    'greater_than_equal_to' => '{field} -kentän täytyy sisältää luku, joka on suurempi tai yhtä suuri kuin {param}.',
    'hex'                   => '{field} -kenttä voi sisältää vain heksadesimaalisia merkkejä.',
    'in_list'               => '{field} -kenttä täytyy olla yksi seuraavista: {param}.',
    'integer'               => '{field} -kenttä täytyy sisältää kokonaisluku.',
    'is_natural'            => '{field} -kenttä voi sisältää vain numeroita.',
    'is_natural_no_zero'    => '{field} -kenttä voi sisältää vain numeroita ja sen täytyy olla suurempi kuin nolla.',
    'is_not_unique'         => '{field} -kenttä täytyy sisältää aiemmin olemassa oleva arvo tietokannassa.',
    'is_unique'             => '{field} -kenttä täytyy sisältää ainutlaatuinen arvo.',
    'less_than'             => '{field} -kenttä täytyy sisältää luku, joka on pienempi kuin {param}.',
    'less_than_equal_to'    => '{field} -kenttä täytyy sisältää luku, joka on pienempi tai yhtä suuri kuin {param}.',
    'matches'               => '{field} -kenttä ei vastaa {param} -kenttää.',
    'max_length'            => '{field} -kenttä ei voi olla pidempi kuin {param} merkkiä.',
    'min_length'            => '{field} -kenttä täytyy olla vähintään {param} merkkiä pitkä.',
    'not_equals'            => '{field} -kenttä ei voi olla: {param}.',
    'not_in_list'           => '{field} -kenttä ei saa olla yksi seuraavista: {param}.',
    'numeric'               => '{field} -kenttä täytyy sisältää vain numeroita.',
    'regex_match'           => '{field} -kenttä ei ole oikeassa muodossa.',
    'required'              => '{field} -kenttä on pakollinen.',
    'required_with'         => '{field} -kenttä on pakollinen, kun {param} on läsnä.',
    'required_without'      => '{field} -kenttä on pakollinen, kun {param} ei ole läsnä.',
    'string'                => '{field} -kenttä täytyy olla voimassa oleva merkkijono.',
    'timezone'              => '{field} -kenttä täytyy olla voimassa oleva aikavyöhyke.',
    'valid_base64'          => '{field} -kenttä täytyy olla voimassa oleva base64-merkkijono.',
    'valid_email'           => '{field} -kenttä täytyy sisältää voimassa oleva sähköpostiosoite.',
    'valid_emails'          => '{field} -kenttä täytyy sisältää kaikki voimassa olevat sähköpostiosoitteet.',
    'valid_ip'              => '{field} -kenttä täytyy sisältää voimassa oleva IP-osoite.',
    'valid_url'             => '{field} -kenttä täytyy sisältää voimassa oleva URL-osoite.',
    'valid_url_strict'      => '{field} -kenttä täytyy sisältää voimassa oleva URL-osoite.',
    'valid_date'            => '{field} -kenttä täytyy sisältää voimassa oleva päivämäärä.',
    'valid_json'            => '{field} -kenttä täytyy sisältää voimassa oleva JSON.',

    // Credit Cards
    'valid_cc_num' => '{field} ei vaikuta olevan voimassa oleva luottokortinnumero.',

    // Files
    'uploaded' => '{field} ei ole voimassa oleva ladattu tiedosto.',
    'max_size' => '{field} on liian suuri tiedosto.',
    'is_image' => '{field} ei ole voimassa oleva ladattu kuvafaili.',
    'mime_in'  => '{field} ei omaa voimassa olevaa mime-tyyppiä.',
    'ext_in'   => '{field} ei omaa voimassa olevaa tiedostopäätettä.',
    'max_dims' => '{field} ei ole kuva, tai se on liian leveä tai korkea.',
];
