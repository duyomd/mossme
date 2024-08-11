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
    'noRuleSets'      => 'バリデーション構成で指定されたルールセットはありません。',
    'ruleNotFound'    => '"{0}" は有効なルールではありません。',
    'groupNotFound'   => '"{0}" はバリデーションルールグループではありません。',
    'groupNotArray'   => '"{0}" ルールグループは配列でなければなりません。',
    'invalidTemplate' => '"{0}" は有効なバリデーションテンプレートではありません。',

    // Rule Messages
    'alpha'                 => 'フィールド {field} にはアルファベット文字のみを含めることができます。',
    'alpha_dash'            => 'フィールド {field} にはアルファベット文字、"_"、および "-" のみを含めることができます。',
    'alpha_numeric'         => 'フィールド {field} にはアルファベット文字または数字のみを含めることができます。',
    'alpha_numeric_punct'   => 'フィールド {field} にはアルファベット文字、数字、空白、および "~ ! # $ % & * - _ + = | : ." の記号のみを含めることができます。',
    'alpha_numeric_space'   => 'フィールド {field} にはアルファベット文字、数字、および空白のみを含めることができます。',
    'alpha_space'           => 'フィールド {field} にはアルファベット文字と空白のみを含めることができます。',
    'decimal'               => 'フィールド {field} には小数を含めることができます。',
    'differs'               => 'フィールド {field} はフィールド {param} と異なる必要があります。',
    'equals'                => 'フィールド {field} は {param} でなければなりません。',
    'exact_length'          => 'フィールド {field} は正確に {param} 文字の長さでなければなりません。',
    'greater_than'          => 'フィールド {field} には {param} より大きい値を含める必要があります。',
    'greater_than_equal_to' => 'フィールド {field} には {param} 以上の値を含める必要があります。',
    'hex'                   => 'フィールド {field} には16進数の文字のみを含めることができます。',
    'in_list'               => 'フィールド {field} は次の値のいずれかである必要があります: {param}。',
    'integer'               => 'フィールド {field} は整数でなければなりません。',
    'is_natural'            => 'フィールド {field} には自然数を含めることができます。',
    'is_natural_no_zero'    => 'フィールド {field} には正の整数を含めることができます。',
    'is_not_unique'         => 'フィールド {field} にはデータベース内の既存の値を含める必要があります。',
    'is_unique'             => 'フィールド {field} には一意の値を含める必要があります。',
    'less_than'             => 'フィールド {field} には {param} より小さい値を含める必要があります。',
    'less_than_equal_to'    => 'フィールド {field} には {param} 以下の値を含める必要があります。',
    'matches'               => 'フィールド {field} はフィールド {param} と一致しません。',
    'max_length'            => 'フィールド {field} の長さは {param} 文字を超えてはいけません。',
    'min_length'            => 'フィールド {field} の長さは少なくとも {param} 文字でなければなりません。',
    'not_equals'            => 'フィールド {field} は {param} であってはなりません。',
    'not_in_list'           => 'フィールド {field} は次の値のいずれでもあってはなりません: {param}。',
    'numeric'               => 'フィールド {field} には数字のみを含めることができます。',
    'regex_match'           => 'フィールド {field} の形式が正しくありません。',
    'required'              => 'フィールド {field} は必須項目です。',
    'required_with'         => 'フィールド {field} は {param} が値を持っている場合は必須項目です。',
    'required_without'      => 'フィールド {field} は {param} が値を持っていない場合は必須項目です。',
    'string'                => 'フィールド {field} は文字列でなければなりません。',
    'timezone'              => 'フィールド {field} はタイムゾーンでなければなりません。',
    'valid_base64'          => 'フィールド {field} にはbase64文字列を含める必要があります。',
    'valid_email'           => 'フィールド {field} には有効なメールアドレスを含める必要があります。',
    'valid_emails'          => 'フィールド {field} には有効なメールアドレスを含める必要があります。',
    'valid_ip'              => 'フィールド {field} には有効なIPアドレスを含める必要があります。',
    'valid_url'             => 'フィールド {field} には有効なURLを含める必要があります。',
    'valid_url_strict'      => 'フィールド {field} には有効なURLを含める必要があります。',
    'valid_date'            => 'フィールド {field} には有効な日付を含める必要があります。',
    'valid_json'            => 'フィールド {field} にはJSON値を含める必要があります。',

    // Credit Cards
    'valid_cc_num' => '{field} は有効なクレジットカード番号ではないようです。',

    // Files
    'uploaded' => '{field} アップロードされたファイルが正しくありません。',
    'max_size' => '{field} が許容される容量を超えています。',
    'is_image' => '{field} アップロードされた画像が正しくありません。',
    'mime_in'  => '{field} のMIMEタイプが正しくありません。',
    'ext_in'   => '{field} のファイル拡張子が正しくありません。',
    'max_dims' => '{field} は画像ではないか、長さまたは幅が許可されたサイズを超えています。',
];
