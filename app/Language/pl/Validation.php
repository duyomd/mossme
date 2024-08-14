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
    'noRuleSets'      => 'Nie określono zestawów reguł w konfiguracji walidacji.',
    'ruleNotFound'    => '"{0}" nie jest prawidłową regułą.',
    'groupNotFound'   => '"{0}" nie jest grupą reguł walidacji.',
    'groupNotArray'   => 'Grupa reguł "{0}" musi być tablicą.',
    'invalidTemplate' => '"{0}" nie jest prawidłowym szablonem walidacji.',

    // Rule Messages
    'alpha'                 => 'Pole {field} może zawierać tylko znaki alfabetu.',
    'alpha_dash'            => 'Pole {field} może zawierać tylko znaki alfanumeryczne, podkreślenia i myślniki.',
    'alpha_numeric'         => 'Pole {field} może zawierać tylko znaki alfanumeryczne.',
    'alpha_numeric_punct'   => 'Pole {field} może zawierać tylko znaki alfanumeryczne, spacje oraz znaki ~ ! # $ % & * - _ + = | : .',
    'alpha_numeric_space'   => 'Pole {field} może zawierać tylko znaki alfanumeryczne i spacje.',
    'alpha_space'           => 'Pole {field} może zawierać tylko znaki alfabetu i spacje.',
    'decimal'               => 'Pole {field} musi zawierać liczbę dziesiętną.',
    'differs'               => 'Pole {field} musi różnić się od pola {param}.',
    'equals'                => 'Pole {field} musi być dokładnie: {param}.',
    'exact_length'          => 'Pole {field} musi mieć dokładnie {param} znaków długości.',
    'greater_than'          => 'Pole {field} musi zawierać liczbę większą niż {param}.',
    'greater_than_equal_to' => 'Pole {field} musi zawierać liczbę większą lub równą {param}.',
    'hex'                   => 'Pole {field} może zawierać tylko znaki szesnastkowe.',
    'in_list'               => 'Pole {field} musi być jednym z: {param}.',
    'integer'               => 'Pole {field} musi zawierać liczbę całkowitą.',
    'is_natural'            => 'Pole {field} może zawierać tylko cyfry.',
    'is_natural_no_zero'    => 'Pole {field} może zawierać tylko cyfry i musi być większe niż zero.',
    'is_not_unique'         => 'Pole {field} musi zawierać wartość już istniejącą w bazie danych.',
    'is_unique'             => 'Pole {field} musi zawierać unikalną wartość.',
    'less_than'             => 'Pole {field} musi zawierać liczbę mniejszą niż {param}.',
    'less_than_equal_to'    => 'Pole {field} musi zawierać liczbę mniejszą lub równą {param}.',
    'matches'               => 'Pole {field} nie pasuje do pola {param}.',
    'max_length'            => 'Pole {field} nie może przekraczać {param} znaków długości.',
    'min_length'            => 'Pole {field} musi mieć co najmniej {param} znaków długości.',
    'not_equals'            => 'Pole {field} nie może być: {param}.',
    'not_in_list'           => 'Pole {field} nie może być jednym z: {param}.',
    'numeric'               => 'Pole {field} musi zawierać tylko liczby.',
    'regex_match'           => 'Pole {field} nie jest w prawidłowym formacie.',
    'required'              => 'Pole {field} jest wymagane.',
    'required_with'         => 'Pole {field} jest wymagane, gdy {param} jest obecne.',
    'required_without'      => 'Pole {field} jest wymagane, gdy {param} nie jest obecne.',
    'string'                => 'Pole {field} musi być prawidłowym ciągiem znaków.',
    'timezone'              => 'Pole {field} musi być prawidłową strefą czasową.',
    'valid_base64'          => 'Pole {field} musi być prawidłowym ciągiem base64.',
    'valid_email'           => 'Pole {field} musi zawierać prawidłowy adres e-mail.',
    'valid_emails'          => 'Pole {field} musi zawierać wszystkie prawidłowe adresy e-mail.',
    'valid_ip'              => 'Pole {field} musi zawierać prawidłowy adres IP.',
    'valid_url'             => 'Pole {field} musi zawierać prawidłowy adres URL.',
    'valid_url_strict'      => 'Pole {field} musi zawierać prawidłowy adres URL.',
    'valid_date'            => 'Pole {field} musi zawierać prawidłową datę.',
    'valid_json'            => 'Pole {field} musi zawierać prawidłowy JSON.',

    // Credit Cards
    'valid_cc_num' => 'Pole {field} nie wydaje się być prawidłowym numerem karty kredytowej.',

    // Files
    'uploaded' => 'Pole {field} nie jest prawidłowym przesłanym plikiem.',
    'max_size' => 'Pole {field} jest zbyt dużym plikiem.',
    'is_image' => 'Pole {field} nie jest prawidłowym przesłanym plikiem graficznym.',
    'mime_in'  => 'Pole {field} nie ma prawidłowego typu mime.',
    'ext_in'   => 'Pole {field} nie ma prawidłowego rozszerzenia pliku.',
    'max_dims' => 'Pole {field} nie jest obrazem, lub jest zbyt szerokie lub zbyt wysokie.',
];
