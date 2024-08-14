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
    'noRuleSets'      => 'Validation yapılandırmasında kural setleri belirtilmemiş.',
    'ruleNotFound'    => '"{0}" geçerli bir kural değil.',
    'groupNotFound'   => '"{0}" bir doğrulama kural grubı değil.',
    'groupNotArray'   => '"{0}" kural grubu bir dizi olmalıdır.',
    'invalidTemplate' => '"{0}" geçerli bir Validation şablonu değil.',

    // Rule Messages
    'alpha'                 => '{field} alanı yalnızca alfabetik karakterler içerebilir.',
    'alpha_dash'            => '{field} alanı yalnızca alfanümerik, alt çizgi ve tire karakterleri içerebilir.',
    'alpha_numeric'         => '{field} alanı yalnızca alfanümerik karakterler içerebilir.',
    'alpha_numeric_punct'   => '{field} alanı yalnızca alfanümerik karakterler, boşluklar ve ~ ! # $ % & * - _ + = | : . karakterlerini içerebilir.',
    'alpha_numeric_space'   => '{field} alanı yalnızca alfanümerik ve boşluk karakterleri içerebilir.',
    'alpha_space'           => '{field} alanı yalnızca alfabetik karakterler ve boşluklar içerebilir.',
    'decimal'               => '{field} alanı ondalıklı bir sayı içermelidir.',
    'differs'               => '{field} alanı {param} alanından farklı olmalıdır.',
    'equals'                => '{field} alanı tam olarak {param} olmalıdır.',
    'exact_length'          => '{field} alanı tam olarak {param} karakter uzunluğunda olmalıdır.',
    'greater_than'          => '{field} alanı {param} değerinden büyük bir sayı içermelidir.',
    'greater_than_equal_to' => '{field} alanı {param} değerine eşit veya ondan büyük bir sayı içermelidir.',
    'hex'                   => '{field} alanı yalnızca onaltılı karakterler içerebilir.',
    'in_list'               => '{field} alanı şunlardan biri olmalıdır: {param}.',
    'integer'               => '{field} alanı bir tamsayı içermelidir.',
    'is_natural'            => '{field} alanı yalnızca rakamlar içermelidir.',
    'is_natural_no_zero'    => '{field} alanı yalnızca rakamlar içermelidir ve sıfırdan büyük olmalıdır.',
    'is_not_unique'         => '{field} alanı veritabanında daha önce mevcut bir değeri içermelidir.',
    'is_unique'             => '{field} alanı benzersiz bir değer içermelidir.',
    'less_than'             => '{field} alanı {param} değerinden küçük bir sayı içermelidir.',
    'less_than_equal_to'    => '{field} alanı {param} değerine eşit veya ondan küçük bir sayı içermelidir.',
    'matches'               => '{field} alanı {param} alanıyla eşleşmiyor.',
    'max_length'            => '{field} alanı {param} karakterden uzun olmamalıdır.',
    'min_length'            => '{field} alanı en az {param} karakter uzunluğunda olmalıdır.',
    'not_equals'            => '{field} alanı {param} olamaz.',
    'not_in_list'           => '{field} alanı şunlardan biri olmamalıdır: {param}.',
    'numeric'               => '{field} alanı yalnızca sayılar içermelidir.',
    'regex_match'           => '{field} alanı doğru formatta değil.',
    'required'              => '{field} alanı gereklidir.',
    'required_with'         => '{field} alanı {param} mevcut olduğunda gereklidir.',
    'required_without'      => '{field} alanı {param} mevcut olmadığında gereklidir.',
    'string'                => '{field} alanı geçerli bir dize olmalıdır.',
    'timezone'              => '{field} alanı geçerli bir zaman dilimi olmalıdır.',
    'valid_base64'          => '{field} alanı geçerli bir base64 dizesi olmalıdır.',
    'valid_email'           => '{field} alanı geçerli bir e-posta adresi içermelidir.',
    'valid_emails'          => '{field} alanı geçerli tüm e-posta adreslerini içermelidir.',
    'valid_ip'              => '{field} alanı geçerli bir IP adresi içermelidir.',
    'valid_url'             => '{field} alanı geçerli bir URL içermelidir.',
    'valid_url_strict'      => '{field} alanı geçerli bir URL içermelidir.',
    'valid_date'            => '{field} alanı geçerli bir tarih içermelidir.',
    'valid_json'            => '{field} alanı geçerli bir JSON içermelidir.',

    // Credit Cards
    'valid_cc_num' => '{field} geçerli bir kredi kartı numarası gibi görünmüyor.',

    // Files
    'uploaded' => '{field} geçerli bir yüklenmiş dosya değil.',
    'max_size' => '{field} dosyası çok büyük.',
    'is_image' => '{field} geçerli bir yüklenmiş resim dosyası değil.',
    'mime_in'  => '{field} geçerli bir mime türüne sahip değil.',
    'ext_in'   => '{field} geçerli bir dosya uzantısına sahip değil.',
    'max_dims' => '{field} ya bir resim değil ya da çok geniş veya yüksek.',
];
