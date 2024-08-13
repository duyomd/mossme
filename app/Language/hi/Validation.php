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
    'noRuleSets'      => 'मान्यकरण कॉन्फ़िगरेशन में कोई नियम सेट निर्दिष्ट नहीं किया गया है।',
    'ruleNotFound'    => '"{0}" एक मान्य नियम नहीं है।',
    'groupNotFound'   => '"{0}" एक मान्यकरण नियम समूह नहीं है।',
    'groupNotArray'   => '"{0}" नियम समूह एक सरणी होना चाहिए।',
    'invalidTemplate' => '"{0}" एक मान्य मान्यकरण टेम्पलेट नहीं है।',

    // Rule Messages
    'alpha'                 => '{field} क्षेत्र में केवल अक्षर हो सकते हैं।',
    'alpha_dash'            => '{field} क्षेत्र में केवल अल्फ़ान्यूमेरिक, अंडरस्कोर, और डैश वर्ण हो सकते हैं।',
    'alpha_numeric'         => '{field} क्षेत्र में केवल अल्फ़ान्यूमेरिक वर्ण हो सकते हैं।',
    'alpha_numeric_punct'   => '{field} क्षेत्र में केवल अल्फ़ान्यूमेरिक वर्ण, स्पेस, और  ~ ! # $ % & * - _ + = | : . वर्ण हो सकते हैं।',
    'alpha_numeric_space'   => '{field} क्षेत्र में केवल अल्फ़ान्यूमेरिक और स्पेस वर्ण हो सकते हैं।',
    'alpha_space'           => '{field} क्षेत्र में केवल अक्षर और स्पेस हो सकते हैं।',
    'decimal'               => '{field} क्षेत्र में एक दशमलव संख्या होनी चाहिए।',
    'differs'               => '{field} क्षेत्र {param} क्षेत्र से भिन्न होना चाहिए।',
    'equals'                => '{field} क्षेत्र बिल्कुल: {param} होना चाहिए।',
    'exact_length'          => '{field} क्षेत्र की लंबाई बिल्कुल {param} वर्णों की होनी चाहिए।',
    'greater_than'          => '{field} क्षेत्र में {param} से अधिक संख्या होनी चाहिए।',
    'greater_than_equal_to' => '{field} क्षेत्र में {param} या उससे अधिक संख्या होनी चाहिए।',
    'hex'                   => '{field} क्षेत्र में केवल हेक्साडेसिमल वर्ण हो सकते हैं।',
    'in_list'               => '{field} क्षेत्र को इनमें से एक होना चाहिए: {param}।',
    'integer'               => '{field} क्षेत्र में एक पूर्णांक संख्या होनी चाहिए।',
    'is_natural'            => '{field} क्षेत्र में केवल अंक हो सकते हैं।',
    'is_natural_no_zero'    => '{field} क्षेत्र में केवल अंक हो सकते हैं और यह शून्य से बड़ा होना चाहिए।',
    'is_not_unique'         => '{field} क्षेत्र में डेटाबेस में पहले से मौजूद मान होना चाहिए।',
    'is_unique'             => '{field} क्षेत्र में एक अद्वितीय मान होना चाहिए।',
    'less_than'             => '{field} क्षेत्र में {param} से कम संख्या होनी चाहिए।',
    'less_than_equal_to'    => '{field} क्षेत्र में {param} या उससे कम संख्या होनी चाहिए।',
    'matches'               => '{field} क्षेत्र {param} क्षेत्र से मेल नहीं खाता।',
    'max_length'            => '{field} क्षेत्र की लंबाई {param} वर्णों से अधिक नहीं हो सकती।',
    'min_length'            => '{field} क्षेत्र की लंबाई कम से कम {param} वर्णों की होनी चाहिए।',
    'not_equals'            => '{field} क्षेत्र {param} नहीं हो सकता।',
    'not_in_list'           => '{field} क्षेत्र इनमें से एक नहीं होना चाहिए: {param}।',
    'numeric'               => '{field} क्षेत्र में केवल संख्याएँ होनी चाहिए।',
    'regex_match'           => '{field} क्षेत्र सही प्रारूप में नहीं है।',
    'required'              => '{field} क्षेत्र आवश्यक है।',
    'required_with'         => '{field} क्षेत्र आवश्यक है जब {param} मौजूद हो।',
    'required_without'      => '{field} क्षेत्र आवश्यक है जब {param} मौजूद नहीं हो।',
    'string'                => '{field} क्षेत्र एक मान्य स्ट्रिंग होना चाहिए।',
    'timezone'              => '{field} क्षेत्र एक मान्य समयक्षेत्र होना चाहिए।',
    'valid_base64'          => '{field} क्षेत्र एक मान्य बेस64 स्ट्रिंग होना चाहिए।',
    'valid_email'           => '{field} क्षेत्र में एक मान्य ईमेल पता होना चाहिए।',
    'valid_emails'          => '{field} क्षेत्र में सभी मान्य ईमेल पते होने चाहिए।',
    'valid_ip'              => '{field} क्षेत्र में एक मान्य IP होना चाहिए।',
    'valid_url'             => '{field} क्षेत्र में एक मान्य URL होना चाहिए।',
    'valid_url_strict'      => '{field} क्षेत्र में एक मान्य URL होना चाहिए।',
    'valid_date'            => '{field} क्षेत्र में एक मान्य तिथि होनी चाहिए।',
    'valid_json'            => '{field} क्षेत्र में एक मान्य JSON होना चाहिए।',

    // Credit Cards
    'valid_cc_num' => '{field} एक मान्य क्रेडिट कार्ड संख्या नहीं लगता है।',

    // Files
    'uploaded' => '{field} एक मान्य अपलोड की गई फाइल नहीं है।',
    'max_size' => '{field} फाइल बहुत बड़ी है।',
    'is_image' => '{field} एक मान्य अपलोड की गई छवि फाइल नहीं है।',
    'mime_in'  => '{field} में एक मान्य MIME प्रकार नहीं है।',
    'ext_in'   => '{field} में एक मान्य फाइल एक्सटेंशन नहीं है।',
    'max_dims' => '{field} या तो छवि नहीं है, या यह बहुत चौड़ी या लंबी है।',
];
