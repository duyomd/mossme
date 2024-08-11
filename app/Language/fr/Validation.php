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
    'noRuleSets'      => 'Aucun ensemble de règles spécifié dans la configuration de validation.',
    'ruleNotFound'    => '"{0}" n’est pas une règle valide.',
    'groupNotFound'   => '"{0}" n’est pas un groupe de règles de validation.',
    'groupNotArray'   => 'Le groupe de règles "{0}" doit être un tableau.',
    'invalidTemplate' => '"{0}" n’est pas un modèle de validation valide.',

    // Messages de règle
    'alpha'                 => 'Le champ {field} ne peut contenir que des caractères alphabétiques.',
    'alpha_dash'            => 'Le champ {field} ne peut contenir que des caractères alphanumériques, des tirets bas et des tirets.',
    'alpha_numeric'         => 'Le champ {field} ne peut contenir que des caractères alphanumériques.',
    'alpha_numeric_punct'   => 'Le champ {field} ne peut contenir que des caractères alphanumériques, des espaces, et les caractères ~ ! # $ % & * - _ + = | : .',
    'alpha_numeric_space'   => 'Le champ {field} ne peut contenir que des caractères alphanumériques et des espaces.',
    'alpha_space'           => 'Le champ {field} ne peut contenir que des caractères alphabétiques et des espaces.',
    'decimal'               => 'Le champ {field} doit contenir un nombre décimal.',
    'differs'               => 'Le champ {field} doit être différent du champ {param}.',
    'equals'                => 'Le champ {field} doit être exactement : {param}.',
    'exact_length'          => 'Le champ {field} doit contenir exactement {param} caractères.',
    'greater_than'          => 'Le champ {field} doit contenir un nombre supérieur à {param}.',
    'greater_than_equal_to' => 'Le champ {field} doit contenir un nombre supérieur ou égal à {param}.',
    'hex'                   => 'Le champ {field} ne peut contenir que des caractères hexadécimaux.',
    'in_list'               => 'Le champ {field} doit être l’un des suivants : {param}.',
    'integer'               => 'Le champ {field} doit contenir un entier.',
    'is_natural'            => 'Le champ {field} ne doit contenir que des chiffres.',
    'is_natural_no_zero'    => 'Le champ {field} ne doit contenir que des chiffres et doit être supérieur à zéro.',
    'is_not_unique'         => 'Le champ {field} doit contenir une valeur existante dans la base de données.',
    'is_unique'             => 'Le champ {field} doit contenir une valeur unique.',
    'less_than'             => 'Le champ {field} doit contenir un nombre inférieur à {param}.',
    'less_than_equal_to'    => 'Le champ {field} doit contenir un nombre inférieur ou égal à {param}.',
    'matches'               => 'Le champ {field} ne correspond pas au champ {param}.',
    'max_length'            => 'Le champ {field} ne peut pas dépasser {param} caractères.',
    'min_length'            => 'Le champ {field} doit contenir au moins {param} caractères.',
    'not_equals'            => 'Le champ {field} ne peut pas être : {param}.',
    'not_in_list'           => 'Le champ {field} ne doit pas être l’un des suivants : {param}.',
    'numeric'               => 'Le champ {field} ne doit contenir que des chiffres.',
    'regex_match'           => 'Le champ {field} n’a pas le bon format.',
    'required'              => 'Le champ {field} est requis.',
    'required_with'         => 'Le champ {field} est requis lorsque {param} est présent.',
    'required_without'      => 'Le champ {field} est requis lorsque {param} n’est pas présent.',
    'string'                => 'Le champ {field} doit être une chaîne de caractères valide.',
    'timezone'              => 'Le champ {field} doit être un fuseau horaire valide.',
    'valid_base64'          => 'Le champ {field} doit être une chaîne base64 valide.',
    'valid_email'           => 'Le champ {field} doit contenir une adresse email valide.',
    'valid_emails'          => 'Le champ {field} doit contenir toutes les adresses email valides.',
    'valid_ip'              => 'Le champ {field} doit contenir une IP valide.',
    'valid_url'             => 'Le champ {field} doit contenir une URL valide.',
    'valid_url_strict'      => 'Le champ {field} doit contenir une URL valide.',
    'valid_date'            => 'Le champ {field} doit contenir une date valide.',
    'valid_json'            => 'Le champ {field} doit contenir un JSON valide.',

    // Cartes de crédit
    'valid_cc_num' => '{field} ne semble pas être un numéro de carte de crédit valide.',

    // Fichiers
    'uploaded' => '{field} n’est pas un fichier téléchargé valide.',
    'max_size' => '{field} est un fichier trop volumineux.',
    'is_image' => '{field} n’est pas un fichier image téléchargé valide.',
    'mime_in'  => '{field} n’a pas un type MIME valide.',
    'ext_in'   => '{field} n’a pas une extension de fichier valide.',
    'max_dims' => '{field} n’est pas une image valide ou elle est trop large ou trop haute.',
];
