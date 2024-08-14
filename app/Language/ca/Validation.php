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
    'noRuleSets'      => 'No s’han especificat conjunts de regles a la configuració de validació.',
    'ruleNotFound'    => '"{0}" no és una regla vàlida.',
    'groupNotFound'   => '"{0}" no és un grup de regles de validació.',
    'groupNotArray'   => 'El grup de regles "{0}" ha de ser una matriu.',
    'invalidTemplate' => '"{0}" no és una plantilla de validació vàlida.',

    // Rule Messages
    'alpha'                 => 'El camp {field} només pot contenir caràcters alfabètics.',
    'alpha_dash'            => 'El camp {field} només pot contenir caràcters alfanumèrics, guions baixos i guions.',
    'alpha_numeric'         => 'El camp {field} només pot contenir caràcters alfanumèrics.',
    'alpha_numeric_punct'   => 'El camp {field} només pot contenir caràcters alfanumèrics, espais i caràcters ~ ! # $ % & * - _ + = | : .',
    'alpha_numeric_space'   => 'El camp {field} només pot contenir caràcters alfanumèrics i espais.',
    'alpha_space'           => 'El camp {field} només pot contenir caràcters alfabètics i espais.',
    'decimal'               => 'El camp {field} ha de contenir un número decimal.',
    'differs'               => 'El camp {field} ha de ser diferent del camp {param}.',
    'equals'                => 'El camp {field} ha de ser exactament: {param}.',
    'exact_length'          => 'El camp {field} ha de tenir exactament {param} caràcters de longitud.',
    'greater_than'          => 'El camp {field} ha de contenir un número superior a {param}.',
    'greater_than_equal_to' => 'El camp {field} ha de contenir un número superior o igual a {param}.',
    'hex'                   => 'El camp {field} només pot contenir caràcters hexadecimals.',
    'in_list'               => 'El camp {field} ha de ser un dels següents: {param}.',
    'integer'               => 'El camp {field} ha de contenir un número enter.',
    'is_natural'            => 'El camp {field} només ha de contenir dígits.',
    'is_natural_no_zero'    => 'El camp {field} només ha de contenir dígits i ha de ser superior a zero.',
    'is_not_unique'         => 'El camp {field} ha de contenir un valor que ja existeixi a la base de dades.',
    'is_unique'             => 'El camp {field} ha de contenir un valor únic.',
    'less_than'             => 'El camp {field} ha de contenir un número inferior a {param}.',
    'less_than_equal_to'    => 'El camp {field} ha de contenir un número inferior o igual a {param}.',
    'matches'               => 'El camp {field} no coincideix amb el camp {param}.',
    'max_length'            => 'El camp {field} no pot superar els {param} caràcters de longitud.',
    'min_length'            => 'El camp {field} ha de tenir almenys {param} caràcters de longitud.',
    'not_equals'            => 'El camp {field} no pot ser: {param}.',
    'not_in_list'           => 'El camp {field} no ha de ser un dels següents: {param}.',
    'numeric'               => 'El camp {field} només pot contenir números.',
    'regex_match'           => 'El camp {field} no té el format correcte.',
    'required'              => 'El camp {field} és requerit.',
    'required_with'         => 'El camp {field} és requerit quan {param} està present.',
    'required_without'      => 'El camp {field} és requerit quan {param} no està present.',
    'string'                => 'El camp {field} ha de ser una cadena vàlida.',
    'timezone'              => 'El camp {field} ha de ser una zona horària vàlida.',
    'valid_base64'          => 'El camp {field} ha de ser una cadena base64 vàlida.',
    'valid_email'           => 'El camp {field} ha de contenir una adreça de correu electrònic vàlida.',
    'valid_emails'          => 'El camp {field} ha de contenir totes les adreces de correu electrònic vàlides.',
    'valid_ip'              => 'El camp {field} ha de contenir una IP vàlida.',
    'valid_url'             => 'El camp {field} ha de contenir una URL vàlida.',
    'valid_url_strict'      => 'El camp {field} ha de contenir una URL vàlida.',
    'valid_date'            => 'El camp {field} ha de contenir una data vàlida.',
    'valid_json'            => 'El camp {field} ha de contenir un JSON vàlid.',

    // Credit Cards
    'valid_cc_num' => 'El camp {field} no sembla ser un número de targeta de crèdit vàlid.',

    // Files
    'uploaded' => 'El camp {field} no és un fitxer pujat vàlid.',
    'max_size' => 'El fitxer {field} és massa gran.',
    'is_image' => 'El fitxer {field} no és un fitxer d’imatge vàlid.',
    'mime_in'  => 'El fitxer {field} no té un tipus MIME vàlid.',
    'ext_in'   => 'El fitxer {field} no té una extensió de fitxer vàlida.',
    'max_dims' => 'El fitxer {field} no és una imatge o és massa ample o alt.',
];
