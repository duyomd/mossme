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
    'unknownAuthenticator'  => '{0} ni veljaven avtentikator.',
    'unknownUserProvider'   => 'Ni mogoče določiti uporabniškega ponudnika, ki ga je treba uporabiti.',
    'invalidUser'           => 'Ni mogoče najti določenega uporabnika.',
    'bannedUser'            => 'Ne moremo vas prijaviti, saj ste trenutno prepovedani.',
    'logOutBannedUser'      => 'Izčrpani ste bili, ker ste bili prepovedani.',
    'badAttempt'            => 'Ne moremo vas prijaviti. Preverite svoje poverilnice.',
    'noPassword'            => 'Ne moremo potrditi uporabnika brez gesla.',
    'invalidPassword'       => 'Ne moremo vas prijaviti. Preverite svoje geslo.',
    'noToken'               => 'Vsak zahtevek mora imeti prenosni žeton v glavi {0}.',
    'badToken'              => 'Dostopni žeton je neveljaven.',
    'oldToken'              => 'Dostopni žeton je potekel.',
    'noUserEntity'          => 'Uporabniški entitet mora biti zagotovljena za preverjanje gesla.',
    'invalidEmail'          => 'Ni mogoče preveriti, ali se e-poštni naslov ujema z e-pošto v evidenci.',
    'unableSendEmailToUser' => 'Opravičujemo se, pri pošiljanju e-pošte je prišlo do težave. E-pošte nismo mogli poslati na "{0}".',
    'throttled'             => 'Preveč zahtevkov iz tega IP naslova. Poskusite znova čez {0} sekund.',
    'notEnoughPrivilege'    => 'Nimate potrebnih dovoljenj za izvajanje želene operacije.',
    // JWT Exceptions
    'invalidJWT'     => 'Žeton je neveljaven.',
    'expiredJWT'     => 'Žeton je potekel.',
    'beforeValidJWT' => 'Žeton še ni na voljo.',

    'email'           => 'E-poštni naslov',
    'username'        => 'Uporabniško ime',
    'password'        => 'Geslo',
    'passwordConfirm' => 'Geslo (ponovno)',
    'haveAccount'     => 'Imate že račun?',
    'token'           => 'Žeton',

    // Gumbi
    'confirm' => 'Potrdi',
    'send'    => 'Pošlji',

    // Registracija
    'register'         => 'Registracija',
    'registerDisabled' => 'Registracija trenutno ni dovoljena.',
    'registerSuccess'  => 'Dobrodošli!',

    // Prijava
    'login'              => 'Prijava',
    'needAccount'        => 'Potrebujete račun?',
    'rememberMe'         => 'Zapomni si me?',
    'forgotPassword'     => 'Pozabili ste geslo?',
    'useMagicLink'       => 'Uporabite povezavo za prijavo',
    'magicLinkSubject'   => 'Vaša povezava za prijavo',
    'magicTokenNotFound' => 'Povezave ni mogoče preveriti.',
    'magicLinkExpired'   => 'Opravičujemo se, povezava je potekla.',
    'checkYourEmail'     => 'Preverite svojo e-pošto!',
    'magicLinkDetails'   => 'Pravkar smo vam poslali e-pošto s povezavo za prijavo. Veljavna je le {0} minut.',
    'magicLinkDisabled'  => 'Uporaba MagicLink trenutno ni dovoljena.',
    'successLogout'      => 'Uspešno ste se odjavili.',
    'backToLogin'        => 'Nazaj na prijavo',

    // Change password
    'changePassword'            => 'Spremeni geslo',
    'newPassword'               => 'Novo geslo',
    'newPasswordConfirm'        => 'Novo geslo (znova)',
    'changePasswordBtn'         => 'Posodobi',
    'changePasswordTime'        => 'Geslo lahko spremenite na novo, če želite.',
    'changePasswordSuccess'     => 'Novo geslo je bilo uspešno spremenjeno.',

    // Gesla
    'errorPasswordLength'       => 'Gesla morajo biti dolga vsaj {0, number} znakov.',
    'suggestPasswordLength'     => 'Geselne fraze - do 255 znakov dolge - so bolj varna gesla, ki so enostavna za zapomniti.',
    'errorPasswordCommon'       => 'Geslo ne sme biti pogosto geslo.',
    'suggestPasswordCommon'     => 'Geslo je bilo preverjeno proti več kot 65 tisoč pogosto uporabljenim geslom ali geslom, ki so bila izpostavljena prek hekerskih napadov.',
    'errorPasswordPersonal'     => 'Gesla ne smejo vsebovati ponovno obdelanih osebnih podatkov.',
    'suggestPasswordPersonal'   => 'Različice vaše e-pošte ali uporabniškega imena ne bi smele biti uporabljene za gesla.',
    'errorPasswordTooSimilar'   => 'Geslo je preveč podobno uporabniškemu imenu.',
    'suggestPasswordTooSimilar' => 'Ne uporabljajte delov svojega uporabniškega imena v geslu.',
    'errorPasswordPwned'        => 'Geslo {0} je bilo izpostavljeno zaradi kršitve podatkov in je bilo videno {1, number} krat v {2} kompromitiranih geslih.',
    'suggestPasswordPwned'      => '{0} nikoli ne sme biti uporabljeno kot geslo. Če ga uporabljate kje, ga takoj spremenite.',
    'errorPasswordEmpty'        => 'Geslo je obvezno.',
    'errorPasswordTooLongBytes' => 'Geslo ne sme preseči {param} bajtov.',
    'passwordChangeSuccess'     => 'Geslo je bilo uspešno spremenjeno',
    'userDoesNotExist'          => 'Geslo ni bilo spremenjeno. Uporabnik ne obstaja',
    'resetTokenExpired'         => 'Opravičujemo se. Vaš ponastavitveni žeton je potekel.',

    // E-poštni podatki
    'emailInfo'      => 'Nekaj informacij o osebi:',
    'emailIpAddress' => 'IP naslov:',
    'emailDevice'    => 'Naprava:',
    'emailDate'      => 'Datum:',

    // 2FA
    'email2FATitle'       => 'Dvofaktorska avtentikacija',
    'confirmEmailAddress' => 'Potrdite svoj e-poštni naslov.',
    'emailEnterCode'      => 'Potrdite svojo e-pošto',
    'emailConfirmCode'    => 'Vnesite 6-mestno kodo, ki smo jo pravkar poslali na vaš e-poštni naslov.',
    'email2FASubject'     => 'Vaša avtentikacijska koda',
    'email2FAMailBody'    => 'Vaša avtentikacijska koda je:',
    'invalid2FAToken'     => 'Koda je bila napačna.',
    'need2FA'             => 'Morate opraviti dvofaktorsko preverjanje.',
    'needVerification'    => 'Preverite svojo e-pošto, da dokončate aktivacijo računa.',

    // Aktivacija
    'emailActivateTitle'    => 'Aktivacija e-pošte',
    'emailActivateBody'     => 'Pravkar smo vam poslali e-pošto s kodo za potrditev vašega e-poštnega naslova. Kodo kopirajte in prilepite spodaj.',
    'emailActivateSubject'  => 'Vaša aktivacijska koda',
    'emailActivateMailBody' => 'Uporabite kodo spodaj za aktivacijo svojega računa in začnite uporabljati spletno stran.',
    'invalidActivateToken'  => 'Koda je bila napačna.',
    'needActivate'          => 'Registracijo morate dokončati z potrditvijo kode, poslano na vaš e-poštni naslov.',
    'activationBlocked'     => 'Pred prijavo morate aktivirati svoj račun.',

    // Skupine
    'unknownGroup' => '{0} ni veljavna skupina.',
    'missingTitle' => 'Skupine morajo imeti naslov.',

    // Dovoljenja
    'unknownPermission' => '{0} ni veljavno dovoljenje.',
];
