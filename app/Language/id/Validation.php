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
    'noRuleSets'      => 'Tidak ada set aturan yang ditentukan dalam konfigurasi Validasi.',
    'ruleNotFound'    => '"{0}" bukan aturan yang valid.',
    'groupNotFound'   => '"{0}" bukan grup aturan validasi.',
    'groupNotArray'   => 'Grup aturan "{0}" harus berupa array.',
    'invalidTemplate' => '"{0}" bukan template Validasi yang valid.',

    // Rule Messages
    'alpha'                 => 'Bidang {field} hanya boleh berisi karakter alfabet.',
    'alpha_dash'            => 'Bidang {field} hanya boleh berisi karakter alfanumerik, garis bawah, dan tanda hubung.',
    'alpha_numeric'         => 'Bidang {field} hanya boleh berisi karakter alfanumerik.',
    'alpha_numeric_punct'   => 'Bidang {field} hanya boleh berisi karakter alfanumerik, spasi, dan karakter ~ ! # $ % & * - _ + = | : .',
    'alpha_numeric_space'   => 'Bidang {field} hanya boleh berisi karakter alfanumerik dan spasi.',
    'alpha_space'           => 'Bidang {field} hanya boleh berisi karakter alfabet dan spasi.',
    'decimal'               => 'Bidang {field} harus berisi angka desimal.',
    'differs'               => 'Bidang {field} harus berbeda dari bidang {param}.',
    'equals'                => 'Bidang {field} harus tepat: {param}.',
    'exact_length'          => 'Bidang {field} harus tepat {param} karakter panjangnya.',
    'greater_than'          => 'Bidang {field} harus berisi angka lebih besar dari {param}.',
    'greater_than_equal_to' => 'Bidang {field} harus berisi angka lebih besar dari atau sama dengan {param}.',
    'hex'                   => 'Bidang {field} hanya boleh berisi karakter heksadesimal.',
    'in_list'               => 'Bidang {field} harus salah satu dari: {param}.',
    'integer'               => 'Bidang {field} harus berisi bilangan bulat.',
    'is_natural'            => 'Bidang {field} hanya boleh berisi digit.',
    'is_natural_no_zero'    => 'Bidang {field} hanya boleh berisi digit dan harus lebih besar dari nol.',
    'is_not_unique'         => 'Bidang {field} harus berisi nilai yang sudah ada sebelumnya di database.',
    'is_unique'             => 'Bidang {field} harus berisi nilai yang unik.',
    'less_than'             => 'Bidang {field} harus berisi angka kurang dari {param}.',
    'less_than_equal_to'    => 'Bidang {field} harus berisi angka kurang dari atau sama dengan {param}.',
    'matches'               => 'Bidang {field} tidak cocok dengan bidang {param}.',
    'max_length'            => 'Bidang {field} tidak boleh melebihi {param} karakter panjangnya.',
    'min_length'            => 'Bidang {field} harus memiliki panjang minimal {param} karakter.',
    'not_equals'            => 'Bidang {field} tidak boleh: {param}.',
    'not_in_list'           => 'Bidang {field} tidak boleh salah satu dari: {param}.',
    'numeric'               => 'Bidang {field} hanya boleh berisi angka.',
    'regex_match'           => 'Bidang {field} tidak dalam format yang benar.',
    'required'              => 'Bidang {field} diperlukan.',
    'required_with'         => 'Bidang {field} diperlukan ketika {param} ada.',
    'required_without'      => 'Bidang {field} diperlukan ketika {param} tidak ada.',
    'string'                => 'Bidang {field} harus berupa string yang valid.',
    'timezone'              => 'Bidang {field} harus berupa zona waktu yang valid.',
    'valid_base64'          => 'Bidang {field} harus berupa string base64 yang valid.',
    'valid_email'           => 'Bidang {field} harus berisi alamat email yang valid.',
    'valid_emails'          => 'Bidang {field} harus berisi semua alamat email yang valid.',
    'valid_ip'              => 'Bidang {field} harus berisi IP yang valid.',
    'valid_url'             => 'Bidang {field} harus berisi URL yang valid.',
    'valid_url_strict'      => 'Bidang {field} harus berisi URL yang valid.',
    'valid_date'            => 'Bidang {field} harus berisi tanggal yang valid.',
    'valid_json'            => 'Bidang {field} harus berisi JSON yang valid.',

    // Credit Cards
    'valid_cc_num' => '{field} tampaknya bukan nomor kartu kredit yang valid.',

    // Files
    'uploaded' => '{field} bukan file yang diunggah yang valid.',
    'max_size' => '{field} terlalu besar.',
    'is_image' => '{field} bukan file gambar yang valid dan diunggah.',
    'mime_in'  => '{field} tidak memiliki tipe mime yang valid.',
    'ext_in'   => '{field} tidak memiliki ekstensi file yang valid.',
    'max_dims' => '{field} bukan gambar, atau terlalu lebar atau tinggi.',
];
