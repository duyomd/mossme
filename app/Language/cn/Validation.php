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
    'noRuleSets'      => '在验证配置中没有指定任何规则集。',
    'ruleNotFound'    => '"{0}" 不是有效的规则。',
    'groupNotFound'   => '"{0}" 不是验证规则组。',
    'groupNotArray'   => '"{0}" 规则组必须是一个数组。',
    'invalidTemplate' => '"{0}" 不是有效的验证模板。',

    // Rule Messages
    'alpha'                 => '{field} 字段只能包含字母字符。',
    'alpha_dash'            => '{field} 字段只能包含字母数字、下划线和破折号字符。',
    'alpha_numeric'         => '{field} 字段只能包含字母数字字符。',
    'alpha_numeric_punct'   => '{field} 字段只能包含字母数字字符、空格和 ~ ! # $ % & * - _ + = | : . 字符。',
    'alpha_numeric_space'   => '{field} 字段只能包含字母数字和空格字符。',
    'alpha_space'           => '{field} 字段只能包含字母字符和空格。',
    'decimal'               => '{field} 字段必须包含小数。',
    'differs'               => '{field} 字段必须与 {param} 字段不同。',
    'equals'                => '{field} 字段必须精确等于: {param}。',
    'exact_length'          => '{field} 字段的长度必须为 {param} 个字符。',
    'greater_than'          => '{field} 字段必须包含一个大于 {param} 的数字。',
    'greater_than_equal_to' => '{field} 字段必须包含一个大于或等于 {param} 的数字。',
    'hex'                   => '{field} 字段只能包含十六进制字符。',
    'in_list'               => '{field} 字段必须是以下之一: {param}。',
    'integer'               => '{field} 字段必须包含整数。',
    'is_natural'            => '{field} 字段只能包含数字。',
    'is_natural_no_zero'    => '{field} 字段只能包含大于零的数字。',
    'is_not_unique'         => '{field} 字段必须包含数据库中已存在的值。',
    'is_unique'             => '{field} 字段必须包含唯一值。',
    'less_than'             => '{field} 字段必须包含一个小于 {param} 的数字。',
    'less_than_equal_to'    => '{field} 字段必须包含一个小于或等于 {param} 的数字。',
    'matches'               => '{field} 字段与 {param} 字段不匹配。',
    'max_length'            => '{field} 字段的长度不能超过 {param} 个字符。',
    'min_length'            => '{field} 字段的长度必须至少为 {param} 个字符。',
    'not_equals'            => '{field} 字段不能是: {param}。',
    'not_in_list'           => '{field} 字段不能是以下之一: {param}。',
    'numeric'               => '{field} 字段只能包含数字。',
    'regex_match'           => '{field} 字段格式不正确。',
    'required'              => '{field} 字段是必填项。',
    'required_with'         => '{field} 字段在 {param} 存在时是必填项。',
    'required_without'      => '{field} 字段在 {param} 不存在时是必填项。',
    'string'                => '{field} 字段必须是有效的字符串。',
    'timezone'              => '{field} 字段必须是有效的时区。',
    'valid_base64'          => '{field} 字段必须是有效的 base64 字符串。',
    'valid_email'           => '{field} 字段必须包含有效的电子邮件地址。',
    'valid_emails'          => '{field} 字段必须包含所有有效的电子邮件地址。',
    'valid_ip'              => '{field} 字段必须包含有效的 IP。',
    'valid_url'             => '{field} 字段必须包含有效的 URL。',
    'valid_url_strict'      => '{field} 字段必须包含有效的 URL。',
    'valid_date'            => '{field} 字段必须包含有效的日期。',
    'valid_json'            => '{field} 字段必须包含有效的 json。',

    // Credit Cards
    'valid_cc_num' => '{field} 看起来不是有效的信用卡号。',

    // Files
    'uploaded' => '{field} 不是有效的上传文件。',
    'max_size' => '{field} 文件太大。',
    'is_image' => '{field} 不是有效的上传图片文件。',
    'mime_in'  => '{field} 没有有效的 MIME 类型。',
    'ext_in'   => '{field} 没有有效的文件扩展名。',
    'max_dims' => '{field} 不是图片，或它的宽度或高度太大。',
];
