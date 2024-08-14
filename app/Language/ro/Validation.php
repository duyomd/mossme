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
    'noRuleSets'      => 'Niciun set de reguli specificat în configurația de validare.',
    'ruleNotFound'    => '"{0}" nu este o regulă validă.',
    'groupNotFound'   => '"{0}" nu este un grup de reguli de validare.',
    'groupNotArray'   => 'Grupul de reguli "{0}" trebuie să fie un array.',
    'invalidTemplate' => '"{0}" nu este un șablon de validare valid.',

    // Rule Messages
    'alpha'                 => 'Câmpul {field} poate conține doar caractere alfabetice.',
    'alpha_dash'            => 'Câmpul {field} poate conține doar caractere alfanumerice, underscore și dash.',
    'alpha_numeric'         => 'Câmpul {field} poate conține doar caractere alfanumerice.',
    'alpha_numeric_punct'   => 'Câmpul {field} poate conține doar caractere alfanumerice, spații și caractere ~ ! # $ % & * - _ + = | : .',
    'alpha_numeric_space'   => 'Câmpul {field} poate conține doar caractere alfanumerice și spații.',
    'alpha_space'           => 'Câmpul {field} poate conține doar caractere alfabetice și spații.',
    'decimal'               => 'Câmpul {field} trebuie să conțină un număr zecimal.',
    'differs'               => 'Câmpul {field} trebuie să fie diferit de câmpul {param}.',
    'equals'                => 'Câmpul {field} trebuie să fie exact: {param}.',
    'exact_length'          => 'Câmpul {field} trebuie să aibă exact {param} caractere în lungime.',
    'greater_than'          => 'Câmpul {field} trebuie să conțină un număr mai mare decât {param}.',
    'greater_than_equal_to' => 'Câmpul {field} trebuie să conțină un număr mai mare sau egal cu {param}.',
    'hex'                   => 'Câmpul {field} poate conține doar caractere hexadecimale.',
    'in_list'               => 'Câmpul {field} trebuie să fie unul dintre: {param}.',
    'integer'               => 'Câmpul {field} trebuie să conțină un număr întreg.',
    'is_natural'            => 'Câmpul {field} trebuie să conțină doar cifre.',
    'is_natural_no_zero'    => 'Câmpul {field} trebuie să conțină doar cifre și trebuie să fie mai mare decât zero.',
    'is_not_unique'         => 'Câmpul {field} trebuie să conțină o valoare existentă anterior în baza de date.',
    'is_unique'             => 'Câmpul {field} trebuie să conțină o valoare unică.',
    'less_than'             => 'Câmpul {field} trebuie să conțină un număr mai mic decât {param}.',
    'less_than_equal_to'    => 'Câmpul {field} trebuie să conțină un număr mai mic sau egal cu {param}.',
    'matches'               => 'Câmpul {field} nu se potrivește cu câmpul {param}.',
    'max_length'            => 'Câmpul {field} nu poate depăși {param} caractere în lungime.',
    'min_length'            => 'Câmpul {field} trebuie să aibă cel puțin {param} caractere în lungime.',
    'not_equals'            => 'Câmpul {field} nu poate fi: {param}.',
    'not_in_list'           => 'Câmpul {field} nu trebuie să fie unul dintre: {param}.',
    'numeric'               => 'Câmpul {field} trebuie să conțină doar numere.',
    'regex_match'           => 'Câmpul {field} nu este în formatul corect.',
    'required'              => 'Câmpul {field} este obligatoriu.',
    'required_with'         => 'Câmpul {field} este obligatoriu atunci când {param} este prezent.',
    'required_without'      => 'Câmpul {field} este obligatoriu atunci când {param} nu este prezent.',
    'string'                => 'Câmpul {field} trebuie să fie un șir de caractere valid.',
    'timezone'              => 'Câmpul {field} trebuie să fie un fus orar valid.',
    'valid_base64'          => 'Câmpul {field} trebuie să fie un șir base64 valid.',
    'valid_email'           => 'Câmpul {field} trebuie să conțină o adresă de email validă.',
    'valid_emails'          => 'Câmpul {field} trebuie să conțină toate adresele de email valide.',
    'valid_ip'              => 'Câmpul {field} trebuie să conțină un IP valid.',
    'valid_url'             => 'Câmpul {field} trebuie să conțină un URL valid.',
    'valid_url_strict'      => 'Câmpul {field} trebuie să conțină un URL valid.',
    'valid_date'            => 'Câmpul {field} trebuie să conțină o dată validă.',
    'valid_json'            => 'Câmpul {field} trebuie să conțină un JSON valid.',

    // Credit Cards
    'valid_cc_num' => '{field} nu pare să fie un număr de card de credit valid.',

    // Files
    'uploaded' => '{field} nu este un fișier încărcat valid.',
    'max_size' => '{field} este un fișier prea mare.',
    'is_image' => '{field} nu este un fișier imagine valid încărcat.',
    'mime_in'  => '{field} nu are un tip MIME valid.',
    'ext_in'   => '{field} nu are o extensie de fișier validă.',
    'max_dims' => '{field} nu este o imagine sau este prea lată ori prea înaltă.',
];
