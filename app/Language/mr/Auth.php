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
    'unknownAuthenticator'  => '{0} एक वैध प्रमाणीकरणकर्ता नाही.',
    'unknownUserProvider'   => 'वापरकर्ता प्रदाता ओळखता येत नाही.',
    'invalidUser'           => 'निर्दिष्ट वापरकर्ता सापडला नाही.',
    'bannedUser'            => 'तुम्हाला लॉग इन करता येत नाही कारण तुम्ही सध्या बंदी ठोठवलेले आहात.',
    'logOutBannedUser'      => 'तुम्ही बंदी ठोठवलेले असल्यामुळे तुम्हाला लॉग आउट करण्यात आले आहे.',
    'badAttempt'            => 'तुम्हाला लॉग इन करता येत नाही. कृपया तुमची ओळखपत्रे तपासा.',
    'noPassword'            => 'पासवर्ड नसलेल्या वापरकर्त्याचे प्रमाणन केले जाऊ शकत नाही.',
    'invalidPassword'       => 'तुम्हाला लॉग इन करता येत नाही. कृपया तुमचा पासवर्ड तपासा.',
    'noToken'               => 'प्रत्येक विनंतीमध्ये {0} हेडरमध्ये एक बियरर टोकन असावे लागते.',
    'badToken'              => 'अॅक्सेस टोकन अमान्य आहे.',
    'olToken'               => 'अॅक्सेस टोकन कालबाह्य झाले आहे.',
    'noUserEntity'          => 'पासवर्ड प्रमाणनासाठी वापरकर्ता एंटिटी प्रदान केली पाहिजे.',
    'invalidEmail'          => 'ईमेल पत्ता रेकॉर्डवरील ईमेलशी जुळत नाही.',
    'unableSendEmailToUser' => 'खेद आहे, ईमेल पाठवण्यास अडचण आली. आम्ही "{0}" यासाठी ईमेल पाठवू शकलो नाही.',
    'throttled'             => 'या IP पत्त्यावरून खूप जास्त विनंत्या आल्या आहेत. तुम्ही {0} सेकंदांत पुन्हा प्रयत्न करू शकता.',
    'notEnoughPrivilege'    => 'तुम्हाला हवे असलेल्या क्रियेसाठी आवश्यक परवानगी नाही.',
    
    // JWT Exceptions
    'invalidJWT'     => 'टोकन अमान्य आहे.',
    'expiredJWT'     => 'टोकन कालबाह्य झाले आहे.',
    'beforeValidJWT' => 'टोकन अद्याप उपलब्ध नाही.',
    
    // Account Management
    'email'           => 'ईमेल पत्ता',
    'username'        => 'वापरकर्तानाव',
    'password'        => 'पासवर्ड',
    'passwordConfirm' => 'पासवर्ड (पुन्हा)',
    'haveAccount'     => 'आधीच खाते आहे का?',
    'token'           => 'टोकन',
    
    // Buttons
    'confirm' => 'पुष्टी करा',
    'send'    => 'पाठवा',
    
    // Registration
    'register'         => 'नोंदणी करा',
    'registerDisabled' => 'नोंदणी सध्या परवानगी देण्यात आलेली नाही.',
    'registerSuccess'  => 'स्वागत आहे!',
    
    // Login
    'login'              => 'लॉगिन',
    'needAccount'        => 'खाते आवश्यक आहे का?',
    'rememberMe'         => 'माझ्या सत्राची आठवण ठेवा?',
    'forgotPassword'     => 'तुमचा पासवर्ड विसरला?',
    'useMagicLink'       => 'लॉगिन लिंक वापरा',
    'magicLinkSubject'   => 'तुमचा लॉगिन लिंक',
    'magicTokenNotFound' => 'लिंक सत्यापित करता आले नाही.',
    'magicLinkExpired'   => 'खेद आहे, लिंक कालबाह्य झाली आहे.',
    'checkYourEmail'     => 'तुमचा ईमेल तपासा!',
    'magicLinkDetails'   => 'आम्ही तुम्हाला एक ईमेल पाठवले आहे ज्यात लॉगिन लिंक आहे. तुम्हाला ते सापडत नसेल, तर कृपया तुमचा स्पॅम/जंक फोल्डर तपासा. ही लिंक फक्त {0} मिनिटांसाठी वैध आहे.',
    'magicLinkDisabled'  => 'MagicLink वापर सध्या परवानगी देण्यात आलेली नाही.',
    'successLogout'      => 'तुम्ही यशस्वीपणे लॉग आउट झाले आहात.',
    'backToLogin'        => 'लॉगिनकडे परत जा',

    // Change password
    'changePassword'            => 'पासवर्ड बदलावे',
    'newPassword'               => 'नवा पासवर्ड',
    'newPasswordConfirm'        => 'नवा पासवर्ड (पुन्हा)',
    'changePasswordBtn'         => 'अद्यतन करा',
    'changePasswordTime'        => 'आपल्याला हवे असल्यास नवीन पासवर्डमध्ये बदलू शकता.',
    'changePasswordSuccess'     => 'नवा पासवर्ड यशस्वीपणे बदलला गेला आहे.',
    
    // Passwords
    'errorPasswordLength'       => 'पासवर्ड किमान {0, number} वर्णांचा असावा लागतो.',
    'suggestPasswordLength'     => 'पासवर्डसाठी 255 वर्णांपर्यंतची पासफ्रेज अधिक सुरक्षित असते आणि लक्षात ठेवायला सोपी असते.',
    'errorPasswordCommon'       => 'पासवर्ड सामान्य पासवर्ड असू नये.',
    'suggestPasswordCommon'     => 'पासवर्ड 65 हजारांपेक्षा अधिक सामान्य पासवर्ड किंवा हॅक झालेल्या पासवर्डशी तपासला गेला.',
    'errorPasswordPersonal'     => 'पासवर्डमध्ये व्यक्तिगत माहितीचा पुन्हा वापर केला जाऊ नये.',
    'suggestPasswordPersonal'   => 'तुमच्या ईमेल पत्त्याचे किंवा वापरकर्तानावाचे विविध स्वरूप पासवर्ड म्हणून वापरू नका.',
    'errorPasswordTooSimilar'   => 'पासवर्ड वापरकर्तानावाशी खूप समान आहे.',
    'suggestPasswordTooSimilar' => 'तुमच्या पासवर्डमध्ये वापरकर्तानावाचे भाग वापरू नका.',
    'errorPasswordPwned'        => '{0} पासवर्ड डेटा उल्लंघनामुळे उघड झाला आहे आणि {1, number} वेळा {2} उल्लंघन केलेल्या पासवर्डमध्ये दिसला आहे.',
    'suggestPasswordPwned'      => '{0} कधीही पासवर्ड म्हणून वापरू नका. तुम्ही ते कुठेही वापरत असाल तर त्वरित बदल करा.',
    'errorPasswordEmpty'        => 'पासवर्ड आवश्यक आहे.',
    'errorPasswordTooLongBytes' => 'पासवर्ड {param} बाइट्सपेक्षा जास्त असू शकत नाही.',
    'passwordChangeSuccess'     => 'पासवर्ड यशस्वीपणे बदलला',
    'userDoesNotExist'          => 'पासवर्ड बदलला गेला नाही. वापरकर्ता अस्तित्वात नाही',
    'resetTokenExpired'         => 'खेद आहे. तुमचा रीसेट टोकन कालबाह्य झाला आहे.',
    
    // Email Globals
    'emailInfo'      => 'व्यक्तीविषयी काही माहिती:',
    'emailIpAddress' => 'IP पत्ता:',
    'emailDevice'    => 'डिव्हाइस:',
    'emailDate'      => 'तारीख:',
    
    // 2FA
    'email2FATitle'       => 'दोन-घटक प्रमाणीकरण',
    'confirmEmailAddress' => 'तुमचा ईमेल पत्ता पुष्टी करा.',
    'emailEnterCode'      => 'तुम्ही ईमेलवरून 6-अंकी कोड प्रविष्ट करा.',
    'emailConfirmCode'    => 'तुम्ही ईमेलवरून प्राप्त केलेला 6-अंकी कोड प्रविष्ट करा.',
    'email2FASubject'     => 'तुमचा प्रमाणीकरण कोड',
    'email2FAMailBody'    => 'तुमचा प्रमाणीकरण कोड आहे:',
    'invalid2FAToken'     => 'कोड चुकीचा आहे.',
    'need2FA'             => 'तुम्हाला दोन-घटक प्रमाणीकरण पूर्ण करणे आवश्यक आहे.',
    'needVerification'    => 'खाते सक्रिय करण्यासाठी तुमच्या ईमेलला तपासा.',
    
    // Activate
    'emailActivateTitle'    => 'ईमेल सक्रियता',
    'emailActivateBody'     => 'तुम्हाला ईमेलद्वारे एक कोड पाठवला आहे ज्याद्वारे तुमचा ईमेल पत्ता पुष्टी करा. तुम्हाला ते सापडत नसेल, तर कृपया तुमचा स्पॅम/जंक फोल्डर तपासा. कोड कॉपी करा आणि खाली पेस्ट करा.',
    'emailActivateSubject'  => 'तुमचा सक्रियता कोड',
    'emailActivateMailBody' => 'तुमच्या खात्याचे सक्रियकरण आणि साइट वापर सुरू करण्यासाठी खालील कोड वापरा.',
    'invalidActivateToken'  => 'कोड चुकीचा आहे.',
    'needActivate'          => 'ईमेल पत्त्यावर पाठवलेल्या कोडद्वारे तुमची नोंदणी पूर्ण करणे आवश्यक आहे.',
    'activationBlocked'     => 'लॉगिन करण्यापूर्वी तुम्हाला तुमचे खाते सक्रिय करणे आवश्यक आहे.',
    
    // Groups
    'unknownGroup' => '{0} एक वैध गट नाही.',
    'missingTitle' => 'गटांमध्ये एक शीर्षक असावे लागते.',
    
    // Permissions
    'unknownPermission' => '{0} एक वैध परवानगी नाही.',
];
