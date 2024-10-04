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
    'unknownAuthenticator'  => '{0} માન્ય ઓથેન્ટિકેટર નથી.',
    'unknownUserProvider'   => 'લાગુ કરવા માટેનો યુઝર પ્રોવાઇડર નિર્ધારિત કરી શકાતો નથી.',
    'invalidUser'           => 'નિર્ધારિત યુઝરને શોધી શકાતું નથી.',
    'bannedUser'            => 'તમે બેન છો, તેથી પ્રવેશ પ્રાપ્ત કરી શકતા નથી.',
    'logOutBannedUser'      => 'તમે બેન થયા હોવાથી તમને લોગ આઉટ કરવામાં આવ્યું છે.',
    'badAttempt'            => 'તમને લોગિન કરી શકાતું નથી. કૃપા કરીને તમારી ક્રેડેનશિયલ્સ તપાસો.',
    'noPassword'            => 'પાસવર્ડ વગર યુઝરને માન્ય કરી શકાતું નથી.',
    'invalidPassword'       => 'તમને લોગિન કરી શકાતું નથી. કૃપા કરીને તમારું પાસવર્ડ તપાસો.',
    'noToken'               => '{0} હેડર માં બેરર ટોકન હોવું જરુરી છે.',
    'badToken'              => 'એક્સેસ ટોકન માન્ય નથી.',
    'oldToken'              => 'એક્સેસ ટોકન સમાપ્ત થઈ ચૂક્યું છે.',
    'noUserEntity'          => 'પાસવર્ડ માન્યકરણ માટે યુઝર એન્ટિટી પૂરું પાડવું જરૂરી છે.',
    'invalidEmail'          => 'ઇમેઇલ સરનામું સાથે નમ્ર તે ઈમેઇલની પુષ્ટિ કરી શકાતી નથી.',
    'unableSendEmailToUser' => 'માફ કરશો, ઇમેઇલ મોકલવામાં સમસ્યા આવી છે. અમે "{0}"ને ઇમેઇલ મોકલી શક્યા નથી.',
    'throttled'             => 'આ IP સરનામેથી ઘણાં બઘા વિનંતીઓ કરવામાં આવી છે. તમે {0} સેકન્ડ પછી ફરીથી પ્રયાસ કરી શકો છો.',
    'notEnoughPrivilege'    => 'તમારી પાસે જરૂરી પરવાનગી નથી.',
    // JWT Exceptions
    'invalidJWT'     => 'ટોકન માન્ય નથી.',
    'expiredJWT'     => 'ટોકન સમાપ્ત થઈ ચૂક્યું છે.',
    'beforeValidJWT' => 'ટોકન હજુ ઉપલબ્ધ નથી.',

    'email'           => 'ઇમેઇલ સરનામું',
    'username'        => 'યુઝર નામ',
    'password'        => 'પાસવર્ડ',
    'passwordConfirm' => 'પાસવર્ડ (ફરીથી)',
    'haveAccount'     => 'પહેલાથી ખાતું છે?',
    'token'           => 'ટોકન',

    // Buttons
    'confirm' => 'પુષ્ટિ કરો',
    'send'    => 'મોકલો',

    // Registration
    'register'         => 'નોંધણી કરો',
    'registerDisabled' => 'હાલમાં નોંધણી મંજૂર નથી.',
    'registerSuccess'  => 'સ્વાગત છે!',

    // Login
    'login'              => 'લોગિન',
    'needAccount'        => 'ખાતું જોઈએ?',
    'rememberMe'         => 'મને યાદ રાખો?',
    'forgotPassword'     => 'તમારા પાસવર્ડને ભૂલી ગયા છો?',
    'useMagicLink'       => 'લોગિન લિંકનો ઉપયોગ કરો',
    'magicLinkSubject'   => 'તમારી લોગિન લિંક',
    'magicTokenNotFound' => 'લિંકની પુષ્ટિ કરી શકાતી નથી.',
    'magicLinkExpired'   => 'માફ કરશો, લિંકની અવધિ સમાપ્ત થઈ ગઈ છે.',
    'checkYourEmail'     => 'તમારા ઇમેઇલ તપાસો!',
    'magicLinkDetails'   => 'અમે તમને લોગિન લિંક સાથે એક ઇમેઇલ મોકલી છે. જો તમને તે ન મળે, તો કૃપા કરીને તમારા સ્પામ/જંક ફોલ્ડરને ચકાસો. આ લિંક માત્ર {0} મિનિટ માટે માન્ય છે.',
    'magicLinkDisabled'  => 'મેજીક લિંકનો ઉપયોગ હાલમાં મંજૂર નથી.',
    'successLogout'      => 'તમે સફળતાપૂર્વક લોગ આઉટ થઈ ગયા છો.',
    'backToLogin'        => 'લોગિન પર પાછા જાઓ',

    // Change password
    'changePassword'            => 'પાસવર્ડ બદલો',
    'newPassword'               => 'નવો પાસવર્ડ',
    'newPasswordConfirm'        => 'નવો પાસવર્ડ (ફરીથી)',
    'changePasswordBtn'         => 'અપડેટ કરો',
    'changePasswordTime'        => 'જો તમે ઇચ્છતા હોવ તો તમે નવા પાસવર્ડમાં બદલી શકો છો.',
    'changePasswordSuccess'     => 'નવો પાસવર્ડ સફળતાપૂર્વક બદલાઈ ગયો છે.',

    // Passwords
    'errorPasswordLength'       => 'પાસવર્ડમાં ઓછામાં ઓછી {0, number} અક્ષરો હોવી જોઈએ.',
    'suggestPasswordLength'     => 'પાસવર્ડ માટે 255 અક્ષરો સુધી, સરળતાથી યાદ રાખી શકાય એવા પાસવર્ડ્સ બનાવશે.',
    'errorPasswordCommon'       => 'પાસવર્ડ સામાન્ય નથી હોવો જોઈએ.',
    'suggestPasswordCommon'     => 'પાસવર્ડ 65k થી વધુ સામાન્ય રીતે વપરાતો પાસવર્ડ્સ અથવા હેક થવાથી લિક થયેલ પાસવર્ડ્સની સામે ચકાસવામાં આવ્યો હતો.',
    'errorPasswordPersonal'     => 'પાસવર્ડમાં પુનઃહેશ કરવામાં આવેલ વ્યક્તિગત માહિતી નહીં હોવી જોઈએ.',
    'suggestPasswordPersonal'   => 'તમારા ઇમેઇલ સરનામા અથવા યુઝર નામના વેરિએશનનો ઉપયોગ પાસવર્ડ તરીકે ન કરશો.',
    'errorPasswordTooSimilar'   => 'પાસવર્ડ યુઝર નામ સાથે ખૂબ مشابه છે.',
    'suggestPasswordTooSimilar' => 'તમારા પાસવર્ડમાં તમારા યુઝર નામના ભાગોનો ઉપયોગ ન કરો.',
    'errorPasswordPwned'        => 'પાસવર્ડ {0} માહિતી રીફીલથી જાહેર થયું છે અને {1, number} વખત {2} પાટલેલ પાસવર્ડ્સમાં જોવા મળ્યું છે.',
    'suggestPasswordPwned'      => '{0} પાસવર્ડ તરીકે ઉપયોગ કરવા માટે કદી નહીં. જો તમે તેને ક્યાંય ઉપયોગ કરી રહ્યા છો તો તરત જ તેને બદલો.',
    'errorPasswordEmpty'        => 'પાસવર્ડ જરૂરી છે.',
    'errorPasswordTooLongBytes' => 'પાસવર્ડની લંબાઈ {param} બાઈટ્સથી વધુ ન હોવી જોઈએ.',
    'passwordChangeSuccess'     => 'પાસવર્ડ સફળતાપૂર્વક બદલાયો',
    'userDoesNotExist'          => 'પાસવર્ડ બદલાયો નહીં. યુઝર અસ્તિત્વમાં નથી',
    'resetTokenExpired'         => 'માફ કરશો. તમારા પુનરસેટ ટોકનની અવધિ સમાપ્ત થઈ ગઈ છે.',

    // Email Globals
    'emailInfo'      => 'વ્યક્તિ વિશે કેટલીક માહિતી:',
    'emailIpAddress' => 'IP સરનામું:',
    'emailDevice'    => 'ઉપકરણ:',
    'emailDate'      => 'તારીખ:',

    // 2FA
    'email2FATitle'       => 'ડુઇ ફેક્ટર ઓથેન્ટિકેશન',
    'confirmEmailAddress' => 'તમારા ઇમેઇલ સરનામું પુષ્ટિ કરો.',
    'emailEnterCode'      => 'તમારા ઇમેઇલને પુષ્ટિ કરો',
    'emailConfirmCode'    => 'અમે તમારા ઇમેઇલ સરનામે મોકલી આપેલી 6-અંક કોડ દાખલ કરો.',
    'email2FASubject'     => 'તમારા ઓથેન્ટિકેશન કોડ',
    'email2FAMailBody'    => 'તમારા ઓથેન્ટિકેશન કોડ છે:',
    'invalid2FAToken'     => 'કોડ ખોટો હતો.',
    'need2FA'             => 'તમારે બે-ફેક્ટર વેરિફિકેશન પૂરું કરવું પડશે.',
    'needVerification'    => 'ખાતાની સક્રિયતા પૂર્ણ કરવા માટે તમારું ઇમેઇલ તપાસો.',

    // Activate
    'emailActivateTitle'    => 'ઇમેઇલ સક્રિયતા',
    'emailActivateBody'     => 'અમે તમારી ઇમેઇલ સરનામે એક કોડ સાથે ઇમેઇલ મોકલી છે. જો તમને તે ન મળે, તો કૃપા કરીને તમારા સ્પામ/જંક ફોલ્ડરને ચકાસો. તે કોડને કૉપી કરો અને નીચે પેસ્ટ કરો.',
    'emailActivateSubject'  => 'તમારા સક્રિયકરણ કોડ',
    'emailActivateMailBody' => 'તમારા ખાતા સક્રિય કરવા માટે નીચેના કોડનો ઉપયોગ કરો અને સાઇટ શરૂ કરો.',
    'invalidActivateToken'  => 'કોડ ખોટો હતો.',
    'needActivate'          => 'તમારા ઇમેઇલ સરનામે મોકલેલા કોડની પુષ્ટિ દ્વારા નોંધણી પૂર્ણ કરવી પડશે.',
    'activationBlocked'     => 'લોગિન કરતા પહેલા તમારું ખાતું સક્રિય કરવું પડશે.',

    // Groups
    'unknownGroup' => '{0} માન્ય જૂથ નથી.',
    'missingTitle' => 'જૂથમાં શીર્ષક હોવું જોઈએ.',

    // Permissions
    'unknownPermission' => '{0} માન્ય અનુમતિ નથી.',
];
