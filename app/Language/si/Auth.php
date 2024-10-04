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
    'unknownAuthenticator'  => '{0} වලංගු සත්‍යාපකයක් නොවේ.',
    'unknownUserProvider'   => 'භාවිතා කිරීමට යුක්ත පරිශීලක සපයන්නා සොයා ගැනීමට නොහැක.',
    'invalidUser'           => 'නියමිත පරිශීලකයා සොයාගත නොහැක.',
    'bannedUser'            => 'ඔබට නවතා දැමීම සඳහා සටහන් කළ බැවින් ඔබට පිවිසිය නොහැක.',
    'logOutBannedUser'      => 'ඔබ පවතින තහනම් නිසා ඔබ පිටව ගොස් ඇත.',
    'badAttempt'            => 'ඔබට පිවිසෙන්න නොහැක. කරුණාකර ඔබේ සහතික තොරතුරු සලස්වන්න.',
    'noPassword'            => 'පස්සෙ පැහැදිලි කිරීම සඳහා මුරපදයක් නොමැත.',
    'invalidPassword'       => 'ඔබට පිවිසෙන්න නොහැක. කරුණාකර ඔබේ මුරපදය පරීක්ෂා කරන්න.',
    'noToken'               => 'සෑම ඉල්ලීමකම {0} ශීර්ෂකයේ bearer token එකක් තිබිය යුතුය.',
    'badToken'              => 'පිවිසුම් token එක වලංගු නොවේ.',
    'olToken'               => 'පිවිසුම් token එක අවසන් වී ඇත.',
    'noUserEntity'          => 'මුරපද සත්‍යාපන සඳහා පරිශීලක ඒකකය ලබා දිය යුතුය.',
    'invalidEmail'          => 'ඊමේල් ලිපිනය සත්‍යාපනය කළ නොහැක.',
    'unableSendEmailToUser' => 'කණගාටුයි, ඊමේල් එවීමේදී ගැටළුවක් ඇතිවිය. "{0}" වෙත ඊමේල් එවිය නොහැක.',
    'throttled'             => 'මෙම IP ලිපිනයෙන් බොහෝ ඉල්ලීම් කරන ලදී. ඔබට {0} තත්පර වලින් නැවත උත්සාහ කරන්න පුළුවන්.',
    'notEnoughPrivilege'    => 'අවශ්‍ය අනුමැතිය නොමැති නිසා ඔබගේ කැමැත්ත ලබා ගත නොහැක.',
    // JWT Exceptions
    'invalidJWT'     => 'Token එක වලංගු නොවේ.',
    'expiredJWT'     => 'Token එක අවසන් වී ඇත.',
    'beforeValidJWT' => 'Token එක තවම ලබා ගත නොහැක.',

    'email'           => 'ඊමේල් ලිපිනය',
    'username'        => 'පරිශීලක නාමය',
    'password'        => 'මුරපදය',
    'passwordConfirm' => 'මුරපදය (යනුවෙන්)',
    'haveAccount'     => 'ලියාපදිංචි කළ ගිණුමක් තිබේද?',
    'token'           => 'Token',

    // Buttons
    'confirm' => 'ඉස්සරහට',
    'send'    => 'පණිවිඩය යවන්න',

    // Registration
    'register'         => 'ලියාපදිංචි වන්න',
    'registerDisabled' => 'ලියාපදිංචි වීම දැන් අවසරය නැත.',
    'registerSuccess'  => 'ආයුබෝවන්!',

    // Login
    'login'              => 'ප්‍රවිශින්න',
    'needAccount'        => 'ගිණුමක් අවශ්‍යද?',
    'rememberMe'         => 'මම ඔබව මතක් කරගනුද?',
    'forgotPassword'     => 'ඔබේ මුරපදය අමතක වීද?',
    'useMagicLink'       => 'ප්‍රවේශ සම්බන්ධතා සම්බන්ධ කේතයක් භාවිතා කරන්න',
    'magicLinkSubject'   => 'ඔබේ ප්‍රවේශ සම්බන්ධතා සම්බන්ධ කේතය',
    'magicTokenNotFound' => 'සම්බන්ධතා සම්බන්ධ කේතය සත්‍යාපනය කළ නොහැක.',
    'magicLinkExpired'   => 'කණගාටුයි, සම්බන්ධතා සම්බන්ධ කේතය අවසන් වී ඇත.',
    'checkYourEmail'     => 'ඔබගේ ඊමේල් පරීක්ෂා කරන්න!',
    'magicLinkDetails'   => 'අපි ඔබට පණිවිඩයක් යවමින් සිටිමු. ඔබට එය සොයාගත නොහැකි නම්, කරුණාකර ඔබේ අකැමති/ඉවත් කළ විද්‍යුත් තැපැල් බහාලුම පරීක්ෂා කරන්න. එය {0} මිනිත්තු කාලයක් සඳහා පමණක් වලංගු වේ.',
    'magicLinkDisabled'  => 'MagicLink භාවිතය දැන් අවසරය නැත.',
    'successLogout'      => 'ඔබ සාර්ථකව පිටව ගොස් ඇත.',
    'backToLogin'        => 'ප්‍රවේශයට ආපසු',

    // Change password
    'changePassword'            => 'පසුබැසීමේ සංකේතය වෙනස් කරන්න',
    'newPassword'               => 'නව පසුබැසීමේ සංකේතය',
    'newPasswordConfirm'        => 'නව පසුබැසීමේ සංකේතය (අවසානයට)',
    'changePasswordBtn'         => 'යාවත්කාලීන කරන්න',
    'changePasswordTime'        => 'ඔබට අවශ්‍යනම්, නව පසුබැසීමේ සංකේතය සඳහා වෙනස් කළ හැක.',
    'changePasswordSuccess'     => 'නව පසුබැසීමේ සංකේතය සාර්ථකව වෙනස් කරන ලදි.',

    // Passwords
    'errorPasswordLength'       => 'මුරපද {0, number} අකුරු දිගින් අඩු විය යුතුය.',
    'suggestPasswordLength'     => 'මුරපද කීප 255 අකුරු දිගක් වන පද ප්‍රකාශන සොයා ගත හැකි මුරපද සුරක්ෂිත වේ.',
    'errorPasswordCommon'       => 'මුරපද සාමාන්‍ය මුරපදයක් නොවේ.',
    'suggestPasswordCommon'     => 'මුරපදය 65,000 වඩා වඩා පොදු මුරපදවලින් හෝ තහනම් වු මුරපදවලින් පරීක්ෂා කරන ලදී.',
    'errorPasswordPersonal'     => 'මුරපද තුළ පුද්ගලික තොරතුරු නැත.',
    'suggestPasswordPersonal'   => 'ඔබේ ඊමේල් ලිපිනය හෝ පරිශීලක නාමය මුරපද ලෙස භාවිතා කරන්නැයි යෝජනාවක් නැත.',
    'errorPasswordTooSimilar'   => 'මුරපදය පරිශීලක නාමයට සමාන වේ.',
    'suggestPasswordTooSimilar' => 'ඔබේ පරිශීලක නාමයේ කොටස් මුරපදයට භාවිතා කරන්න එපා.',
    'errorPasswordPwned'        => '{0} මුරපදය දත්ත හිඟයක් නිසා හඳුනාගත් අතර {1, number} වතාවක් {2} සොයා ගනු ලැබී ඇත.',
    'suggestPasswordPwned'      => '{0} මුරපදයක් ලෙස භාවිතා කිරීමක් නැත. ඔබ එය ඕනෑම ස්ථානයක භාවිතා කරනවා නම් එය කඩිනමින් වෙනස් කරන්න.',
    'errorPasswordEmpty'        => 'මුරපදයක් අවශ්‍යයි.',
    'errorPasswordTooLongBytes' => 'මුරපදය {param} බයිට් ඉක්මවා නොයුතුයි.',
    'passwordChangeSuccess'     => 'මුරපදය සාර්ථකව වෙනස් කරන ලදී',
    'userDoesNotExist'          => 'මුරපදය වෙනස් කරන්නේ නැත. පරිශීලකයා නොමැත',
    'resetTokenExpired'         => 'කණගාටුයි. ඔබේ සොයාගැනීමේ කේතය අවසන් වී ඇත.',

    // Email Globals
    'emailInfo'      => 'පිරිස පිළිබඳ කිසියම් තොරතුරු:',
    'emailIpAddress' => 'IP ලිපිනය:',
    'emailDevice'    => 'උපාංගය:',
    'emailDate'      => 'දිනය:',

    // 2FA
    'email2FATitle'       => 'දෙවන මට්ටමේ සත්‍යාපන',
    'confirmEmailAddress' => 'ඔබේ ඊමේල් ලිපිනය සත්‍යාපනය කරන්න.',
    'emailEnterCode'      => 'ඔබගේ ඊමේල් සත්‍යාපනය කරන්න',
    'emailConfirmCode'    => 'ඔබේ ඊමේල් ලිපිනයට යවූ 6-අංක කේතය ඇතුලත් කරන්න.',
    'email2FASubject'     => 'ඔබේ සත්‍යාපන කේතය',
    'email2FAMailBody'    => 'ඔබේ සත්‍යාපන කේතය වන්නේ:',
    'invalid2FAToken'     => 'කේතය වැරදියි.',
    'need2FA'             => 'ඔබට දෙවන මට්ටමේ සත්‍යාපන සම්පූර්ණ කිරීම අවශ්‍යයි.',
    'needVerification'    => 'ගිණුම් සක්‍රීය කිරීම සම්පූර්ණ කිරීමට ඔබගේ ඊමේල් පරීක්ෂා කරන්න.',

    // Activate
    'emailActivateTitle'    => 'ඊමේල් සක්‍රීය කිරීම',
    'emailActivateBody'     => 'ඔබේ ඊමේල් ලිපිනය සත්‍යාපනය කිරීමට කේතයක් සමඟ ඊමේල් එවමින් සිටිමු. ඔබට එය සොයාගත නොහැකි නම්, කරුණාකර ඔබේ අකැමති/ඉවත් කළ විද්‍යුත් තැපැල් බහාලුම පරීක්ෂා කරන්න. එම කේතය පිටපත් කර පහත අඩංගු කරන්න.',
    'emailActivateSubject'  => 'ඔබේ සක්‍රීයාකරණ කේතය',
    'emailActivateMailBody' => 'ඔබේ ගිණුම සක්‍රීය කිරීම සහ වෙබ් අඩවිය භාවිතා කිරීම ආරම්භ කිරීමට පහත කේතය භාවිතා කරන්න.',
    'invalidActivateToken'  => 'කේතය වැරදියි.',
    'needActivate'          => 'ඔබේ ඊමේල් ලිපිනයට යවන ලද කේතය සත්‍යාපනය කර ඔබගේ ලියාපදිංචිය සම්පූර්ණ කළ යුතුය.',
    'activationBlocked'     => 'ඔබේ ගිණුම සක්‍රීය කිරීමට පෙර ඔබට පිවිසෙන්න නොහැක.',

    // Groups
    'unknownGroup' => '{0} වලංගු සමූහයක් නොවේ.',
    'missingTitle' => 'සමූහවලට නාමයක් අවශ්‍යයි.',

    // Permissions
    'unknownPermission' => '{0} වලංගු අනුමැතියක් නොවේ.',
];
