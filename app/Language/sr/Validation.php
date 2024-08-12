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
    'noRuleSets'      => 'Nijedna pravila nisu specificirana u konfiguraciji za validaciju.',
    'ruleNotFound'    => '"{0}" nije važeće pravilo.',
    'groupNotFound'   => '"{0}" nije grupa pravila za validaciju.',
    'groupNotArray'   => 'Grupa pravila "{0}" mora biti niz.',
    'invalidTemplate' => '"{0}" nije važeći obrazac za validaciju.',

    // Rule Messages
    'alpha'                 => 'Polje {field} može sadržati samo abecedne karaktere.',
    'alpha_dash'            => 'Polje {field} može sadržati samo alfanumeričke karaktere, donje crte i crtice.',
    'alpha_numeric'         => 'Polje {field} može sadržati samo alfanumeričke karaktere.',
    'alpha_numeric_punct'   => 'Polje {field} može sadržati samo alfanumeričke karaktere, razmake i ~ ! # $ % & * - _ + = | : . karaktere.',
    'alpha_numeric_space'   => 'Polje {field} može sadržati samo alfanumeričke karaktere i razmake.',
    'alpha_space'           => 'Polje {field} može sadržati samo abecedne karaktere i razmake.',
    'decimal'               => 'Polje {field} mora sadržati decimalni broj.',
    'differs'               => 'Polje {field} mora se razlikovati od polja {param}.',
    'equals'                => 'Polje {field} mora biti tačno: {param}.',
    'exact_length'          => 'Polje {field} mora biti tačno {param} karaktera dužine.',
    'greater_than'          => 'Polje {field} mora sadržati broj veći od {param}.',
    'greater_than_equal_to' => 'Polje {field} mora sadržati broj veći ili jednak {param}.',
    'hex'                   => 'Polje {field} može sadržati samo heksadecimalne karaktere.',
    'in_list'               => 'Polje {field} mora biti jedno od: {param}.',
    'integer'               => 'Polje {field} mora sadržati ceo broj.',
    'is_natural'            => 'Polje {field} može sadržati samo cifre.',
    'is_natural_no_zero'    => 'Polje {field} može sadržati samo cifre i mora biti veće od nule.',
    'is_not_unique'         => 'Polje {field} mora sadržati prethodno postojeću vrednost u bazi podataka.',
    'is_unique'             => 'Polje {field} mora sadržati jedinstvenu vrednost.',
    'less_than'             => 'Polje {field} mora sadržati broj manji od {param}.',
    'less_than_equal_to'    => 'Polje {field} mora sadržati broj manji ili jednak {param}.',
    'matches'               => 'Polje {field} se ne poklapa sa poljem {param}.',
    'max_length'            => 'Polje {field} ne može biti duže od {param} karaktera.',
    'min_length'            => 'Polje {field} mora biti najmanje {param} karaktera dužine.',
    'not_equals'            => 'Polje {field} ne može biti: {param}.',
    'not_in_list'           => 'Polje {field} ne sme biti jedno od: {param}.',
    'numeric'               => 'Polje {field} može sadržati samo brojeve.',
    'regex_match'           => 'Polje {field} nije u ispravnom formatu.',
    'required'              => 'Polje {field} je obavezno.',
    'required_with'         => 'Polje {field} je obavezno kada je prisutno {param}.',
    'required_without'      => 'Polje {field} je obavezno kada {param} nije prisutan.',
    'string'                => 'Polje {field} mora biti važeći string.',
    'timezone'              => 'Polje {field} mora biti važeća vremenska zona.',
    'valid_base64'          => 'Polje {field} mora biti važeći base64 string.',
    'valid_email'           => 'Polje {field} mora sadržati važeću email adresu.',
    'valid_emails'          => 'Polje {field} mora sadržati sve važeće email adrese.',
    'valid_ip'              => 'Polje {field} mora sadržati važeću IP adresu.',
    'valid_url'             => 'Polje {field} mora sadržati važeći URL.',
    'valid_url_strict'      => 'Polje {field} mora sadržati važeći URL.',
    'valid_date'            => 'Polje {field} mora sadržati važeći datum.',
    'valid_json'            => 'Polje {field} mora sadržati važeći JSON.',

    // Credit Cards
    'valid_cc_num' => 'Polje {field} ne izgleda kao važeći broj kreditne kartice.',

    // Files
    'uploaded' => 'Polje {field} nije važeći preneseni fajl.',
    'max_size' => 'Polje {field} je preveliko.',
    'is_image' => 'Polje {field} nije važeći, preneseni slikovni fajl.',
    'mime_in'  => 'Polje {field} nema važeći MIME tip.',
    'ext_in'   => 'Polje {field} nema važeću ekstenziju fajla.',
    'max_dims' => 'Polje {field} ili nije slika, ili je preširoko ili previše visoko.',
];
