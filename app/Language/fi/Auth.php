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
    'unknownAuthenticator'  => '{0} ei ole voimassa oleva tunnistaja.',
    'unknownUserProvider'   => 'Käyttäjätoimittajaa ei pystytä määrittämään.',
    'invalidUser'           => 'Määritettyä käyttäjää ei löydy.',
    'bannedUser'            => 'Et voi kirjautua sisään, koska sinut on tällä hetkellä estetty.',
    'logOutBannedUser'      => 'Sinut on kirjauduttu ulos, koska olet estetty.',
    'badAttempt'            => 'Sisäänkirjautuminen epäonnistui. Tarkista tietosi.',
    'noPassword'            => 'Käyttäjää ei voida validoida ilman salasanaa.',
    'invalidPassword'       => 'Sisäänkirjautuminen epäonnistui. Tarkista salasanasi.',
    'noToken'               => 'Jokaisessa pyynnössä on oltava bear token {0} -otsikossa.',
    'badToken'              => 'Käyttöoikeustunnus on virheellinen.',
    'oldToken'              => 'Käyttöoikeustunnus on vanhentunut.',
    'noUserEntity'          => 'Käyttäjäyksikkö on annettava salasanan validoimiseksi.',
    'invalidEmail'          => 'Sähköpostiosoitteen tarkistaminen epäonnistui, se ei täsmää tallennettuun sähköpostiin.',
    'unableSendEmailToUser' => 'Pahoittelut, sähköpostin lähettämisessä oli ongelma. Emme voineet lähettää sähköpostia osoitteeseen "{0}".',
    'throttled'             => 'Liian monta pyyntöä tältä IP-osoitteelta. Voit kokeilla uudelleen {0} sekunnin kuluttua.',
    'notEnoughPrivilege'    => 'Sinulla ei ole tarvittavia oikeuksia halutun toiminnon suorittamiseen.',

    // JWT Exceptions
    'invalidJWT'     => 'Tunnus on virheellinen.',
    'expiredJWT'     => 'Tunnus on vanhentunut.',
    'beforeValidJWT' => 'Tunnus ei ole vielä voimassa.',

    'email'           => 'Sähköpostiosoite',
    'username'        => 'Käyttäjänimi',
    'password'        => 'Salasana',
    'passwordConfirm' => 'Salasana (uudelleen)',
    'haveAccount'     => 'Onko sinulla jo tili?',
    'token'           => 'Tunnus',

    // Buttons
    'confirm' => 'Vahvista',
    'send'    => 'Lähetä',

    // Registration
    'register'         => 'Rekisteröidy',
    'registerDisabled' => 'Rekisteröintiä ei tällä hetkellä sallita.',
    'registerSuccess'  => 'Tervetuloa!',

    // Login
    'login'              => 'Kirjaudu sisään',
    'needAccount'        => 'Tarvitsetko tilin?',
    'rememberMe'         => 'Muista minut?',
    'forgotPassword'     => 'Unohditko salasanasi?',
    'useMagicLink'       => 'Käytä kirjautumislinkkiä',
    'magicLinkSubject'   => 'Kirjautumislinkkisi',
    'magicTokenNotFound' => 'Linkin varmennus epäonnistui.',
    'magicLinkExpired'   => 'Pahoittelut, linkki on vanhentunut.',
    'checkYourEmail'     => 'Tarkista sähköpostisi!',
    'magicLinkDetails'   => 'Olemme juuri lähettäneet sinulle sähköpostin, jossa on kirjautumislinkki. Jos et löydä sitä, tarkista roskapostikansiosi. Linkki on voimassa vain {0} minuuttia.',
    'magicLinkDisabled'  => 'MagicLinkin käyttö ei ole tällä hetkellä sallittua.',
    'successLogout'      => 'Olet kirjautunut ulos onnistuneesti.',
    'backToLogin'        => 'Takaisin kirjautumiseen',

    // Change password
    'changePassword'            => 'Vaihda salasana',
    'newPassword'               => 'Uusi salasana',
    'newPasswordConfirm'        => 'Uusi salasana (uudelleen)',
    'changePasswordBtn'         => 'Päivitä',
    'changePasswordTime'        => 'Voit vaihtaa uuteen salasanaan, jos haluat.',
    'changePasswordSuccess'     => 'Uusi salasana vaihdettu onnistuneesti.',

    // Passwords
    'errorPasswordLength'       => 'Salasanojen täytyy olla vähintään {0, number} merkkiä pitkiä.',
    'suggestPasswordLength'     => 'Salasana- lauseet - jopa 255 merkkiä pitkät - tekevät turvallisempia salasanoja, jotka ovat helppo muistaa.',
    'errorPasswordCommon'       => 'Salasana ei saa olla yleinen salasana.',
    'suggestPasswordCommon'     => 'Salasana tarkistettiin yli 65 000 yleisesti käytetyn salasanan tai hakkerointien kautta vuotaneiden salasanojen joukosta.',
    'errorPasswordPersonal'     => 'Salasanoissa ei saa olla uudelleen hashattuja henkilökohtaisia tietoja.',
    'suggestPasswordPersonal'   => 'Sähköpostiosoitteesi tai käyttäjänimesi variaatioita ei tulisi käyttää salasanoina.',
    'errorPasswordTooSimilar'   => 'Salasana on liian samanlainen kuin käyttäjänimi.',
    'suggestPasswordTooSimilar' => 'Älä käytä käyttäjänimesi osia salasanassasi.',
    'errorPasswordPwned'        => 'Salasana {0} on altistunut tietomurroille ja on nähty {1, number} kertaa {2} vaarantuneiden salasanojen joukossa.',
    'suggestPasswordPwned'      => '{0} ei tulisi koskaan käyttää salasanana. Jos käytät sitä missä tahansa, vaihda se heti.',
    'errorPasswordEmpty'        => 'Salasana on pakollinen.',
    'errorPasswordTooLongBytes' => 'Salasanan pituuden täytyy olla enintään {param} tavua.',
    'passwordChangeSuccess'     => 'Salasana vaihdettu onnistuneesti',
    'userDoesNotExist'          => 'Salasanaa ei vaihdettu. Käyttäjää ei ole olemassa',
    'resetTokenExpired'         => 'Pahoittelut. Palautustunnus on vanhentunut.',

    // Email Globals
    'emailInfo'      => 'Tietoa henkilöstä:',
    'emailIpAddress' => 'IP-osoite:',
    'emailDevice'    => 'Laite:',
    'emailDate'      => 'Päivämäärä:',

    // 2FA
    'email2FATitle'       => 'Kahden tekijän todentaminen',
    'confirmEmailAddress' => 'Vahvista sähköpostiosoitteesi.',
    'emailEnterCode'      => 'Vahvista sähköpostisi',
    'emailConfirmCode'    => 'Syötä 6-numeroinen koodi, jonka lähetimme sähköpostiosoitteeseesi.',
    'email2FASubject'     => 'Todennuskoodisi',
    'email2FAMailBody'    => 'Todennuskoodisi on:',
    'invalid2FAToken'     => 'Koodi oli virheellinen.',
    'need2FA'             => 'Sinun on suoritettava kaksivaiheinen varmennus.',
    'needVerification'    => 'Tarkista sähköpostisi tilin aktivoimiseksi.',

    // Activate
    'emailActivateTitle'    => 'Sähköpostin aktivointi',
    'emailActivateBody'     => 'Olemme juuri lähettäneet sinulle sähköpostin koodilla sähköpostiosoitteesi vahvistamiseksi. Jos et löydä sitä, tarkista roskapostikansiosi. Kopioi se koodi ja liitä se alle.',
    'emailActivateSubject'  => 'Aktivointikoodisi',
    'emailActivateMailBody' => 'Käytä alla olevaa koodia aktivoidaksesi tilisi ja aloittaaksesi sivuston käytön.',
    'invalidActivateToken'  => 'Koodi oli virheellinen.',
    'needActivate'          => 'Sinun on suoritettava rekisteröintisi vahvistamalla sähköpostitse lähetetty koodi.',
    'activationBlocked'     => 'Sinun on aktivoitava tili ennen sisäänkirjautumista.',

    // Groups
    'unknownGroup' => '{0} ei ole voimassa oleva ryhmä.',
    'missingTitle' => 'Ryhmissä on oltava otsikko.',

    // Permissions
    'unknownPermission' => '{0} ei ole voimassa oleva lupa.',
];
