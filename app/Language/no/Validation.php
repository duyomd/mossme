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
    'noRuleSets'      => 'Ingen regelsett spesifisert i valideringskonfigurasjonen.',
    'ruleNotFound'    => '"{0}" er ikke en gyldig regel.',
    'groupNotFound'   => '"{0}" er ikke en gruppe av valideringsregler.',
    'groupNotArray'   => '"{0}" regelgruppe må være en array.',
    'invalidTemplate' => '"{0}" er ikke en gyldig valideringsmal.',

    // Rule Messages
    'alpha'                 => '{field} feltet kan kun inneholde alfabetiske tegn.',
    'alpha_dash'            => '{field} feltet kan kun inneholde alfanumeriske tegn, understrek og bindestreker.',
    'alpha_numeric'         => '{field} feltet kan kun inneholde alfanumeriske tegn.',
    'alpha_numeric_punct'   => '{field} feltet kan kun inneholde alfanumeriske tegn, mellomrom, og ~ ! # $ % & * - _ + = | : . tegn.',
    'alpha_numeric_space'   => '{field} feltet kan kun inneholde alfanumeriske tegn og mellomrom.',
    'alpha_space'           => '{field} feltet kan kun inneholde alfabetiske tegn og mellomrom.',
    'decimal'               => '{field} feltet må inneholde et desimaltall.',
    'differs'               => '{field} feltet må være forskjellig fra {param} feltet.',
    'equals'                => '{field} feltet må være nøyaktig: {param}.',
    'exact_length'          => '{field} feltet må være nøyaktig {param} tegn langt.',
    'greater_than'          => '{field} feltet må inneholde et tall større enn {param}.',
    'greater_than_equal_to' => '{field} feltet må inneholde et tall større enn eller lik {param}.',
    'hex'                   => '{field} feltet kan kun inneholde heksadesimale tegn.',
    'in_list'               => '{field} feltet må være en av: {param}.',
    'integer'               => '{field} feltet må inneholde et heltall.',
    'is_natural'            => '{field} feltet må kun inneholde sifre.',
    'is_natural_no_zero'    => '{field} feltet må kun inneholde sifre og må være større enn null.',
    'is_not_unique'         => '{field} feltet må inneholde en tidligere eksisterende verdi i databasen.',
    'is_unique'             => '{field} feltet må inneholde en unik verdi.',
    'less_than'             => '{field} feltet må inneholde et tall mindre enn {param}.',
    'less_than_equal_to'    => '{field} feltet må inneholde et tall mindre enn eller lik {param}.',
    'matches'               => '{field} feltet samsvarer ikke med {param} feltet.',
    'max_length'            => '{field} feltet kan ikke overskride {param} tegn i lengde.',
    'min_length'            => '{field} feltet må være minst {param} tegn langt.',
    'not_equals'            => '{field} feltet kan ikke være: {param}.',
    'not_in_list'           => '{field} feltet må ikke være en av: {param}.',
    'numeric'               => '{field} feltet må kun inneholde tall.',
    'regex_match'           => '{field} feltet er ikke i riktig format.',
    'required'              => '{field} feltet er påkrevd.',
    'required_with'         => '{field} feltet er påkrevd når {param} er tilstede.',
    'required_without'      => '{field} feltet er påkrevd når {param} ikke er tilstede.',
    'string'                => '{field} feltet må være en gyldig streng.',
    'timezone'              => '{field} feltet må være en gyldig tidssone.',
    'valid_base64'          => '{field} feltet må være en gyldig base64-streng.',
    'valid_email'           => '{field} feltet må inneholde en gyldig e-postadresse.',
    'valid_emails'          => '{field} feltet må inneholde alle gyldige e-postadresser.',
    'valid_ip'              => '{field} feltet må inneholde en gyldig IP.',
    'valid_url'             => '{field} feltet må inneholde en gyldig URL.',
    'valid_url_strict'      => '{field} feltet må inneholde en gyldig URL.',
    'valid_date'            => '{field} feltet må inneholde en gyldig dato.',
    'valid_json'            => '{field} feltet må inneholde en gyldig JSON.',

    // Credit Cards
    'valid_cc_num' => '{field} ser ikke ut til å være et gyldig kredittkortnummer.',

    // Files
    'uploaded' => '{field} er ikke en gyldig opplastet fil.',
    'max_size' => '{field} er en for stor fil.',
    'is_image' => '{field} er ikke en gyldig, opplastet bildefil.',
    'mime_in'  => '{field} har ikke en gyldig MIME-type.',
    'ext_in'   => '{field} har ikke en gyldig filutvidelse.',
    'max_dims' => '{field} er enten ikke et bilde, eller det er for bredt eller høyt.',
];
