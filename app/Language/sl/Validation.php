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
    'noRuleSets'      => 'V konfiguraciji preverjanja ni navedenih nobenih pravilnih nizov.',
    'ruleNotFound'    => '"{0}" ni veljavno pravilo.',
    'groupNotFound'   => '"{0}" ni skupina pravil za preverjanje.',
    'groupNotArray'   => 'Skupina pravil "{0}" mora biti seznam.',
    'invalidTemplate' => '"{0}" ni veljaven predloga za preverjanje.',

    // Pravila
    'alpha'                 => 'Polje {field} lahko vsebuje samo črke.',
    'alpha_dash'            => 'Polje {field} lahko vsebuje samo alfanumerične znake, podčrtaje in pomišljaje.',
    'alpha_numeric'         => 'Polje {field} lahko vsebuje samo alfanumerične znake.',
    'alpha_numeric_punct'   => 'Polje {field} lahko vsebuje le alfanumerične znake, presledke in ~ ! # $ % & * - _ + = | : . znake.',
    'alpha_numeric_space'   => 'Polje {field} lahko vsebuje samo alfanumerične znake in presledke.',
    'alpha_space'           => 'Polje {field} lahko vsebuje samo črke in presledke.',
    'decimal'               => 'Polje {field} mora vsebovati decimalno število.',
    'differs'               => 'Polje {field} mora biti drugačno od polja {param}.',
    'equals'                => 'Polje {field} mora biti točno: {param}.',
    'exact_length'          => 'Polje {field} mora imeti točno {param} znakov.',
    'greater_than'          => 'Polje {field} mora vsebovati število večje od {param}.',
    'greater_than_equal_to' => 'Polje {field} mora vsebovati število večje ali enako {param}.',
    'hex'                   => 'Polje {field} lahko vsebuje samo šestnajstiške znake.',
    'in_list'               => 'Polje {field} mora biti eno od: {param}.',
    'integer'               => 'Polje {field} mora vsebovati celo število.',
    'is_natural'            => 'Polje {field} lahko vsebuje samo številke.',
    'is_natural_no_zero'    => 'Polje {field} lahko vsebuje samo številke in mora biti večje od nič.',
    'is_not_unique'         => 'Polje {field} mora vsebovati že obstoječo vrednost v podatkovni bazi.',
    'is_unique'             => 'Polje {field} mora vsebovati edinstveno vrednost.',
    'less_than'             => 'Polje {field} mora vsebovati število manjše od {param}.',
    'less_than_equal_to'    => 'Polje {field} mora vsebovati število manjše ali enako {param}.',
    'matches'               => 'Polje {field} ne ustreza polju {param}.',
    'max_length'            => 'Polje {field} ne sme presegati {param} znakov.',
    'min_length'            => 'Polje {field} mora imeti vsaj {param} znakov.',
    'not_equals'            => 'Polje {field} ne sme biti: {param}.',
    'not_in_list'           => 'Polje {field} ne sme biti eno od: {param}.',
    'numeric'               => 'Polje {field} mora vsebovati le številke.',
    'regex_match'           => 'Polje {field} ni v pravilnem formatu.',
    'required'              => 'Polje {field} je obvezno.',
    'required_with'         => 'Polje {field} je obvezno, ko je prisoten {param}.',
    'required_without'      => 'Polje {field} je obvezno, ko {param} ni prisoten.',
    'string'                => 'Polje {field} mora biti veljaven niz.',
    'timezone'              => 'Polje {field} mora biti veljavna časovna zona.',
    'valid_base64'          => 'Polje {field} mora biti veljaven base64 niz.',
    'valid_email'           => 'Polje {field} mora vsebovati veljaven e-poštni naslov.',
    'valid_emails'          => 'Polje {field} mora vsebovati vse veljavne e-poštne naslove.',
    'valid_ip'              => 'Polje {field} mora vsebovati veljaven IP naslov.',
    'valid_url'             => 'Polje {field} mora vsebovati veljaven URL.',
    'valid_url_strict'      => 'Polje {field} mora vsebovati veljaven URL.',
    'valid_date'            => 'Polje {field} mora vsebovati veljaven datum.',
    'valid_json'            => 'Polje {field} mora vsebovati veljaven JSON.',

    // Kreditne kartice
    'valid_cc_num' => 'Polje {field} ne zdi se biti veljavna številka kreditne kartice.',

    // Datoteke
    'uploaded' => 'Polje {field} ni veljavna naložena datoteka.',
    'max_size' => 'Polje {field} je preveliko.',
    'is_image' => 'Polje {field} ni veljavna naložena slikovna datoteka.',
    'mime_in'  => 'Polje {field} nima veljavne mime vrste.',
    'ext_in'   => 'Polje {field} nima veljavne datotečne končnice.',
    'max_dims' => 'Polje {field} ni slika ali pa je preširoka ali previsoka.',
];
