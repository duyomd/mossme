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
    'noRuleSets'      => 'Inga regeluppsättningar specificerade i valideringskonfigurationen.',
    'ruleNotFound'    => '"{0}" är inte en giltig regel.',
    'groupNotFound'   => '"{0}" är inte en regelgrupp för validering.',
    'groupNotArray'   => '"{0}" regelgrupp måste vara en array.',
    'invalidTemplate' => '"{0}" är inte en giltig valideringsmall.',

        // Rule Messages
    'alpha'                 => 'Fältet {field} får endast innehålla alfabetiska tecken.',
    'alpha_dash'            => 'Fältet {field} får endast innehålla alfanumeriska tecken, understreck och bindestreck.',
    'alpha_numeric'         => 'Fältet {field} får endast innehålla alfanumeriska tecken.',
    'alpha_numeric_punct'   => 'Fältet {field} får endast innehålla alfanumeriska tecken, mellanslag och ~ ! # $ % & * - _ + = | : . tecken.',
    'alpha_numeric_space'   => 'Fältet {field} får endast innehålla alfanumeriska tecken och mellanslag.',
    'alpha_space'           => 'Fältet {field} får endast innehålla alfabetiska tecken och mellanslag.',
    'decimal'               => 'Fältet {field} måste innehålla ett decimaltal.',
    'differs'               => 'Fältet {field} måste skilja sig från fältet {param}.',
    'equals'                => 'Fältet {field} måste vara exakt: {param}.',
    'exact_length'          => 'Fältet {field} måste vara exakt {param} tecken långt.',
    'greater_than'          => 'Fältet {field} måste innehålla ett tal större än {param}.',
    'greater_than_equal_to' => 'Fältet {field} måste innehålla ett tal större än eller lika med {param}.',
    'hex'                   => 'Fältet {field} får endast innehålla hexadecimala tecken.',
    'in_list'               => 'Fältet {field} måste vara en av: {param}.',
    'integer'               => 'Fältet {field} måste innehålla ett heltal.',
    'is_natural'            => 'Fältet {field} får endast innehålla siffror.',
    'is_natural_no_zero'    => 'Fältet {field} får endast innehålla siffror och måste vara större än noll.',
    'is_not_unique'         => 'Fältet {field} måste innehålla ett tidigare existerande värde i databasen.',
    'is_unique'             => 'Fältet {field} måste innehålla ett unikt värde.',
    'less_than'             => 'Fältet {field} måste innehålla ett tal mindre än {param}.',
    'less_than_equal_to'    => 'Fältet {field} måste innehålla ett tal mindre än eller lika med {param}.',
    'matches'               => 'Fältet {field} matchar inte fältet {param}.',
    'max_length'            => 'Fältet {field} får inte överstiga {param} tecken i längd.',
    'min_length'            => 'Fältet {field} måste vara minst {param} tecken långt.',
    'not_equals'            => 'Fältet {field} får inte vara: {param}.',
    'not_in_list'           => 'Fältet {field} får inte vara en av: {param}.',
    'numeric'               => 'Fältet {field} måste innehålla endast siffror.',
    'regex_match'           => 'Fältet {field} är inte i rätt format.',
    'required'              => 'Fältet {field} är obligatoriskt.',
    'required_with'         => 'Fältet {field} är obligatoriskt när {param} är närvarande.',
    'required_without'      => 'Fältet {field} är obligatoriskt när {param} inte är närvarande.',
    'string'                => 'Fältet {field} måste vara en giltig sträng.',
    'timezone'              => 'Fältet {field} måste vara en giltig tidszon.',
    'valid_base64'          => 'Fältet {field} måste vara en giltig base64-sträng.',
    'valid_email'           => 'Fältet {field} måste innehålla en giltig e-postadress.',
    'valid_emails'          => 'Fältet {field} måste innehålla alla giltiga e-postadresser.',
    'valid_ip'              => 'Fältet {field} måste innehålla en giltig IP.',
    'valid_url'             => 'Fältet {field} måste innehålla en giltig URL.',
    'valid_url_strict'      => 'Fältet {field} måste innehålla en giltig URL.',
    'valid_date'            => 'Fältet {field} måste innehålla ett giltigt datum.',
    'valid_json'            => 'Fältet {field} måste innehålla ett giltigt json.',

        // Credit Cards
    'valid_cc_num' => '{field} verkar inte vara ett giltigt kreditkortnummer.',

        // Files
    'uploaded' => '{field} är inte en giltig uppladdad fil.',
    'max_size' => '{field} är en för stor fil.',
    'is_image' => '{field} är inte en giltig, uppladdad bildfil.',
    'mime_in'  => '{field} har inte en giltig mime-typ.',
    'ext_in'   => '{field} har inte en giltig filändelse.',
    'max_dims' => '{field} är antingen inte en bild, eller så är den för bred eller för hög.',
];
