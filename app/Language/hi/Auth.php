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
    'unknownAuthenticator'  => '{0} एक मान्य प्रमाणीकरणकर्ता नहीं है।',
    'unknownUserProvider'   => 'उपयोग करने के लिए उपयोगकर्ता प्रदाता निर्धारित करने में असमर्थ।',
    'invalidUser'           => 'निर्दिष्ट उपयोगकर्ता का पता लगाने में असमर्थ।',
    'bannedUser'            => 'आपको लॉग इन नहीं किया जा सकता क्योंकि आप वर्तमान में प्रतिबंधित हैं।',
    'logOutBannedUser'      => 'आपको लॉग आउट कर दिया गया है क्योंकि आप प्रतिबंधित हो चुके हैं।',
    'badAttempt'            => 'आपको लॉग इन नहीं किया जा सकता। कृपया अपने क्रेडेंशियल्स की जाँच करें।',
    'noPassword'            => 'पासवर्ड के बिना उपयोगकर्ता को मान्य नहीं किया जा सकता।',
    'invalidPassword'       => 'आपको लॉग इन नहीं किया जा सकता। कृपया अपना पासवर्ड जाँचें।',
    'noToken'               => 'हर अनुरोध में {0} हेडर में एक बियरर टोकन होना चाहिए।',
    'badToken'              => 'एक्सेस टोकन अवैध है।',
    'oldToken'              => 'एक्सेस टोकन की समय सीमा समाप्त हो गई है।',
    'noUserEntity'          => 'पासवर्ड मान्यकरण के लिए उपयोगकर्ता इकाई प्रदान करनी चाहिए।',
    'invalidEmail'          => 'ईमेल पता रिकॉर्ड पर मौजूद ईमेल से मेल खाता है, यह सत्यापित करने में असमर्थ।',
    'unableSendEmailToUser' => 'क्षमा करें, ईमेल भेजने में समस्या हुई। हम "{0}" को ईमेल नहीं भेज सके।',
    'throttled'             => 'इस IP पते से बहुत अधिक अनुरोध किए गए हैं। आप {0} सेकंड में पुनः प्रयास कर सकते हैं।',
    'notEnoughPrivilege'    => 'आपके पास वांछित क्रिया को निष्पादित करने के लिए आवश्यक अनुमति नहीं है।',
    // JWT Exceptions
    'invalidJWT'     => 'टोकन अवैध है।',
    'expiredJWT'     => 'टोकन की समय सीमा समाप्त हो गई है।',
    'beforeValidJWT' => 'टोकन अभी तक उपलब्ध नहीं है।',

    'email'           => 'ईमेल पता',
    'username'        => 'उपयोगकर्ता नाम',
    'password'        => 'पासवर्ड',
    'passwordConfirm' => 'पासवर्ड (फिर से)',
    'haveAccount'     => 'क्या आपके पास पहले से खाता है?',
    'token'           => 'टोकन',

    // Buttons
    'confirm' => 'पुष्टि करें',
    'send'    => 'भेजें',

    // Registration
    'register'         => 'रजिस्टर करें',
    'registerDisabled' => 'पंजीकरण वर्तमान में अनुमति नहीं है।',
    'registerSuccess'  => 'स्वागत है!',

    // Login
    'login'              => 'लॉगिन',
    'needAccount'        => 'क्या आपको खाता चाहिए?',
    'rememberMe'         => 'मुझे याद रखें?',
    'forgotPassword'     => 'क्या आप अपना पासवर्ड भूल गए?',
    'useMagicLink'       => 'लॉगिन लिंक का उपयोग करें',
    'magicLinkSubject'   => 'आपका लॉगिन लिंक',
    'magicTokenNotFound' => 'लिंक सत्यापित करने में असमर्थ।',
    'magicLinkExpired'   => 'क्षमा करें, लिंक की समय सीमा समाप्त हो गई है।',
    'checkYourEmail'     => 'अपना ईमेल देखें!',
    'magicLinkDetails'   => 'हमने आपको एक ईमेल भेजा है जिसमें लॉगिन लिंक है। यह केवल {0} मिनट के लिए मान्य है।',
    'magicLinkDisabled'  => 'MagicLink का उपयोग वर्तमान में अनुमति नहीं है।',
    'successLogout'      => 'आप सफलतापूर्वक लॉग आउट हो चुके हैं।',
    'backToLogin'        => 'लॉगिन पर वापस जाएं',

    // Change password
    'changePassword'            => 'पासवर्ड बदलें',
    'newPassword'               => 'नया पासवर्ड',
    'newPasswordConfirm'        => 'नया पासवर्ड (फिर से)',
    'changePasswordBtn'         => 'अपडेट करें',
    'changePasswordTime'        => 'यदि आप चाहें तो आप नए पासवर्ड में बदल सकते हैं।',
    'changePasswordSuccess'     => 'नया पासवर्ड सफलतापूर्वक बदल दिया गया है।',

    // Passwords
    'errorPasswordLength'       => 'पासवर्ड कम से कम {0, number} वर्णों का होना चाहिए।',
    'suggestPasswordLength'     => 'पास वाक्यांश - 255 वर्णों तक - अधिक सुरक्षित पासवर्ड बनाते हैं जो याद रखना आसान होते हैं।',
    'errorPasswordCommon'       => 'पासवर्ड सामान्य पासवर्ड नहीं होना चाहिए।',
    'suggestPasswordCommon'     => 'पासवर्ड को 65k से अधिक सामान्यतः उपयोग किए जाने वाले पासवर्ड या हैक्स के माध्यम से लीक हुए पासवर्डों के खिलाफ जाँचा गया।',
    'errorPasswordPersonal'     => 'पासवर्ड पुनः-हैश की गई व्यक्तिगत जानकारी को शामिल नहीं कर सकते।',
    'suggestPasswordPersonal'   => 'आपके ईमेल पते या उपयोगकर्ता नाम के विविधताओं का उपयोग पासवर्ड के लिए नहीं किया जाना चाहिए।',
    'errorPasswordTooSimilar'   => 'पासवर्ड उपयोगकर्ता नाम के समान है।',
    'suggestPasswordTooSimilar' => 'अपने उपयोगकर्ता नाम के हिस्सों का उपयोग पासवर्ड में न करें।',
    'errorPasswordPwned'        => 'पासवर्ड {0} एक डेटा उल्लंघन के कारण उजागर हुआ है और इसे {1, number} बार {2} से समझौता किए गए पासवर्डों में देखा गया है।',
    'suggestPasswordPwned'      => '{0} को कभी भी पासवर्ड के रूप में उपयोग नहीं किया जाना चाहिए। यदि आप इसे कहीं भी उपयोग कर रहे हैं तो इसे तुरंत बदलें।',
    'errorPasswordEmpty'        => 'पासवर्ड आवश्यक है।',
    'errorPasswordTooLongBytes' => 'पासवर्ड {param} बाइट्स की लंबाई से अधिक नहीं हो सकता।',
    'passwordChangeSuccess'     => 'पासवर्ड सफलतापूर्वक बदला गया',
    'userDoesNotExist'          => 'पासवर्ड नहीं बदला गया। उपयोगकर्ता मौजूद नहीं है',
    'resetTokenExpired'         => 'क्षमा करें। आपका रीसेट टोकन समाप्त हो गया है।',

    // Email Globals
    'emailInfo'      => 'व्यक्ति के बारे में कुछ जानकारी:',
    'emailIpAddress' => 'IP पता:',
    'emailDevice'    => 'डिवाइस:',
    'emailDate'      => 'तिथि:',

    // 2FA
    'email2FATitle'       => 'दो कारक प्रमाणीकरण',
    'confirmEmailAddress' => 'अपने ईमेल पते की पुष्टि करें।',
    'emailEnterCode'      => 'अपना ईमेल सत्यापित करें',
    'emailConfirmCode'    => 'वह 6-अंकीय कोड दर्ज करें जो हमने आपके ईमेल पते पर अभी भेजा है।',
    'email2FASubject'     => 'आपका प्रमाणीकरण कोड',
    'email2FAMailBody'    => 'आपका प्रमाणीकरण कोड है:',
    'invalid2FAToken'     => 'कोड गलत था।',
    'need2FA'             => 'आपको दो-कारक सत्यापन पूरा करना होगा।',
    'needVerification'    => 'खाता सक्रियण को पूरा करने के लिए अपना ईमेल देखें।',

    // Activate
    'emailActivateTitle'    => 'ईमेल सक्रियण',
    'emailActivateBody'     => 'हमने अभी आपको एक कोड के साथ एक ईमेल भेजा है जिससे आपके ईमेल पते की पुष्टि की जा सके। वह कोड कॉपी करें और नीचे पेस्ट करें।',
    'emailActivateSubject'  => 'आपका सक्रियण कोड',
    'emailActivateMailBody' => 'कृपया अपनी खाता सक्रिय करने और साइट का उपयोग शुरू करने के लिए नीचे दिए गए कोड का उपयोग करें।',
    'invalidActivateToken'  => 'कोड गलत था।',
    'needActivate'          => 'आपको अपने ईमेल पते पर भेजे गए कोड की पुष्टि करके अपनी पंजीकरण प्रक्रिया पूरी करनी होगी।',
    'activationBlocked'     => 'लॉगिन करने से पहले आपको अपने खाते को सक्रिय करना होगा।',

    // Groups
    'unknownGroup' => '{0} एक मान्य समूह नहीं है।',
    'missingTitle' => 'समूहों को एक शीर्षक होना चाहिए।',

    // Permissions
    'unknownPermission' => '{0} एक मान्य अनुमति नहीं है।',
];
