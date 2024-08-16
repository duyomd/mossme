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
    'noRuleSets'      => 'Validation कॉन्फिगरेशनमध्ये कोणतेही नियम संच निर्दिष्ट केलेले नाहीत.',
    'ruleNotFound'    => '"{0}" एक वैध नियम नाही.',
    'groupNotFound'   => '"{0}" एक वैध नियम समूह नाही.',
    'groupNotArray'   => '"{0}" नियम समूह एक अरे असावा लागतो.',
    'invalidTemplate' => '"{0}" एक वैध Validation टेम्पलेट नाही.',
    
    // Rule Messages
    'alpha'                 => '{field} क्षेत्रात फक्त वर्णमाला अक्षरच असू शकतात.',
    'alpha_dash'            => '{field} क्षेत्रात फक्त वर्णमाला, अंक, अंडरस्कोअर आणि डॅश असू शकतात.',
    'alpha_numeric'         => '{field} क्षेत्रात फक्त वर्णमाला आणि अंक असू शकतात.',
    'alpha_numeric_punct'   => '{field} क्षेत्रात फक्त वर्णमाला, अंक, जागा आणि ~ ! # $ % & * - _ + = | : . या वर्णांचा समावेश असू शकतो.',
    'alpha_numeric_space'   => '{field} क्षेत्रात फक्त वर्णमाला आणि जागा असू शकतात.',
    'alpha_space'           => '{field} क्षेत्रात फक्त वर्णमाला अक्षर आणि जागा असू शकतात.',
    'decimal'               => '{field} क्षेत्रात दशांश संख्या असावी लागते.',
    'differs'               => '{field} क्षेत्राने {param} क्षेत्रापेक्षा वेगळे असावे.',
    'equals'                => '{field} क्षेत्राने अचूक: {param} असावे.',
    'exact_length'          => '{field} क्षेत्राची लांबी अचूक {param} वर्ण असावी.',
    'greater_than'          => '{field} क्षेत्रात {param} पेक्षा मोठी संख्या असावी.',
    'greater_than_equal_to' => '{field} क्षेत्रात {param} पेक्षा मोठी किंवा समान संख्या असावी.',
    'hex'                   => '{field} क्षेत्रात फक्त हेक्साडेसिमल वर्ण असू शकतात.',
    'in_list'               => '{field} क्षेत्राने: {param} यापैकी एक असावे.',
    'integer'               => '{field} क्षेत्रात एक पूर्णांक असावा.',
    'is_natural'            => '{field} क्षेत्रात फक्त अंक असावे.',
    'is_natural_no_zero'    => '{field} क्षेत्रात फक्त अंक असावे आणि ते शून्यपेक्षा मोठे असावे.',
    'is_not_unique'         => '{field} क्षेत्रात डेटाबेसमध्ये पूर्वी अस्तित्वात असलेली मूल्य असावी.',
    'is_unique'             => '{field} क्षेत्रात एक अद्वितीय मूल्य असावे.',
    'less_than'             => '{field} क्षेत्रात {param} पेक्षा कमी संख्या असावी.',
    'less_than_equal_to'    => '{field} क्षेत्रात {param} पेक्षा कमी किंवा समान संख्या असावी.',
    'matches'               => '{field} क्षेत्र {param} क्षेत्राशी जुळत नाही.',
    'max_length'            => '{field} क्षेत्राची लांबी {param} वर्णांपेक्षा जास्त असू शकत नाही.',
    'min_length'            => '{field} क्षेत्राची लांबी किमान {param} वर्ण असावी.',
    'not_equals'            => '{field} क्षेत्र {param} असू नये.',
    'not_in_list'           => '{field} क्षेत्राने: {param} यापैकी एक नसावे.',
    'numeric'               => '{field} क्षेत्रात फक्त संख्याच असू शकतात.',
    'regex_match'           => '{field} क्षेत्र योग्य स्वरूपात नाही.',
    'required'              => '{field} क्षेत्र आवश्यक आहे.',
    'required_with'         => '{field} क्षेत्र आवश्यक आहे जेव्हा {param} अस्तित्वात आहे.',
    'required_without'      => '{field} क्षेत्र आवश्यक आहे जेव्हा {param} अस्तित्वात नाही.',
    'string'                => '{field} क्षेत्र एक वैध स्ट्रिंग असावे.',
    'timezone'              => '{field} क्षेत्र एक वैध टाइमझोन असावे.',
    'valid_base64'          => '{field} क्षेत्र एक वैध बेस64 स्ट्रिंग असावे.',
    'valid_email'           => '{field} क्षेत्रात एक वैध ईमेल पत्ता असावा.',
    'valid_emails'          => '{field} क्षेत्रात सर्व वैध ईमेल पत्ते असावे.',
    'valid_ip'              => '{field} क्षेत्रात एक वैध IP असावा.',
    'valid_url'             => '{field} क्षेत्रात एक वैध URL असावा.',
    'valid_url_strict'      => '{field} क्षेत्रात एक वैध URL असावा.',
    'valid_date'            => '{field} क्षेत्रात एक वैध दिनांक असावी.',
    'valid_json'            => '{field} क्षेत्रात एक वैध JSON असावा.',
    
    // Credit Cards
    'valid_cc_num' => '{field} एक वैध क्रेडिट कार्ड क्रमांक नाही असे दिसते.',
    
    // Files
    'uploaded' => '{field} एक वैध अपलोड केलेला फाइल नाही.',
    'max_size' => '{field} खूप मोठा फाइल आहे.',
    'is_image' => '{field} एक वैध, अपलोड केलेली प्रतिमा फाइल नाही.',
    'mime_in'  => '{field} एक वैध MIME प्रकार नाही.',
    'ext_in'   => '{field} एक वैध फाइल विस्तार नाही.',
    'max_dims' => '{field} एक प्रतिमा नाही किंवा ती खूप रुंद किंवा उंच आहे.',
];
