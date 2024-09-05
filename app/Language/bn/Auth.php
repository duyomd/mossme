<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter Shield.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

return [
    // Exceptions
    'unknownAuthenticator'  => '{0} একটি বৈধ প্রমাণীকরণকারী নয়।',
    'unknownUserProvider'   => 'ব্যবহারকারী প্রদানকারী নির্ধারণ করা যায়নি।',
    'invalidUser'           => 'নির্দিষ্ট ব্যবহারকারী খুঁজে পাওয়া যাচ্ছে না।',
    'bannedUser'            => 'আপনার লগ ইন করা যাবে না কারণ আপনি বর্তমানে নিষিদ্ধ।',
    'logOutBannedUser'      => 'আপনাকে লগ আউট করা হয়েছে কারণ আপনি নিষিদ্ধ হয়েছেন।',
    'badAttempt'            => 'আপনার লগ ইন করা যাচ্ছে না। দয়া করে আপনার প্রমাণপত্র যাচাই করুন।',
    'noPassword'            => 'পাসওয়ার্ড ছাড়া একটি ব্যবহারকারী যাচাই করা যায় না।',
    'invalidPassword'       => 'আপনার লগ ইন করা যাচ্ছে না। দয়া করে আপনার পাসওয়ার্ড যাচাই করুন।',
    'noToken'               => 'প্রত্যেক অনুরোধে {0} হেডারে একটি বেয়ারার টোকেন থাকতে হবে।',
    'badToken'              => 'অ্যাক্সেস টোকেন অবৈধ।',
    'oldToken'              => 'অ্যাক্সেস টোকেনের সময়সীমা শেষ হয়েছে।',
    'noUserEntity'          => 'পাসওয়ার্ড যাচাইয়ের জন্য ব্যবহারকারী সত্তা প্রদান করতে হবে।',
    'invalidEmail'          => 'ইমেইল ঠিকানাটি রেকর্ডে থাকা ইমেইল এর সাথে মেলে না।',
    'unableSendEmailToUser' => 'দুঃখিত, ইমেইল পাঠানোর সমস্যা হয়েছে। "{0}" এ ইমেইল পাঠানো যায়নি।',
    'throttled'             => 'এই আইপি ঠিকানা থেকে খুব বেশি অনুরোধ করা হয়েছে। আপনি {0} সেকেন্ড পরে আবার চেষ্টা করতে পারেন।',
    'notEnoughPrivilege'    => 'আপনার প্রয়োজনীয় অনুমতি নেই প্রয়োজনীয় অপারেশনটি সম্পাদনের জন্য।',
    // JWT Exceptions
    'invalidJWT'     => 'টোকেনটি অবৈধ।',
    'expiredJWT'     => 'টোকেনটির সময়সীমা শেষ হয়েছে।',
    'beforeValidJWT' => 'টোকেনটি এখনও উপলব্ধ নয়।',

    'email'           => 'ইমেইল ঠিকানা',
    'username'        => 'ব্যবহারকারীর নাম',
    'password'        => 'পাসওয়ার্ড',
    'passwordConfirm' => 'পাসওয়ার্ড (পুনরায়)',
    'haveAccount'     => 'আপনার কি ইতিমধ্যেই একটি অ্যাকাউন্ট আছে?',
    'token'           => 'টোকেন',

    // Buttons
    'confirm' => 'নিশ্চিত করুন',
    'send'    => 'পাঠান',

    // Registration
    'register'         => 'নিবন্ধন করুন',
    'registerDisabled' => 'নিবন্ধন বর্তমানে অনুমোদিত নয়।',
    'registerSuccess'  => 'স্বাগতম!',

    // Login
    'login'              => 'লগ ইন',
    'needAccount'        => 'একটি অ্যাকাউন্ট প্রয়োজন?',
    'rememberMe'         => 'আমাকে মনে রাখুন?',
    'forgotPassword'     => 'আপনার পাসওয়ার্ড ভুলে গেছেন?',
    'useMagicLink'       => 'একটি লগইন লিঙ্ক ব্যবহার করুন',
    'magicLinkSubject'   => 'আপনার লগইন লিঙ্ক',
    'magicTokenNotFound' => 'লিঙ্ক যাচাই করা যাচ্ছে না।',
    'magicLinkExpired'   => 'দুঃখিত, লিঙ্কের সময়সীমা শেষ হয়েছে।',
    'checkYourEmail'     => 'আপনার ইমেইল চেক করুন!',
    'magicLinkDetails'   => 'আমরা আপনাকে একটি লগইন লিঙ্ক সহ একটি ইমেইল পাঠিয়েছি। এটি শুধুমাত্র {0} মিনিটের জন্য বৈধ।',
    'magicLinkDisabled'  => 'ম্যাজিক লিঙ্ক ব্যবহার বর্তমানে অনুমোদিত নয়।',
    'successLogout'      => 'আপনি সফলভাবে লগ আউট করেছেন।',
    'backToLogin'        => 'লগইনে ফিরে যান',

    // Change password
    'changePassword'            => 'পাসওয়ার্ড পরিবর্তন করুন',
    'newPassword'               => 'নতুন পাসওয়ার্ড',
    'newPasswordConfirm'        => 'নতুন পাসওয়ার্ড (আবার)',
    'changePasswordBtn'         => 'আপডেট করুন',
    'changePasswordTime'        => 'আপনি চাইলে নতুন পাসওয়ার্ডে পরিবর্তন করতে পারেন।',
    'changePasswordSuccess'     => 'নতুন পাসওয়ার্ড সফলভাবে পরিবর্তিত হয়েছে।',

    // Passwords
    'errorPasswordLength'       => 'পাসওয়ার্ডের দৈর্ঘ্য কমপক্ষে {0, number} অক্ষর হতে হবে।',
    'suggestPasswordLength'     => 'পাস ফ্রেজ - 255 অক্ষরের মধ্যে - বেশি নিরাপদ পাসওয়ার্ড তৈরি করে যা মনে রাখা সহজ।',
    'errorPasswordCommon'       => 'পাসওয়ার্ড সাধারণ পাসওয়ার্ড হতে পারে না।',
    'suggestPasswordCommon'     => 'পাসওয়ার্ডটি 65 হাজারেরও বেশি সাধারণভাবে ব্যবহৃত পাসওয়ার্ড বা হ্যাকের মাধ্যমে ফাঁস হওয়া পাসওয়ার্ডগুলির সাথে পরীক্ষা করা হয়েছে।',
    'errorPasswordPersonal'     => 'পাসওয়ার্ডে পুনরায় হ্যাশ করা ব্যক্তিগত তথ্য থাকতে পারে না।',
    'suggestPasswordPersonal'   => 'আপনার ইমেইল ঠিকানা বা ব্যবহারকারীর নামের পরিবর্তনগুলি পাসওয়ার্ডে ব্যবহার করা উচিত নয়।',
    'errorPasswordTooSimilar'   => 'পাসওয়ার্ড ব্যবহারকারীর নামের খুব কাছাকাছি।',
    'suggestPasswordTooSimilar' => 'আপনার পাসওয়ার্ডে আপনার ব্যবহারকারীর নামের অংশগুলি ব্যবহার করবেন না।',
    'errorPasswordPwned'        => '{0} পাসওয়ার্ডটি একটি ডেটা ব্রিচের কারণে প্রকাশিত হয়েছে এবং {1, number} বার {2} এর মধ্যে দেখা গেছে।',
    'suggestPasswordPwned'      => '{0} কখনই পাসওয়ার্ড হিসাবে ব্যবহার করা উচিত নয়। যদি আপনি এটি কোথাও ব্যবহার করেন তবে তা তাত্ক্ষণিকভাবে পরিবর্তন করুন।',
    'errorPasswordEmpty'        => 'একটি পাসওয়ার্ড প্রয়োজন।',
    'errorPasswordTooLongBytes' => 'পাসওয়ার্ডের দৈর্ঘ্য {param} বাইট অতিক্রম করতে পারে না।',
    'passwordChangeSuccess'     => 'পাসওয়ার্ড সফলভাবে পরিবর্তন করা হয়েছে',
    'userDoesNotExist'          => 'পাসওয়ার্ড পরিবর্তন করা হয়নি। ব্যবহারকারী বিদ্যমান নেই',
    'resetTokenExpired'         => 'দুঃখিত। আপনার রিসেট টোকেনের সময়সীমা শেষ হয়েছে।',

    // Email Globals
    'emailInfo'      => 'ব্যক্তির সম্পর্কে কিছু তথ্য:',
    'emailIpAddress' => 'আইপি ঠিকানা:',
    'emailDevice'    => 'ডিভাইস:',
    'emailDate'      => 'তারিখ:',

    // 2FA
    'email2FATitle'       => 'দুই-ফ্যাক্টর প্রমাণীকরণ',
    'confirmEmailAddress' => 'আপনার ইমেইল ঠিকানা নিশ্চিত করুন।',
    'emailEnterCode'      => 'আপনার ইমেইল নিশ্চিত করুন',
    'emailConfirmCode'    => 'আমরা আপনার ইমেইল ঠিকানায় পাঠানো 6-অঙ্কের কোড প্রবেশ করুন।',
    'email2FASubject'     => 'আপনার প্রমাণীকরণ কোড',
    'email2FAMailBody'    => 'আপনার প্রমাণীকরণ কোড হল:',
    'invalid2FAToken'     => 'কোডটি ভুল ছিল।',
    'need2FA'             => 'আপনাকে একটি দুই-ফ্যাক্টর যাচাইকরণ সম্পন্ন করতে হবে।',
    'needVerification'    => 'অ্যাকাউন্ট সক্রিয়করণের জন্য আপনার ইমেইল চেক করুন।',

    // Activate
    'emailActivateTitle'    => 'ইমেইল সক্রিয়করণ',
    'emailActivateBody'     => 'আমরা একটি কোড সহ একটি ইমেইল আপনাকে পাঠিয়েছি যাতে আপনার ইমেইল ঠিকানা নিশ্চিত করা যায়। কোডটি কপি করুন এবং নিচে পেস্ট করুন।',
    'emailActivateSubject'  => 'আপনার সক্রিয়করণ কোড',
    'emailActivateMailBody' => 'আপনার অ্যাকাউন্ট সক্রিয় করতে এবং সাইটটি ব্যবহার শুরু করতে কোডটি ব্যবহার করুন।',
    'invalidActivateToken'  => 'কোডটি ভুল ছিল।',
    'needActivate'          => 'আপনাকে আপনার ইমেইল ঠিকানায় পাঠানো কোড নিশ্চিত করে আপনার নিবন্ধন সম্পন্ন করতে হবে।',
    'activationBlocked'     => 'লগ ইন করার আগে আপনার অ্যাকাউন্ট সক্রিয় করতে হবে।',

    // Groups
    'unknownGroup' => '{0} একটি বৈধ গোষ্ঠী নয়।',
    'missingTitle' => 'গোষ্ঠীগুলির একটি শিরোনাম থাকতে হবে।',

    // Permissions
    'unknownPermission' => '{0} একটি বৈধ অনুমতি নয়।',
];
