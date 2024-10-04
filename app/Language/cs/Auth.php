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
    'unknownAuthenticator'  => '{0} není platný autentifikátor.',
    'unknownUserProvider'   => 'Nelze určit poskytovatele uživatelů k použití.',
    'invalidUser'           => 'Nelze najít specifikovaného uživatele.',
    'bannedUser'            => 'Nemůžete se přihlásit, protože jste aktuálně zablokován.',
    'logOutBannedUser'      => 'Byli jste odhlášeni, protože jste byli zablokováni.',
    'badAttempt'            => 'Nelze se přihlásit. Zkontrolujte prosím své přihlašovací údaje.',
    'noPassword'            => 'Nelze ověřit uživatele bez hesla.',
    'invalidPassword'       => 'Nelze se přihlásit. Zkontrolujte prosím své heslo.',
    'noToken'               => 'Každý požadavek musí obsahovat token v hlavičce {0}.',
    'badToken'              => 'Token pro přístup je neplatný.',
    'oldToken'              => 'Token pro přístup vypršel.',
    'noUserEntity'          => 'Uživatelská entita musí být poskytnuta pro ověření hesla.',
    'invalidEmail'          => 'Nelze ověřit, zda e-mailová adresa odpovídá e-mailu v záznamu.',
    'unableSendEmailToUser' => 'Omlouváme se, došlo k problému s odesíláním e-mailu. E-mail nebyl odeslán na "{0}".',
    'throttled'             => 'Příliš mnoho požadavků z této IP adresy. Můžete se pokusit znovu za {0} sekund.',
    'notEnoughPrivilege'    => 'Nemáte potřebná oprávnění pro provedení požadované operace.',
    // JWT Exceptions
    'invalidJWT'     => 'Token je neplatný.',
    'expiredJWT'     => 'Token vypršel.',
    'beforeValidJWT' => 'Token ještě není k dispozici.',

    'email'           => 'E-mailová adresa',
    'username'        => 'Uživatelské jméno',
    'password'        => 'Heslo',
    'passwordConfirm' => 'Heslo (znovu)',
    'haveAccount'     => 'Máte již účet?',
    'token'           => 'Token',

    // Buttons
    'confirm' => 'Potvrdit',
    'send'    => 'Odeslat',

    // Registration
    'register'         => 'Registrovat',
    'registerDisabled' => 'Registrace není aktuálně povolena.',
    'registerSuccess'  => 'Vítejte!',

    // Login
    'login'              => 'Přihlásit se',
    'needAccount'        => 'Potřebujete účet?',
    'rememberMe'         => 'Zapamatovat si mě?',
    'forgotPassword'     => 'Zapomněli jste heslo?',
    'useMagicLink'       => 'Použít přihlašovací odkaz',
    'magicLinkSubject'   => 'Váš přihlašovací odkaz',
    'magicTokenNotFound' => 'Nelze ověřit odkaz.',
    'magicLinkExpired'   => 'Omlouváme se, odkaz vypršel.',
    'checkYourEmail'     => 'Zkontrolujte svůj e-mail!',
    'magicLinkDetails'   => 'Právě jsme vám poslali e-mail s přihlašovacím odkazem. Pokud jej nemůžete najít, zkontrolujte složku Spam/Nevyžádaná pošta. Platí pouze {0} minut.',
    'magicLinkDisabled'  => 'Použití MagicLink je aktuálně zakázáno.',
    'successLogout'      => 'Úspěšně jste se odhlásili.',
    'backToLogin'        => 'Zpět na přihlášení',

    // Change password
    'changePassword'            => 'Změnit heslo',
    'newPassword'               => 'Nové heslo',
    'newPasswordConfirm'        => 'Nové heslo (znovu)',
    'changePasswordBtn'         => 'Aktualizovat',
    'changePasswordTime'        => 'Pokud chcete, můžete si změnit heslo na nové.',
    'changePasswordSuccess'     => 'Nové heslo bylo úspěšně změněno.',

    // Passwords
    'errorPasswordLength'       => 'Hesla musí mít alespoň {0, number} znaků.',
    'suggestPasswordLength'     => 'Heslové fráze - až 255 znaků dlouhé - vytvářejí bezpečnější hesla, která jsou snadno zapamatovatelná.',
    'errorPasswordCommon'       => 'Heslo nesmí být běžné heslo.',
    'suggestPasswordCommon'     => 'Heslo bylo zkontrolováno proti více než 65 000 běžně používaným heslům nebo heslům, která byla odhalena při únicích.',
    'errorPasswordPersonal'     => 'Hesla nesmí obsahovat osobní informace přeformátované do nového formátu.',
    'suggestPasswordPersonal'   => 'Variace na vaši e-mailovou adresu nebo uživatelské jméno by neměly být použity jako hesla.',
    'errorPasswordTooSimilar'   => 'Heslo je příliš podobné uživatelskému jménu.',
    'suggestPasswordTooSimilar' => 'Nepoužívejte části svého uživatelského jména ve svém hesle.',
    'errorPasswordPwned'        => 'Heslo {0} bylo odhaleno při úniku dat a bylo viděno {1, number} krát v {2} kompromitovaných heslech.',
    'suggestPasswordPwned'      => '{0} by nikdy nemělo být použito jako heslo. Pokud jej používáte kdekoli, změňte ho okamžitě.',
    'errorPasswordEmpty'        => 'Heslo je povinné.',
    'errorPasswordTooLongBytes' => 'Heslo nemůže přesáhnout {param} bytů.',
    'passwordChangeSuccess'     => 'Heslo bylo úspěšně změněno.',
    'userDoesNotExist'          => 'Heslo nebylo změněno. Uživatel neexistuje.',
    'resetTokenExpired'         => 'Omlouváme se. Váš resetovací token vypršel.',

    // Email Globals
    'emailInfo'      => 'Některé informace o osobě:',
    'emailIpAddress' => 'IP adresa:',
    'emailDevice'    => 'Zařízení:',
    'emailDate'      => 'Datum:',

    // 2FA
    'email2FATitle'       => 'Dvoufaktorové ověřování',
    'confirmEmailAddress' => 'Potvrďte svou e-mailovou adresu.',
    'emailEnterCode'      => 'Potvrďte svůj e-mail',
    'emailConfirmCode'    => 'Zadejte 6místný kód, který jsme právě poslali na vaši e-mailovou adresu.',
    'email2FASubject'     => 'Váš autentifikační kód',
    'email2FAMailBody'    => 'Váš autentifikační kód je:',
    'invalid2FAToken'     => 'Kód byl nesprávný.',
    'need2FA'             => 'Musíte dokončit dvoufaktorovou verifikaci.',
    'needVerification'    => 'Zkontrolujte svůj e-mail, abyste dokončili aktivaci účtu.',

    // Activate
    'emailActivateTitle'    => 'Aktivace e-mailu',
    'emailActivateBody'     => 'Právě jsme vám poslali e-mail s kódem pro potvrzení vaší e-mailové adresy. Pokud jej nemůžete najít, zkontrolujte složku Spam/Nevyžádaná pošta. Zkopírujte tento kód a vložte jej níže.',
    'emailActivateSubject'  => 'Váš aktivace kód',
    'emailActivateMailBody' => 'Použijte níže uvedený kód k aktivaci svého účtu a začněte používat web.',
    'invalidActivateToken'  => 'Kód byl nesprávný.',
    'needActivate'          => 'Musíte dokončit registraci potvrzením kódu, který jsme poslali na vaši e-mailovou adresu.',
    'activationBlocked'     => 'Musíte aktivovat svůj účet před přihlášením.',

    // Groups
    'unknownGroup' => '{0} není platná skupina.',
    'missingTitle' => 'Skupiny musí mít název.',

    // Permissions
    'unknownPermission' => '{0} není platné oprávnění.',
];
