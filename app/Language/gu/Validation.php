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
    'noRuleSets'      => 'પ્રામાણિકરણ કોનફિગરેશનમાં કોઈ નિયમ સમૂહ નિર્ધારિત નથી.',
    'ruleNotFound'    => '"{0}" માન્ય નિયમ નથી.',
    'groupNotFound'   => '"{0}" માન્ય નિયમોનું જૂથ નથી.',
    'groupNotArray'   => '"{0}" નિયમ જૂથ એ એરે હોવું જોઈએ.',
    'invalidTemplate' => '"{0}" માન્ય પ્રામાણિકરણ ટેમ્પ્લેટ નથી.',

    // Rule Messages
    'alpha'                 => '{field} ફીલ્ડમાં માત્ર અક્ષરીય ચરિત્રો જ હોવા જોઈએ.',
    'alpha_dash'            => '{field} ફીલ્ડમાં માત્ર અક્ષરીય અને આલ્ફાન્યુમેરિક ચરિત્રો, અંડરસ્કોર અને ડેશ અક્ષરો હોવા જોઈએ.',
    'alpha_numeric'         => '{field} ફીલ્ડમાં માત્ર અક્ષરીય અને આલ્ફાન્યુમેરિક ચરિત્રો જ હોવા જોઈએ.',
    'alpha_numeric_punct'   => '{field} ફીલ્ડમાં માત્ર અક્ષરીય, આલ્ફાન્યુમેરિક, જગ્યા અને ~ ! # $ % & * - _ + = | : . અક્ષરો હોવા જોઈએ.',
    'alpha_numeric_space'   => '{field} ફીલ્ડમાં માત્ર અક્ષરીય અને જગ્યા ચરિત્રો હોવા જોઈએ.',
    'alpha_space'           => '{field} ફીલ્ડમાં માત્ર અક્ષરીય ચરિત્રો અને જગ્યા હોવી જોઈએ.',
    'decimal'               => '{field} ફીલ્ડમાં દશાંશ સંખ્યા હોવી જોઈએ.',
    'differs'               => '{field} ફીલ્ડમાં {param} ફીલ્ડથી અલગ હોવું જોઈએ.',
    'equals'                => '{field} ફીલ્ડમાં ચોક્કસ {param} હોવું જોઈએ.',
    'exact_length'          => '{field} ફીલ્ડમાં {param} અક્ષરોના સમાન લંબાઇ હોવી જોઈએ.',
    'greater_than'          => '{field} ફીલ્ડમાં {param} કરતા મોટી સંખ્યા હોવી જોઈએ.',
    'greater_than_equal_to' => '{field} ફીલ્ડમાં {param} કરતા મોટી અથવા સમાન સંખ્યા હોવી જોઈએ.',
    'hex'                   => '{field} ફીલ્ડમાં માત્ર હેક્સાડેસિમલ ચરિત્રો હોવા જોઈએ.',
    'in_list'               => '{field} ફીલ્ડમાંથી {param}માં એક હોવું જોઈએ.',
    'integer'               => '{field} ફીલ્ડમાં પૂર્ણાંક હોવું જોઈએ.',
    'is_natural'            => '{field} ફીલ્ડમાં માત્ર આંકડા હોવા જોઈએ.',
    'is_natural_no_zero'    => '{field} ફીલ્ડમાં માત્ર આંકડા હોવા જોઈએ અને તે શૂન્ય કરતાં મોટું હોવું જોઈએ.',
    'is_not_unique'         => '{field} ફીલ્ડમાં ડેટાબેઝમાં અગાઉ રહેલું મૂલ્ય હોવું જોઈએ.',
    'is_unique'             => '{field} ફીલ્ડમાં અનન્ય મૂલ્ય હોવું જોઈએ.',
    'less_than'             => '{field} ફીલ્ડમાં {param} કરતાં નાના સંખ્યા હોવી જોઈએ.',
    'less_than_equal_to'    => '{field} ફીલ્ડમાં {param} કરતાં નાના અથવા સમાન સંખ્યા હોવી જોઈએ.',
    'matches'               => '{field} ફીલ્ડ {param} ફીલ્ડ સાથે મેળ ખાતું નથી.',
    'max_length'            => '{field} ફીલ્ડમાં {param} અક્ષરો કરતાં વધુ નથી હોવું જોઈએ.',
    'min_length'            => '{field} ફીલ્ડમાં {param} અક્ષરો કરતાં ઓછું હોવું જોઈએ.',
    'not_equals'            => '{field} ફીલ્ડ {param} નથી હોવું જોઈએ.',
    'not_in_list'           => '{field} ફીલ્ડમાંથી {param}માં એક હોવું ન જોઈએ.',
    'numeric'               => '{field} ફીલ્ડમાં માત્ર સંખ્યાઓ હોવી જોઈએ.',
    'regex_match'           => '{field} ફીલ્ડ યોગ્ય ફોર્મેટમાં નથી.',
    'required'              => '{field} ફીલ્ડ જરૂરી છે.',
    'required_with'         => '{field} ફીલ્ડ ત્યારે જરૂરી છે જ્યારે {param} હાજર હોય.',
    'required_without'      => '{field} ફીલ્ડ ત્યારે જરૂરી છે જ્યારે {param} હાજર ન હોય.',
    'string'                => '{field} ફીલ્ડ માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'timezone'              => '{field} ફીલ્ડ માન્ય સમયક્ષેત્ર હોવું જોઈએ.',
    'valid_base64'          => '{field} ફીલ્ડ માન્ય base64 સ્ટ્રિંગ હોવું જોઈએ.',
    'valid_email'           => '{field} ફીલ્ડ માન્ય ઇમેઇલ સરનામું હોવું જોઈએ.',
    'valid_emails'          => '{field} ફીલ્ડમાં બધા માન્ય ઇમેઇલ સરનામા હોવા જોઈએ.',
    'valid_ip'              => '{field} ફીલ્ડમાં માન્ય IP હોવું જોઈએ.',
    'valid_url'             => '{field} ફીલ્ડમાં માન્ય URL હોવું જોઈએ.',
    'valid_url_strict'      => '{field} ફીલ્ડમાં માન્ય URL હોવું જોઈએ.',
    'valid_date'            => '{field} ફીલ્ડમાં માન્ય તારીખ હોવી જોઈએ.',
    'valid_json'            => '{field} ફીલ્ડમાં માન્ય JSON હોવું જોઈએ.',

    // Credit Cards
    'valid_cc_num' => '{field} માન્ય ક્રેડિટ કાર્ડ નંબર દેખાતું નથી.',

    // Files
    'uploaded' => '{field} માન્ય અપલોડ કરેલ ફાઇલ નથી.',
    'max_size' => '{field} ફાઇલ બહુ મોટી છે.',
    'is_image' => '{field} માન્ય, અપલોડ કરેલ છબી ફાઇલ નથી.',
    'mime_in'  => '{field} માન્ય MIME પ્રકાર નથી.',
    'ext_in'   => '{field} માન્ય ફાઇલ એક્સટેંશન નથી.',
    'max_dims' => '{field} છબી નથી, અથવા ખૂબ પહોળી કે ઊંચી છે.',
];
