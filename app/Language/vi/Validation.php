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
    'noRuleSets'      => 'Không có tập hợp quy tắc nào được chỉ định trong cấu hình xác thực',
    'ruleNotFound'    => '"{0}" không phải là một quy tắc đúng.',
    'groupNotFound'   => '"{0}" không phải là một nhóm quy tắc xác thực.',
    'groupNotArray'   => '"{0}" nhóm xác thực phãi là một dãy.',
    'invalidTemplate' => '"{0}" không phải một mẫu đúng.',

    // Rule Messages
    'alpha'                 => 'Mục {field} chỉ được chứa ký tự chữ cái.',
    'alpha_dash'            => 'Mục {field} chỉ được chứa ký tự chữ cái, "_", và "-".',
    'alpha_numeric'         => 'Mục {field} chỉ được chứa ký tự chữ cái hoặc số.',
    'alpha_numeric_punct'   => 'Mục {field} chỉ được chứa ký tự chữ cái, số, khoảng trắng, và các ký hiệu "~ ! # $ % & * - _ + = | : .".',
    'alpha_numeric_space'   => 'Mục {field} chỉ được chứa ký tự chữ cái, số và khoảng trắng.',
    'alpha_space'           => 'Mục {field} chỉ được chứa ký tự chữ cái và khoảng trắng.',
    'decimal'               => 'Mục {field} chỉ được chứa số thập phân.',
    'differs'               => 'Mục {field} phải khác với mục {param}.',
    'equals'                => 'Mục {field} phải là: {param}.',
    'exact_length'          => 'Mục {field} phải có chiều dài chính xác là {param} ký tự.',
    'greater_than'          => 'Mục {field} phải chứa số có giá trị lớn hơn {param}.',
    'greater_than_equal_to' => 'Mục {field} phải chứa số có giá trị lớn hơn hoặc bằng {param}.',
    'hex'                   => 'Mục {field} chỉ được chứa ký tự thập lục phân.',
    'in_list'               => 'Mục {field} phải thuộc một trong các giá trị sau: {param}.',
    'integer'               => 'Mục {field} phải là số nguyên.',
    'is_natural'            => 'Mục {field} phải là số tự nhiên.',
    'is_natural_no_zero'    => 'Mục {field} phải là số nguyên dương.',
    'is_not_unique'         => 'Mục {field} phải chứa một giá trị tồn tại trong cơ sở dữ liệu.',
    'is_unique'             => 'Mục {field} phải chứa một giá trị độc nhất.',
    'less_than'             => 'Mục {field} phải chứa một số có giá trị nhỏ hơn {param}.',
    'less_than_equal_to'    => 'Mục {field} phải chứa một số có giá trị nhỏ hơn hoặc bằng {param}.',
    'matches'               => 'Mục {field} không giống với mục {param}.',
    'max_length'            => 'Mục {field} chiều dài không được vượt quá {param} ký tự.',
    'min_length'            => 'Mục {field} phải có chiều dài ít nhất {param} ký tự.',
    'not_equals'            => 'Mục {field} không được là: {param}.',
    'not_in_list'           => 'Mục {field} không được là một trong các giá trị sau: {param}.',
    'numeric'               => 'Mục {field} chỉ được chứa số.',
    'regex_match'           => 'Mục {field} có định dạng không đúng.',
    'required'              => 'Mục {field} là trường bắt buộc nhập.',
    'required_with'         => 'Mục {field} là trường bắt buộc nhập khi {param} có giá trị.',
    'required_without'      => 'Mục {field} là trường bắt buộc nhập khi {param} không có giá trị.',
    'string'                => 'Mục {field} phải là một chuỗi.',
    'timezone'              => 'Mục {field} phải là múi giờ.',
    'valid_base64'          => 'Mục {field} phải là chuối base64.',
    'valid_email'           => 'Mục {field} yêu cầu nhập đúng địa chỉ email.',
    'valid_emails'          => 'Mục {field} yêu cầu nhập đúng các địa chỉ email.',
    'valid_ip'              => 'Mục {field} yêu cầu nhập đúng địa chỉ IP.',
    'valid_url'             => 'Mục {field} yêu cầu nhập đúng URL.',
    'valid_url_strict'      => 'Mục {field} yêu cầu nhập đúng URL.',
    'valid_date'            => 'Mục {field} yêu cầu nhập đúng ngày.',
    'valid_json'            => 'Mục {field} phải chứa giá trị json.',

    // Credit Cards
    'valid_cc_num' => '{field} có vẻ không phải số thẻ tín dụng đúng.',

    // Files
    'uploaded' => '{field} tệp đăng tải không đúng.',
    'max_size' => '{field} quá dung lượng cho phép.',
    'is_image' => '{field} hình ảnh đăng tải không đúng.',
    'mime_in'  => '{field} kiểu mime không đúng.',
    'ext_in'   => '{field} đuôi tệp không đúng.',
    'max_dims' => '{field} không phải là hình ảnh, hoặc chiều dài / chiều rộng vượt quá kích cỡ cho phép.',
];
