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
    'noRuleSets'      => 'စစ်ဆေးမှုဖွဲ့စည်းမှုတွင် စည်းမျဉ်းများ မရှိပါ။',
    'ruleNotFound'    => '"{0}" သည် သက်ဝင်သော စည်းမျဉ်းမဟုတ်ပါ။',
    'groupNotFound'   => '"{0}" သည် စည်းမျဉ်းများအုပ်စုမဟုတ်ပါ။',
    'groupNotArray'   => '"{0}" စည်းမျဉ်းအုပ်စုသည် အစုအစည်းဖြစ်ရပါမည်။',
    'invalidTemplate' => '"{0}" သည် သက်ဝင်သော Validation template မဟုတ်ပါ။',

    // Rule Messages
    'alpha'                 => '{field} နယ်ပယ်တွင် အက္ခရာများသာ ပါရှိရပါမည်။',
    'alpha_dash'            => '{field} နယ်ပယ်တွင် အက္ခရာ၊ နံပါတ်၊ အောက်ခံနှင့် ပိုက်ကပ်လမ်းကြောင်းများသာ ပါရှိရပါမည်။',
    'alpha_numeric'         => '{field} နယ်ပယ်တွင် အက္ခရာနှင့် နံပါတ်များသာ ပါရှိရပါမည်။',
    'alpha_numeric_punct'   => '{field} နယ်ပယ်တွင် အက္ခရာ၊ နံပါတ်များ၊ နေရာများနှင့် ~ ! # $ % & * - _ + = | : . လက်ကျန်များသာ ပါရှိရပါမည်။',
    'alpha_numeric_space'   => '{field} နယ်ပယ်တွင် အက္ခရာနှင့် နေရာများသာ ပါရှိရပါမည်။',
    'alpha_space'           => '{field} နယ်ပယ်တွင် အက္ခရာများနှင့် နေရာများသာ ပါရှိရပါမည်။',
    'decimal'               => '{field} နယ်ပယ်တွင် ဒစ်စမယ်နံပါတ်သာ ပါရှိရပါမည်။',
    'differs'               => '{field} နယ်ပယ်သည် {param} နယ်ပယ်နှင့် မတူရပါမည်။',
    'equals'                => '{field} နယ်ပယ်သည် အတိအကျ: {param} ဖြစ်ရပါမည်။',
    'exact_length'          => '{field} နယ်ပယ်သည် အတိအကျ {param} အက္ခရာ ရှိရပါမည်။',
    'greater_than'          => '{field} နယ်ပယ်တွင် {param} ထက် ကြီးသော နံပါတ်သာ ပါရှိရပါမည်။',
    'greater_than_equal_to' => '{field} နယ်ပယ်တွင် {param} သို့မဟုတ် {param} ထက် ကြီးသော နံပါတ်သာ ပါရှိရပါမည်။',
    'hex'                   => '{field} နယ်ပယ်တွင် ဟက်စာဂုဏ်ရည်များသာ ပါရှိရပါမည်။',
    'in_list'               => '{field} နယ်ပယ်သည်: {param} ထဲမှ တစ်ခု ဖြစ်ရပါမည်။',
    'integer'               => '{field} နယ်ပယ်တွင် တစ်ခုတည်းသော နံပါတ်သာ ပါရှိရပါမည်။',
    'is_natural'            => '{field} နယ်ပယ်တွင် နံပါတ်များသာ ပါရှိရပါမည်။',
    'is_natural_no_zero'    => '{field} နယ်ပယ်တွင် နံပါတ်များသာ ပါရှိရပြီး သုညထက် ကြီးရပါမည်။',
    'is_not_unique'         => '{field} နယ်ပယ်တွင် ဒေတာဘေဆာ်တွင် ရှိပြီးသား တန်ဖိုးတစ်ခု ပါရှိရပါမည်။',
    'is_unique'             => '{field} နယ်ပယ်တွင် တစ်ခုတည်းသော တန်ဖိုးသာ ပါရှိရပါမည်။',
    'less_than'             => '{field} နယ်ပယ်တွင် {param} ထက် သက်သာသော နံပါတ်သာ ပါရှိရပါမည်။',
    'less_than_equal_to'    => '{field} နယ်ပယ်တွင် {param} သို့မဟုတ် {param} ထက် သက်သာသော နံပါတ်သာ ပါရှိရပါမည်။',
    'matches'               => '{field} နယ်ပယ်သည် {param} နယ်ပယ်နှင့် ကိုက်ညီမည်မဟုတ်ပါ။',
    'max_length'            => '{field} နယ်ပယ်တွင် {param} အက္ခရာထက် မကျော်လွှားရပါ။',
    'min_length'            => '{field} နယ်ပယ်တွင် အနည်းဆုံး {param} အက္ခရာ ရှိရပါမည်။',
    'not_equals'            => '{field} နယ်ပယ်သည်: {param} မဖြစ်ရပါ။',
    'not_in_list'           => '{field} နယ်ပယ်သည်: {param} ထဲမှ တစ်ခုမဖြစ်ရပါ။',
    'numeric'               => '{field} နယ်ပယ်တွင် နံပါတ်များသာ ပါရှိရပါမည်။',
    'regex_match'           => '{field} နယ်ပယ်သည် မှန်ကန်သော ပုံစံမဟုတ်ပါ။',
    'required'              => '{field} နယ်ပယ်သည် လိုအပ်ပါသည်။',
    'required_with'         => '{field} နယ်ပယ်သည် {param} ရှိသောအခါ လိုအပ်ပါသည်။',
    'required_without'      => '{field} နယ်ပယ်သည် {param} မရှိသောအခါ လိုအပ်ပါသည်။',
    'string'                => '{field} နယ်ပယ်သည် သက်ဝင်သော စာသားဖြစ်ရပါမည်။',
    'timezone'              => '{field} နယ်ပယ်သည် သက်ဝင်သော တာဝန်ချုပ်နယ်မြေဖြစ်ရပါမည်။',
    'valid_base64'          => '{field} နယ်ပယ်သည် သက်ဝင်သော base64 string ဖြစ်ရပါမည်။',
    'valid_email'           => '{field} နယ်ပယ်သည် သက်ဝင်သော အီးမေးလ်လိပ်စာကို ပါရှိရပါမည်။',
    'valid_emails'          => '{field} နယ်ပယ်တွင် သက်ဝင်သော အီးမေးလ်လိပ်စာများအားလုံးပါရှိရပါမည်။',
    'valid_ip'              => '{field} နယ်ပယ်သည် သက်ဝင်သော IP လိပ်စာကို ပါရှိရပါမည်။',
    'valid_url'             => '{field} နယ်ပယ်သည် သက်ဝင်သော URL ကို ပါရှိရပါမည်။',
    'valid_url_strict'      => '{field} နယ်ပယ်သည် သက်ဝင်သော URL ကို ပါရှိရပါမည်။',
    'valid_date'            => '{field} နယ်ပယ်သည် သက်ဝင်သော သတ်မှတ်ရက်ကို ပါရှိရပါမည်။',
    'valid_json'            => '{field} နယ်ပယ်သည် သက်ဝင်သော json ကို ပါရှိရပါမည်။',

    // Credit Cards
    'valid_cc_num' => '{field} သည် သက်ဝင်သော အခကြေးငွေရေးပါမည်။',

    // Files
    'uploaded' => '{field} သည် သက်ဝင်သော ဖိုင်မဟုတ်ပါ။',
    'max_size' => '{field} သည် ပို၍ ကြီးသော ဖိုင်ဖြစ်ပါသည်။',
    'is_image' => '{field} သည် သက်ဝင်သော တင်ပို့ထားသော ရုပ်ပုံဖိုင်မဟုတ်ပါ။',
    'mime_in'  => '{field} သည် သက်ဝင်သော mime အမျိုးအစားမရှိပါ။',
    'ext_in'   => '{field} သည် သက်ဝင်သော ဖိုင်အရှည်မရှိပါ။',
    'max_dims' => '{field} သည် ရုပ်ပုံမဟုတ်ပါ၊ သို့မဟုတ် မတော်တဆ ရှုထောင်စီဉာဏ်ဖြစ်ပါ။',
];
