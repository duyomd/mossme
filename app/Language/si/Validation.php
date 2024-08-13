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
    'noRuleSets'      => 'සත්‍යාපන සැකසුමේ නීති සෙට් කිසිවක් නියම නොකරන ලදී.',
    'ruleNotFound'    => '"{0}" වලංගු නීතියක් නොවේ.',
    'groupNotFound'   => '"{0}" වලංගු නීති කණ්ඩායමක් නොවේ.',
    'groupNotArray'   => '"{0}" නීති කණ්ඩායම යනු ආරේ කණ්ඩායමක් විය යුතුය.',
    'invalidTemplate' => '"{0}" වලංගු සත්‍යාපන ආකෘතියක් නොවේ.',

    // Rule Messages
    'alpha'                 => '{field} ක්ෂේත්‍රය කීර්තිකාරක අක්ෂර මැදීමක් පමණක් අඩංගු විය යුතුය.',
    'alpha_dash'            => '{field} ක්ෂේත්‍රය අක්ෂර, අංක, ආපසු සහ රේඛා අක්ෂර මැදීමක් පමණක් අඩංගු විය යුතුය.',
    'alpha_numeric'         => '{field} ක්ෂේත්‍රය අක්ෂර හා අංක මැදීමක් පමණක් අඩංගු විය යුතුය.',
    'alpha_numeric_punct'   => '{field} ක්ෂේත්‍රය අක්ෂර, අංක, අවකාශ සහ ~ ! # $ % & * - _ + = | : . අක්ෂර පමණක් අඩංගු විය යුතුය.',
    'alpha_numeric_space'   => '{field} ක්ෂේත්‍රය අක්ෂර හා අවකාශ මැදීමක් පමණක් අඩංගු විය යුතුය.',
    'alpha_space'           => '{field} ක්ෂේත්‍රය අක්ෂර හා අවකාශ මැදීමක් පමණක් අඩංගු විය යුතුය.',
    'decimal'               => '{field} ක්ෂේත්‍රය දශම සංඛ්‍යා විය යුතුය.',
    'differs'               => '{field} ක්ෂේත්‍රය {param} ක්ෂේත්‍රය මෙන් නොවිය යුතුය.',
    'equals'                => '{field} ක්ෂේත්‍රය සම්පූර්ණයෙන්ම: {param} විය යුතුය.',
    'exact_length'          => '{field} ක්ෂේත්‍රය සම්පූර්ණයෙන්ම {param} අක්ෂර දිග විය යුතුය.',
    'greater_than'          => '{field} ක්ෂේත්‍රය {param} තවත් වැඩි සංඛ්‍යාවක් විය යුතුය.',
    'greater_than_equal_to' => '{field} ක්ෂේත්‍රය {param} තවත් වැඩි හෝ සමාන සංඛ්‍යා විය යුතුය.',
    'hex'                   => '{field} ක්ෂේත්‍රය හෙක්සාඩෙසමල් අක්ෂර මැදීමක් පමණක් අඩංගු විය යුතුය.',
    'in_list'               => '{field} ක්ෂේත්‍රය: {param} අතර එකක් විය යුතුය.',
    'integer'               => '{field} ක්ෂේත්‍රය සම්පූර්ණ සංඛ්‍යාවක් විය යුතුය.',
    'is_natural'            => '{field} ක්ෂේත්‍රය කීර්තිකාරක අංක පමණක් අඩංගු විය යුතුය.',
    'is_natural_no_zero'    => '{field} ක්ෂේත්‍රය කීර්තිකාරක අංක සහ සූන්‍යය ට වැඩි විය යුතුය.',
    'is_not_unique'         => '{field} ක්ෂේත්‍රය දත්ත ගබඩාව තුළ පෙර තිබෙන අගයක් අඩංගු විය යුතුය.',
    'is_unique'             => '{field} ක්ෂේත්‍රය විශේෂිත අගයක් අඩංගු විය යුතුය.',
    'less_than'             => '{field} ක්ෂේත්‍රය {param} ට අඩු සංඛ්‍යා විය යුතුය.',
    'less_than_equal_to'    => '{field} ක්ෂේත්‍රය {param} ට අඩු හෝ සමාන සංඛ්‍යා විය යුතුය.',
    'matches'               => '{field} ක්ෂේත්‍රය {param} ක්ෂේත්‍රය සමඟ නොගැලපේ.',
    'max_length'            => '{field} ක්ෂේත්‍රය {param} අක්ෂර වඩා අධික දිගක් නොවිය යුතුය.',
    'min_length'            => '{field} ක්ෂේත්‍රය {param} අක්ෂර අඩංගු විය යුතුය.',
    'not_equals'            => '{field} ක්ෂේත්‍රය: {param} විය නොහැක.',
    'not_in_list'           => '{field} ක්ෂේත්‍රය: {param} අතර එකක් නොවිය යුතුය.',
    'numeric'               => '{field} ක්ෂේත්‍රය සංඛ්‍යා පමණක් අඩංගු විය යුතුය.',
    'regex_match'           => '{field} ක්ෂේත්‍රය සවිස්තරයෙන් හරි රූපයට නොවේ.',
    'required'              => '{field} ක්ෂේත්‍රය අවශ්‍යය.',
    'required_with'         => '{field} ක්ෂේත්‍රය {param} පවතින විට අවශ්‍යය.',
    'required_without'      => '{field} ක්ෂේත්‍රය {param} නොමැති විට අවශ්‍යය.',
    'string'                => '{field} ක්ෂේත්‍රය වලංගු ස්ත්‍රිං විය යුතුය.',
    'timezone'              => '{field} ක්ෂේත්‍රය වලංගු කාල කලාපය විය යුතුය.',
    'valid_base64'          => '{field} ක්ෂේත්‍රය වලංගු base64 ස්ත්‍රිං විය යුතුය.',
    'valid_email'           => '{field} ක්ෂේත්‍රය වලංගු ඊ-මේල් ලිපිනයක් අඩංගු විය යුතුය.',
    'valid_emails'          => '{field} ක්ෂේත්‍රය සියලු වලංගු ඊ-මේල් ලිපින අඩංගු විය යුතුය.',
    'valid_ip'              => '{field} ක්ෂේත්‍රය වලංගු IP අඩංගු විය යුතුය.',
    'valid_url'             => '{field} ක්ෂේත්‍රය වලංගු URL අඩංගු විය යුතුය.',
    'valid_url_strict'      => '{field} ක්ෂේත්‍රය වලංගු URL අඩංගු විය යුතුය.',
    'valid_date'            => '{field} ක්ෂේත්‍රය වලංගු දිනය අඩංගු විය යුතුය.',
    'valid_json'            => '{field} ක්ෂේත්‍රය වලංගු json අඩංගු විය යුතුය.',

    // Credit Cards
    'valid_cc_num' => '{field} වලංගු ක්‍රෙඩිට් කාඩ් අංකයක් නොවන්නේය.',

    // Files
    'uploaded' => '{field} වලංගු උඩුගත කරන ලද ගොනුවක් නොවේ.',
    'max_size' => '{field} ගොනුව හුඟාක් විශාලයි.',
    'is_image' => '{field} වලංගු, උඩුගත කරන ලද රූප ගොනුවක් නොවේ.',
    'mime_in'  => '{field} වලංගු mime ප්‍රතිලාභයක් නොමැත.',
    'ext_in'   => '{field} වලංගු ගොනුවේ විශේෂාංගයක් නොමැත.',
    'max_dims' => '{field} රූපයක් නොවන්නේය, හෝ එය ඈත හෝ උසට විශාලයි.',
];
