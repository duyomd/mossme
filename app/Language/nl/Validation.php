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
    'noRuleSets'      => 'Geen regelsets gespecificeerd in de validatieconfiguratie.',
    'ruleNotFound'    => '"{0}" is geen geldige regel.',
    'groupNotFound'   => '"{0}" is geen groep validatieregels.',
    'groupNotArray'   => 'De regelgroep "{0}" moet een array zijn.',
    'invalidTemplate' => '"{0}" is geen geldige validatiesjabloon.',

    // Regelberichten
    'alpha'                 => 'Het veld {field} mag alleen alfabetische tekens bevatten.',
    'alpha_dash'            => 'Het veld {field} mag alleen alfanumerieke tekens, onderstrepingstekens en streepjes bevatten.',
    'alpha_numeric'         => 'Het veld {field} mag alleen alfanumerieke tekens bevatten.',
    'alpha_numeric_punct'   => 'Het veld {field} mag alleen alfanumerieke tekens, spaties en ~ ! # $ % & * - _ + = | : . tekens bevatten.',
    'alpha_numeric_space'   => 'Het veld {field} mag alleen alfanumerieke tekens en spaties bevatten.',
    'alpha_space'           => 'Het veld {field} mag alleen alfabetische tekens en spaties bevatten.',
    'decimal'               => 'Het veld {field} moet een decimaal getal bevatten.',
    'differs'               => 'Het veld {field} moet verschillen van het veld {param}.',
    'equals'                => 'Het veld {field} moet precies {param} zijn.',
    'exact_length'          => 'Het veld {field} moet precies {param} tekens lang zijn.',
    'greater_than'          => 'Het veld {field} moet een getal groter dan {param} bevatten.',
    'greater_than_equal_to' => 'Het veld {field} moet een getal groter dan of gelijk aan {param} bevatten.',
    'hex'                   => 'Het veld {field} mag alleen hexadecimale tekens bevatten.',
    'in_list'               => 'Het veld {field} moet een van de volgende zijn: {param}.',
    'integer'               => 'Het veld {field} moet een geheel getal bevatten.',
    'is_natural'            => 'Het veld {field} mag alleen cijfers bevatten.',
    'is_natural_no_zero'    => 'Het veld {field} mag alleen cijfers bevatten en moet groter zijn dan nul.',
    'is_not_unique'         => 'Het veld {field} moet een eerder bestaand waarde in de database bevatten.',
    'is_unique'             => 'Het veld {field} moet een unieke waarde bevatten.',
    'less_than'             => 'Het veld {field} moet een getal kleiner dan {param} bevatten.',
    'less_than_equal_to'    => 'Het veld {field} moet een getal kleiner dan of gelijk aan {param} bevatten.',
    'matches'               => 'Het veld {field} komt niet overeen met het veld {param}.',
    'max_length'            => 'Het veld {field} mag niet langer zijn dan {param} tekens.',
    'min_length'            => 'Het veld {field} moet ten minste {param} tekens lang zijn.',
    'not_equals'            => 'Het veld {field} mag niet zijn: {param}.',
    'not_in_list'           => 'Het veld {field} mag niet een van de volgende zijn: {param}.',
    'numeric'               => 'Het veld {field} mag alleen cijfers bevatten.',
    'regex_match'           => 'Het veld {field} heeft niet het juiste formaat.',
    'required'              => 'Het veld {field} is verplicht.',
    'required_with'         => 'Het veld {field} is verplicht wanneer {param} aanwezig is.',
    'required_without'      => 'Het veld {field} is verplicht wanneer {param} niet aanwezig is.',
    'string'                => 'Het veld {field} moet een geldige string zijn.',
    'timezone'              => 'Het veld {field} moet een geldige tijdzone zijn.',
    'valid_base64'          => 'Het veld {field} moet een geldige base64 string zijn.',
    'valid_email'           => 'Het veld {field} moet een geldig e-mailadres bevatten.',
    'valid_emails'          => 'Het veld {field} moet alle geldige e-mailadressen bevatten.',
    'valid_ip'              => 'Het veld {field} moet een geldig IP-adres bevatten.',
    'valid_url'             => 'Het veld {field} moet een geldige URL bevatten.',
    'valid_url_strict'      => 'Het veld {field} moet een geldige URL bevatten.',
    'valid_date'            => 'Het veld {field} moet een geldige datum bevatten.',
    'valid_json'            => 'Het veld {field} moet een geldige json bevatten.',

    // Creditcards
    'valid_cc_num' => '{field} lijkt geen geldig creditcardnummer te zijn.',

    // Bestanden
    'uploaded' => '{field} is geen geldig geüpload bestand.',
    'max_size' => '{field} is een te groot bestand.',
    'is_image' => '{field} is geen geldig, geüpload afbeeldingsbestand.',
    'mime_in'  => '{field} heeft geen geldige mime-type.',
    'ext_in'   => '{field} heeft geen geldige bestandsextensie.',
    'max_dims' => '{field} is ofwel geen afbeelding, of te breed of te hoog.',
];
