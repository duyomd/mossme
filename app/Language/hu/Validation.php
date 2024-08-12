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
    'noRuleSets'      => 'Nincsenek szabálykészletek megadva az Érvényesítési konfigurációban.',
    'ruleNotFound'    => '"{0}" nem érvényes szabály.',
    'groupNotFound'   => '"{0}" nem egy érvényes érvényesítési szabálycsoport.',
    'groupNotArray'   => '"{0}" szabálycsoportnak tömbnek kell lennie.',
    'invalidTemplate' => '"{0}" nem érvényes Érvényesítési sablon.',

    // Rule Messages
    'alpha'                 => 'A {field} mező csak betűket tartalmazhat.',
    'alpha_dash'            => 'A {field} mező csak alfanumerikus karaktereket, aláhúzásjeleket és kötőjeleket tartalmazhat.',
    'alpha_numeric'         => 'A {field} mező csak alfanumerikus karaktereket tartalmazhat.',
    'alpha_numeric_punct'   => 'A {field} mező csak alfanumerikus karaktereket, szóközöket és ~ ! # $ % & * - _ + = | : . karaktereket tartalmazhat.',
    'alpha_numeric_space'   => 'A {field} mező csak alfanumerikus karaktereket és szóközöket tartalmazhat.',
    'alpha_space'           => 'A {field} mező csak betűket és szóközöket tartalmazhat.',
    'decimal'               => 'A {field} mezőnek tizedes számot kell tartalmaznia.',
    'differs'               => 'A {field} mezőnek különböznie kell a {param} mezőtől.',
    'equals'                => 'A {field} mezőnek pontosan: {param} kell lennie.',
    'exact_length'          => 'A {field} mezőnek pontosan {param} karakter hosszúnak kell lennie.',
    'greater_than'          => 'A {field} mezőnek nagyobb számot kell tartalmaznia, mint {param}.',
    'greater_than_equal_to' => 'A {field} mezőnek nagyobb vagy egyenlő számot kell tartalmaznia, mint {param}.',
    'hex'                   => 'A {field} mező csak hexadecimális karaktereket tartalmazhat.',
    'in_list'               => 'A {field} mezőnek az alábbiak egyike kell, hogy legyen: {param}.',
    'integer'               => 'A {field} mezőnek egész számot kell tartalmaznia.',
    'is_natural'            => 'A {field} mező csak számjegyeket tartalmazhat.',
    'is_natural_no_zero'    => 'A {field} mezőnek csak számjegyeket kell tartalmaznia, és nagyobbnak kell lennie nullánál.',
    'is_not_unique'         => 'A {field} mezőnek olyan értéket kell tartalmaznia, amely korábban létezett az adatbázisban.',
    'is_unique'             => 'A {field} mezőnek egyedi értéket kell tartalmaznia.',
    'less_than'             => 'A {field} mezőnek kisebb számot kell tartalmaznia, mint {param}.',
    'less_than_equal_to'    => 'A {field} mezőnek kisebb vagy egyenlő számot kell tartalmaznia, mint {param}.',
    'matches'               => 'A {field} mező nem egyezik a {param} mezővel.',
    'max_length'            => 'A {field} mező hossza nem haladhatja meg a {param} karaktert.',
    'min_length'            => 'A {field} mezőnek legalább {param} karakter hosszúnak kell lennie.',
    'not_equals'            => 'A {field} mező nem lehet: {param}.',
    'not_in_list'           => 'A {field} mező nem lehet egyike az alábbiaknak: {param}.',
    'numeric'               => 'A {field} mező csak számokat tartalmazhat.',
    'regex_match'           => 'A {field} mező nincs a helyes formátumban.',
    'required'              => 'A {field} mező kitöltése kötelező.',
    'required_with'         => 'A {field} mező kitöltése kötelező, ha a {param} jelen van.',
    'required_without'      => 'A {field} mező kitöltése kötelező, ha a {param} nincs jelen.',
    'string'                => 'A {field} mező érvényes szövegnek kell lennie.',
    'timezone'              => 'A {field} mezőnek érvényes időzónának kell lennie.',
    'valid_base64'          => 'A {field} mezőnek érvényes base64 stringnek kell lennie.',
    'valid_email'           => 'A {field} mezőnek érvényes e-mail címet kell tartalmaznia.',
    'valid_emails'          => 'A {field} mezőnek érvényes e-mail címeket kell tartalmaznia.',
    'valid_ip'              => 'A {field} mezőnek érvényes IP címet kell tartalmaznia.',
    'valid_url'             => 'A {field} mezőnek érvényes URL-t kell tartalmaznia.',
    'valid_url_strict'      => 'A {field} mezőnek érvényes URL-t kell tartalmaznia.',
    'valid_date'            => 'A {field} mezőnek érvényes dátumot kell tartalmaznia.',
    'valid_json'            => 'A {field} mezőnek érvényes json-t kell tartalmaznia.',

    // Credit Cards
    'valid_cc_num' => '{field} nem tűnik érvényes hitelkártyaszámnak.',

    // Files
    'uploaded' => '{field} nem érvényes feltöltött fájl.',
    'max_size' => '{field} fájl túl nagy.',
    'is_image' => '{field} nem érvényes, feltöltött képfájl.',
    'mime_in'  => '{field} nem rendelkezik érvényes mime típussal.',
    'ext_in'   => '{field} nem rendelkezik érvényes fájlkiterjesztéssel.',
    'max_dims' => '{field} vagy nem kép, vagy túl széles vagy magas.',
];
