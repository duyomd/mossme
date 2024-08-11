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
    'noRuleSets'      => '검증 구성에서 규칙 집합이 지정되지 않았습니다.',
    'ruleNotFound'    => '"{0}"은(는) 유효한 규칙이 아닙니다.',
    'groupNotFound'   => '"{0}"은(는) 검증 규칙 그룹이 아닙니다.',
    'groupNotArray'   => '"{0}" 규칙 그룹은 배열이어야 합니다.',
    'invalidTemplate' => '"{0}"은(는) 유효한 검증 템플릿이 아닙니다.',

    // Rule Messages
    'alpha'                 => '{field} 필드는 알파벳 문자만 포함할 수 있습니다.',
    'alpha_dash'            => '{field} 필드는 알파벳, 숫자, 밑줄, 대시 문자만 포함할 수 있습니다.',
    'alpha_numeric'         => '{field} 필드는 알파벳과 숫자만 포함할 수 있습니다.',
    'alpha_numeric_punct'   => '{field} 필드는 알파벳, 숫자, 공백, ~ ! # $ % & * - _ + = | : . 문자만 포함할 수 있습니다.',
    'alpha_numeric_space'   => '{field} 필드는 알파벳과 공백 문자만 포함할 수 있습니다.',
    'alpha_space'           => '{field} 필드는 알파벳 문자와 공백만 포함할 수 있습니다.',
    'decimal'               => '{field} 필드는 소수점을 포함해야 합니다.',
    'differs'               => '{field} 필드는 {param} 필드와 달라야 합니다.',
    'equals'                => '{field} 필드는 정확히 {param}이어야 합니다.',
    'exact_length'          => '{field} 필드는 정확히 {param} 문자 길이여야 합니다.',
    'greater_than'          => '{field} 필드는 {param}보다 큰 숫자를 포함해야 합니다.',
    'greater_than_equal_to' => '{field} 필드는 {param}보다 크거나 같은 숫자를 포함해야 합니다.',
    'hex'                   => '{field} 필드는 16진수 문자만 포함할 수 있습니다.',
    'in_list'               => '{field} 필드는 다음 중 하나여야 합니다: {param}.',
    'integer'               => '{field} 필드는 정수여야 합니다.',
    'is_natural'            => '{field} 필드는 숫자만 포함해야 합니다.',
    'is_natural_no_zero'    => '{field} 필드는 숫자만 포함해야 하며, 0보다 커야 합니다.',
    'is_not_unique'         => '{field} 필드는 데이터베이스에 존재하는 값이어야 합니다.',
    'is_unique'             => '{field} 필드는 고유한 값이어야 합니다.',
    'less_than'             => '{field} 필드는 {param}보다 작은 숫자를 포함해야 합니다.',
    'less_than_equal_to'    => '{field} 필드는 {param}보다 작거나 같은 숫자를 포함해야 합니다.',
    'matches'               => '{field} 필드는 {param} 필드와 일치하지 않습니다.',
    'max_length'            => '{field} 필드는 {param}자를 초과할 수 없습니다.',
    'min_length'            => '{field} 필드는 최소 {param}자 이상이어야 합니다.',
    'not_equals'            => '{field} 필드는 {param}과 같을 수 없습니다.',
    'not_in_list'           => '{field} 필드는 다음 중 하나가 아니어야 합니다: {param}.',
    'numeric'               => '{field} 필드는 숫자만 포함해야 합니다.',
    'regex_match'           => '{field} 필드의 형식이 올바르지 않습니다.',
    'required'              => '{field} 필드는 필수입니다.',
    'required_with'         => '{field} 필드는 {param}이(가) 있을 때 필수입니다.',
    'required_without'      => '{field} 필드는 {param}이(가) 없을 때 필수입니다.',
    'string'                => '{field} 필드는 유효한 문자열이어야 합니다.',
    'timezone'              => '{field} 필드는 유효한 시간대이어야 합니다.',
    'valid_base64'          => '{field} 필드는 유효한 base64 문자열이어야 합니다.',
    'valid_email'           => '{field} 필드는 유효한 이메일 주소여야 합니다.',
    'valid_emails'          => '{field} 필드는 모든 유효한 이메일 주소를 포함해야 합니다.',
    'valid_ip'              => '{field} 필드는 유효한 IP 주소여야 합니다.',
    'valid_url'             => '{field} 필드는 유효한 URL이어야 합니다.',
    'valid_url_strict'      => '{field} 필드는 유효한 URL이어야 합니다.',
    'valid_date'            => '{field} 필드는 유효한 날짜여야 합니다.',
    'valid_json'            => '{field} 필드는 유효한 JSON이어야 합니다.',

    // Credit Cards
    'valid_cc_num' => '{field}는 유효한 신용카드 번호가 아닌 것 같습니다.',

    // Files
    'uploaded' => '{field}는 유효한 업로드 파일이 아닙니다.',
    'max_size' => '{field}는 파일 크기가 너무 큽니다.',
    'is_image' => '{field}는 유효한 업로드 이미지 파일이 아닙니다.',
    'mime_in'  => '{field}는 유효한 MIME 타입이 아닙니다.',
    'ext_in'   => '{field}는 유효한 파일 확장자가 아닙니다.',
    'max_dims' => '{field}는 이미지가 아니거나, 너무 넓거나 높습니다.',
];
