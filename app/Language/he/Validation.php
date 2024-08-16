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
    'noRuleSets'      => 'לא צוין קבוצת כללים בתצורת האימות.',
    'ruleNotFound'    => '"{0}" אינו כלל תקף.',
    'groupNotFound'   => '"{0}" אינו קבוצת כללים תקפה.',
    'groupNotArray'   => 'קבוצת הכללים "{0}" חייבת להיות מערך.',
    'invalidTemplate' => '"{0}" אינו תבנית אימות תקפה.',

    // Rule Messages
    'alpha'                 => 'שדה {field} יכול להכיל רק תווים אלפביתיים.',
    'alpha_dash'            => 'שדה {field} יכול להכיל רק תווים אלפביים, קווים תחתונים ומקפים.',
    'alpha_numeric'         => 'שדה {field} יכול להכיל רק תווים אלפביים ודיגיטליים.',
    'alpha_numeric_punct'   => 'שדה {field} יכול להכיל רק תווים אלפביים, רווחים ותווים ~ ! # $ % & * - _ + = | : . .',
    'alpha_numeric_space'   => 'שדה {field} יכול להכיל רק תווים אלפביים ורווחים.',
    'alpha_space'           => 'שדה {field} יכול להכיל רק תווים אלפביים ורווחים.',
    'decimal'               => 'שדה {field} חייב להכיל מספר עשרוני.',
    'differs'               => 'שדה {field} חייב להיות שונה משדה {param}.',
    'equals'                => 'שדה {field} חייב להיות בדיוק: {param}.',
    'exact_length'          => 'שדה {field} חייב להיות בדיוק {param} תווים באורך.',
    'greater_than'          => 'שדה {field} חייב להכיל מספר גדול מ-{param}.',
    'greater_than_equal_to' => 'שדה {field} חייב להכיל מספר הגדול או שווה ל-{param}.',
    'hex'                   => 'שדה {field} יכול להכיל רק תווים הקסדצימליים.',
    'in_list'               => 'שדה {field} חייב להיות אחד מ: {param}.',
    'integer'               => 'שדה {field} חייב להכיל מספר שלם.',
    'is_natural'            => 'שדה {field} יכול להכיל רק ספרות.',
    'is_natural_no_zero'    => 'שדה {field} יכול להכיל רק ספרות וחייב להיות גדול מאפס.',
    'is_not_unique'         => 'שדה {field} חייב להכיל ערך קיים מראש במסד הנתונים.',
    'is_unique'             => 'שדה {field} חייב להכיל ערך ייחודי.',
    'less_than'             => 'שדה {field} חייב להכיל מספר קטן מ-{param}.',
    'less_than_equal_to'    => 'שדה {field} חייב להכיל מספר קטן או שווה ל-{param}.',
    'matches'               => 'שדה {field} אינו תואם את שדה {param}.',
    'max_length'            => 'שדה {field} לא יכול לחרוג מ-{param} תווים באורך.',
    'min_length'            => 'שדה {field} חייב להיות לפחות {param} תווים באורך.',
    'not_equals'            => 'שדה {field} לא יכול להיות: {param}.',
    'not_in_list'           => 'שדה {field} לא יכול להיות אחד מ: {param}.',
    'numeric'               => 'שדה {field} חייב להכיל רק מספרים.',
    'regex_match'           => 'שדה {field} אינו בפורמט הנכון.',
    'required'              => 'שדה {field} נדרש.',
    'required_with'         => 'שדה {field} נדרש כאשר {param} נוכח.',
    'required_without'      => 'שדה {field} נדרש כאשר {param} אינו נוכח.',
    'string'                => 'שדה {field} חייב להיות מחרוזת תקפה.',
    'timezone'              => 'שדה {field} חייב להיות אזור זמן תקף.',
    'valid_base64'          => 'שדה {field} חייב להיות מיתר base64 תקף.',
    'valid_email'           => 'שדה {field} חייב להכיל כתובת דוא"ל תקפה.',
    'valid_emails'          => 'שדה {field} חייב להכיל את כל כתובות הדוא"ל התקפות.',
    'valid_ip'              => 'שדה {field} חייב להכיל כתובת IP תקפה.',
    'valid_url'             => 'שדה {field} חייב להכיל כתובת URL תקפה.',
    'valid_url_strict'      => 'שדה {field} חייב להכיל כתובת URL תקפה.',
    'valid_date'            => 'שדה {field} חייב להכיל תאריך תקף.',
    'valid_json'            => 'שדה {field} חייב להכיל JSON תקף.',

    // Credit Cards
    'valid_cc_num' => '{field} לא נראה כמספר כרטיס אשראי תקף.',

    // Files
    'uploaded' => '{field} אינו קובץ שהועלה תקף.',
    'max_size' => '{field} הוא קובץ גדול מדי.',
    'is_image' => '{field} אינו קובץ תמונה שהועלה תקף.',
    'mime_in'  => '{field} אינו בעל סוג MIME תקף.',
    'ext_in'   => '{field} אינו בעל סיומת קובץ תקפה.',
    'max_dims' => '{field} אינו תמונה, או שהוא רחב מדי או גבוה מדי.',
];
