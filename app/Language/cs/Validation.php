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
    'noRuleSets'      => 'V konfiguračním nastavení validace nejsou specifikována žádná pravidla.',
    'ruleNotFound'    => '"{0}" není platné pravidlo.',
    'groupNotFound'   => '"{0}" není skupina validačních pravidel.',
    'groupNotArray'   => '"{0}" skupina pravidel musí být pole.',
    'invalidTemplate' => '"{0}" není platná šablona validace.',

    // Rule Messages
    'alpha'                 => 'Pole {field} může obsahovat pouze písmena.',
    'alpha_dash'            => 'Pole {field} může obsahovat pouze alfanumerické znaky, podtržítka a pomlčky.',
    'alpha_numeric'         => 'Pole {field} může obsahovat pouze alfanumerické znaky.',
    'alpha_numeric_punct'   => 'Pole {field} může obsahovat pouze alfanumerické znaky, mezery a ~ ! # $ % & * - _ + = | : . znaky.',
    'alpha_numeric_space'   => 'Pole {field} může obsahovat pouze alfanumerické znaky a mezery.',
    'alpha_space'           => 'Pole {field} může obsahovat pouze písmena a mezery.',
    'decimal'               => 'Pole {field} musí obsahovat desetinné číslo.',
    'differs'               => 'Pole {field} se musí lišit od pole {param}.',
    'equals'                => 'Pole {field} musí být přesně: {param}.',
    'exact_length'          => 'Pole {field} musí mít přesně {param} znaků.',
    'greater_than'          => 'Pole {field} musí obsahovat číslo větší než {param}.',
    'greater_than_equal_to' => 'Pole {field} musí obsahovat číslo větší nebo rovno {param}.',
    'hex'                   => 'Pole {field} může obsahovat pouze hexadecimální znaky.',
    'in_list'               => 'Pole {field} musí být jedním z: {param}.',
    'integer'               => 'Pole {field} musí obsahovat celé číslo.',
    'is_natural'            => 'Pole {field} může obsahovat pouze číslice.',
    'is_natural_no_zero'    => 'Pole {field} může obsahovat pouze číslice a musí být větší než nula.',
    'is_not_unique'         => 'Pole {field} musí obsahovat dříve existující hodnotu v databázi.',
    'is_unique'             => 'Pole {field} musí obsahovat unikátní hodnotu.',
    'less_than'             => 'Pole {field} musí obsahovat číslo menší než {param}.',
    'less_than_equal_to'    => 'Pole {field} musí obsahovat číslo menší nebo rovno {param}.',
    'matches'               => 'Pole {field} se neshoduje s polem {param}.',
    'max_length'            => 'Pole {field} nemůže překročit {param} znaků.',
    'min_length'            => 'Pole {field} musí mít alespoň {param} znaků.',
    'not_equals'            => 'Pole {field} nemůže být: {param}.',
    'not_in_list'           => 'Pole {field} nesmí být jedním z: {param}.',
    'numeric'               => 'Pole {field} musí obsahovat pouze čísla.',
    'regex_match'           => 'Pole {field} není ve správném formátu.',
    'required'              => 'Pole {field} je povinné.',
    'required_with'         => 'Pole {field} je povinné, když je přítomno {param}.',
    'required_without'      => 'Pole {field} je povinné, když není přítomno {param}.',
    'string'                => 'Pole {field} musí být platný řetězec.',
    'timezone'              => 'Pole {field} musí být platná časová zóna.',
    'valid_base64'          => 'Pole {field} musí být platný base64 řetězec.',
    'valid_email'           => 'Pole {field} musí obsahovat platnou e-mailovou adresu.',
    'valid_emails'          => 'Pole {field} musí obsahovat všechny platné e-mailové adresy.',
    'valid_ip'              => 'Pole {field} musí obsahovat platnou IP adresu.',
    'valid_url'             => 'Pole {field} musí obsahovat platnou URL.',
    'valid_url_strict'      => 'Pole {field} musí obsahovat platnou URL.',
    'valid_date'            => 'Pole {field} musí obsahovat platné datum.',
    'valid_json'            => 'Pole {field} musí obsahovat platný JSON.',

    // Credit Cards
    'valid_cc_num' => '{field} se nezdá být platné číslo kreditní karty.',

    // Files
    'uploaded' => '{field} není platný nahraný soubor.',
    'max_size' => '{field} je příliš velký soubor.',
    'is_image' => '{field} není platný nahraný obrázkový soubor.',
    'mime_in'  => '{field} nemá platný mime typ.',
    'ext_in'   => '{field} nemá platnou příponu souboru.',
    'max_dims' => '{field} buď není obrázek, nebo je příliš široký či vysoký.',
];
