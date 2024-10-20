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
    'noRuleSets'      => '在驗證配置中沒有指定任何規則集。',
    'ruleNotFound'    => '"{0}" 不是有效的規則。',
    'groupNotFound'   => '"{0}" 不是驗證規則組。',
    'groupNotArray'   => '"{0}" 規則組必須是一個數組。',
    'invalidTemplate' => '"{0}" 不是有效的驗證模板。',

    // Rule Messages
    'alpha'                 => '{field} 字段只能包含字母字符。',
    'alpha_dash'            => '{field} 字段只能包含字母數字、下劃線和破折號字符。',
    'alpha_numeric'         => '{field} 字段只能包含字母數字字符。',
    'alpha_numeric_punct'   => '{field} 字段只能包含字母數字字符、空格和 ~ ! # $ % & * - _ + = | : . 字符。',
    'alpha_numeric_space'   => '{field} 字段只能包含字母數字和空格字符。',
    'alpha_space'           => '{field} 字段只能包含字母字符和空格。',
    'decimal'               => '{field} 字段必須包含小數。',
    'differs'               => '{field} 字段必須與 {param} 字段不同。',
    'equals'                => '{field} 字段必須精確等於: {param}。',
    'exact_length'          => '{field} 字段的長度必須為 {param} 個字符。',
    'greater_than'          => '{field} 字段必須包含一個大於 {param} 的數字。',
    'greater_than_equal_to' => '{field} 字段必須包含一個大於或等於 {param} 的數字。',
    'hex'                   => '{field} 字段只能包含十六進制字符。',
    'in_list'               => '{field} 字段必須是以下之一: {param}。',
    'integer'               => '{field} 字段必須包含整數。',
    'is_natural'            => '{field} 字段只能包含數字。',
    'is_natural_no_zero'    => '{field} 字段只能包含大於零的數字。',
    'is_not_unique'         => '{field} 字段必須包含數據庫中已存在的值。',
    'is_unique'             => '{field} 字段必須包含唯一值。',
    'less_than'             => '{field} 字段必須包含一個小於 {param} 的數字。',
    'less_than_equal_to'    => '{field} 字段必須包含一個小於或等於 {param} 的數字。',
    'matches'               => '{field} 字段與 {param} 字段不匹配。',
    'max_length'            => '{field} 字段的長度不能超過 {param} 個字符。',
    'min_length'            => '{field} 字段的長度必須至少為 {param} 個字符。',
    'not_equals'            => '{field} 字段不能是: {param}。',
    'not_in_list'           => '{field} 字段不能是以下之一: {param}。',
    'numeric'               => '{field} 字段只能包含數字。',
    'regex_match'           => '{field} 字段格式不正確。',
    'required'              => '{field} 字段是必填項。',
    'required_with'         => '{field} 字段在 {param} 存在時是必填項。',
    'required_without'      => '{field} 字段在 {param} 不存在時是必填項。',
    'string'                => '{field} 字段必須是有效的字符串。',
    'timezone'              => '{field} 字段必須是有效的時區。',
    'valid_base64'          => '{field} 字段必須是有效的 base64 字符串。',
    'valid_email'           => '{field} 字段必須包含有效的電子郵件地址。',
    'valid_emails'          => '{field} 字段必須包含所有有效的電子郵件地址。',
    'valid_ip'              => '{field} 字段必須包含有效的 IP。',
    'valid_url'             => '{field} 字段必須包含有效的 URL。',
    'valid_url_strict'      => '{field} 字段必須包含有效的 URL。',
    'valid_date'            => '{field} 字段必須包含有效的日期。',
    'valid_json'            => '{field} 字段必須包含有效的 json。',

    // Credit Cards
    'valid_cc_num' => '{field} 看起來不是有效的信用卡號。',

    // Files
    'uploaded' => '{field} 不是有效的上傳文件。',
    'max_size' => '{field} 文件太大。',
    'is_image' => '{field} 不是有效的上傳圖片文件。',
    'mime_in'  => '{field} 沒有有效的 MIME 類型。',
    'ext_in'   => '{field} 沒有有效的文件擴展名。',
    'max_dims' => '{field} 不是圖片，或它的寬度或高度太大。',
];
