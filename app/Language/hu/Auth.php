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
    'unknownAuthenticator'  => '{0} nem érvényes hitelesítő.',
    'unknownUserProvider'   => 'Nem sikerült meghatározni a használni kívánt Felhasználói Szolgáltatót.',
    'invalidUser'           => 'Nem sikerült megtalálni a megadott felhasználót.',
    'bannedUser'            => 'Nem tud bejelentkezni, mert jelenleg el van tiltva.',
    'logOutBannedUser'      => 'Kijelentkeztünk, mert el lett tiltva.',
    'badAttempt'            => 'Nem tud bejelentkezni. Kérjük, ellenőrizze a hitelesítő adatait.',
    'noPassword'            => 'Nem lehet érvényesíteni a felhasználót jelszó nélkül.',
    'invalidPassword'       => 'Nem tud bejelentkezni. Kérjük, ellenőrizze a jelszót.',
    'noToken'               => 'Minden kérésnek rendelkeznie kell egy hordozó tokennel a {0} fejlécben.',
    'badToken'              => 'A hozzáférési token érvénytelen.',
    'oldToken'              => 'A hozzáférési token lejárt.',
    'noUserEntity'          => 'Felhasználói entitást kell megadni a jelszó érvényesítéséhez.',
    'invalidEmail'          => 'Nem sikerült ellenőrizni, hogy az e-mail cím egyezik-e a nyilvántartott e-mail címmel.',
    'unableSendEmailToUser' => 'Sajnáljuk, probléma merült fel az e-mail küldése során. Nem tudtunk e-mailt küldeni a(z) "{0}" címre.',
    'throttled'             => 'Túl sok kérés érkezett erről az IP-címről. Kérjük, próbálkozzon újra {0} másodperc múlva.',
    'notEnoughPrivilege'    => 'Nincs meg a szükséges jogosultság az adott művelet végrehajtásához.',
    // JWT Exceptions
    'invalidJWT'     => 'A token érvénytelen.',
    'expiredJWT'     => 'A token lejárt.',
    'beforeValidJWT' => 'A token még nem érhető el.',

    'email'           => 'E-mail cím',
    'username'        => 'Felhasználónév',
    'password'        => 'Jelszó',
    'passwordConfirm' => 'Jelszó (újra)',
    'haveAccount'     => 'Már van fiókja?',
    'token'           => 'Token',

    // Buttons
    'confirm' => 'Megerősít',
    'send'    => 'Küld',

    // Registration
    'register'         => 'Regisztrál',
    'registerDisabled' => 'A regisztráció jelenleg nem engedélyezett.',
    'registerSuccess'  => 'Üdvözöljük!',

    // Login
    'login'              => 'Bejelentkezés',
    'needAccount'        => 'Szüksége van fiókra?',
    'rememberMe'         => 'Megjegyezz?',
    'forgotPassword'     => 'Elfelejtette a jelszót?',
    'useMagicLink'       => 'Használjon Bejelentkezési Linket',
    'magicLinkSubject'   => 'A Bejelentkezési Linke',
    'magicTokenNotFound' => 'Nem sikerült ellenőrizni a linket.',
    'magicLinkExpired'   => 'Sajnáljuk, a link lejárt.',
    'checkYourEmail'     => 'Ellenőrizze az e-mailjét!',
    'magicLinkDetails'   => 'Most elküldtünk Önnek egy e-mailt, amely tartalmaz egy bejelentkezési linket. A link csak {0} percig érvényes.',
    'magicLinkDisabled'  => 'A MagicLink használata jelenleg nem engedélyezett.',
    'successLogout'      => 'Sikeresen kijelentkezett.',
    'backToLogin'        => 'Vissza a bejelentkezéshez',

    // Change password
    'changePassword'            => 'Jelszó módosítása',
    'newPassword'               => 'Új jelszó',
    'newPasswordConfirm'        => 'Új jelszó (újra)',
    'changePasswordBtn'         => 'Frissítés',
    'changePasswordTime'        => 'Szükség esetén új jelszóra is válthatsz.',
    'changePasswordSuccess'     => 'Az új jelszó sikeresen megváltozott.',

    // Passwords
    'errorPasswordLength'       => 'A jelszónak legalább {0, number} karakter hosszúnak kell lennie.',
    'suggestPasswordLength'     => 'A jelszófrázisok - akár 255 karakter hosszúak - biztonságosabb jelszavakat nyújtanak, amelyeket könnyebb megjegyezni.',
    'errorPasswordCommon'       => 'A jelszó nem lehet egy közönséges jelszó.',
    'suggestPasswordCommon'     => 'A jelszót több mint 65 ezer gyakran használt jelszóval ellenőriztük, vagy olyan jelszóval, amelyet hackek révén szivárogtattak ki.',
    'errorPasswordPersonal'     => 'A jelszavak nem tartalmazhatnak újra hash-elt személyes információkat.',
    'suggestPasswordPersonal'   => 'Az e-mail címe vagy felhasználóneve variációit ne használja jelszóként.',
    'errorPasswordTooSimilar'   => 'A jelszó túl hasonló a felhasználónévhez.',
    'suggestPasswordTooSimilar' => 'Ne használjon a felhasználónevéből származó részeket a jelszóban.',
    'errorPasswordPwned'        => 'A {0} jelszó egy adatvédelmi incidens során kiszivárgott, és {1, number} alkalommal látták {2} kompromittált jelszóban.',
    'suggestPasswordPwned'      => 'A {0} soha ne használja jelszóként. Ha bárhol használja, azonnal változtassa meg.',
    'errorPasswordEmpty'        => 'Jelszó megadása kötelező.',
    'errorPasswordTooLongBytes' => 'A jelszó nem haladhatja meg a {param} bájt hosszúságot.',
    'passwordChangeSuccess'     => 'A jelszó sikeresen megváltozott',
    'userDoesNotExist'          => 'A jelszó nem változott meg. A felhasználó nem létezik',
    'resetTokenExpired'         => 'Sajnáljuk. A visszaállító token lejárt.',

    // Email Globals
    'emailInfo'      => 'Néhány információ a személyről:',
    'emailIpAddress' => 'IP cím:',
    'emailDevice'    => 'Eszköz:',
    'emailDate'      => 'Dátum:',

    // 2FA
    'email2FATitle'       => 'Kétfaktoros hitelesítés',
    'confirmEmailAddress' => 'Megerősítse az e-mail címét.',
    'emailEnterCode'      => 'E-mail megerősítése',
    'emailConfirmCode'    => 'Írja be a 6 jegyű kódot, amelyet most küldtünk az e-mail címére.',
    'email2FASubject'     => 'Az Ön hitelesítő kódja',
    'email2FAMailBody'    => 'Az Ön hitelesítő kódja:',
    'invalid2FAToken'     => 'A kód helytelen volt.',
    'need2FA'             => 'Kétfaktoros ellenőrzést kell végrehajtania.',
    'needVerification'    => 'Ellenőrizze e-mailjét a fiók aktiválásához.',

    // Activate
    'emailActivateTitle'    => 'E-mail Aktiválás',
    'emailActivateBody'     => 'Most elküldtünk Önnek egy e-mailt egy kóddal, amely megerősíti az e-mail címét. Másolja be a kódot az alábbi mezőbe.',
    'emailActivateSubject'  => 'Az Ön aktiváló kódja',
    'emailActivateMailBody' => 'Kérjük, használja az alábbi kódot a fiókja aktiválásához és az oldal használatának megkezdéséhez.',
    'invalidActivateToken'  => 'A kód helytelen volt.',
    'needActivate'          => 'A regisztráció befejezéséhez meg kell erősítenie az e-mail címére küldött kódot.',
    'activationBlocked'     => 'A bejelentkezés előtt aktiválni kell a fiókját.',

    // Groups
    'unknownGroup' => '{0} nem érvényes csoport.',
    'missingTitle' => 'A csoportoknak címet kell adniuk.',

    // Permissions
    'unknownPermission' => '{0} nem érvényes jogosultság.',
];
