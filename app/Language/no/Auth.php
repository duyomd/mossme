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
    'unknownAuthenticator'  => '{0} er ikke en gyldig autentisator.',
    'unknownUserProvider'   => 'Kan ikke bestemme brukerleverandøren som skal brukes.',
    'invalidUser'           => 'Kan ikke finne den spesifiserte brukeren.',
    'bannedUser'            => 'Kan ikke logge deg inn da du er for øyeblikket utestengt.',
    'logOutBannedUser'      => 'Du har blitt logget ut fordi du er utestengt.',
    'badAttempt'            => 'Kan ikke logge deg inn. Vennligst sjekk legitimasjonen din.',
    'noPassword'            => 'Kan ikke validere en bruker uten passord.',
    'invalidPassword'       => 'Kan ikke logge deg inn. Vennligst sjekk passordet ditt.',
    'noToken'               => 'Hver forespørsel må ha en bærer-token i {0} headeren.',
    'badToken'              => 'Tilgangstokenet er ugyldig.',
    'olToken'               => 'Tilgangstokenet har utløpt.',
    'noUserEntity'          => 'Brukerentitet må være tilstede for passordvalidering.',
    'invalidEmail'          => 'Kan ikke verifisere at e-postadressen stemmer overens med e-posten som er registrert.',
    'unableSendEmailToUser' => 'Beklager, det var et problem med å sende e-posten. Vi kunne ikke sende e-post til "{0}".',
    'throttled'             => 'For mange forespørseler gjort fra denne IP-adressen. Du kan prøve igjen om {0} sekunder.',
    'notEnoughPrivilege'    => 'Du har ikke nødvendige tillatelser til å utføre den ønskede handlingen.',
    // JWT Exceptions
    'invalidJWT'     => 'Tokenet er ugyldig.',
    'expiredJWT'     => 'Tokenet har utløpt.',
    'beforeValidJWT' => 'Tokenet er ikke tilgjengelig ennå.',

    'email'           => 'E-postadresse',
    'username'        => 'Brukernavn',
    'password'        => 'Passord',
    'passwordConfirm' => 'Passord (igjen)',
    'haveAccount'     => 'Har du allerede en konto?',
    'token'           => 'Token',

    // Buttons
    'confirm' => 'Bekreft',
    'send'    => 'Send',

    // Registration
    'register'         => 'Registrer',
    'registerDisabled' => 'Registrering er ikke tillatt for øyeblikket.',
    'registerSuccess'  => 'Velkommen ombord!',

    // Login
    'login'              => 'Logg inn',
    'needAccount'        => 'Trenger du en konto?',
    'rememberMe'         => 'Husk meg?',
    'forgotPassword'     => 'Glemte du passordet?',
    'useMagicLink'       => 'Bruk en påloggingslenke',
    'magicLinkSubject'   => 'Din påloggingslenke',
    'magicTokenNotFound' => 'Kan ikke verifisere lenken.',
    'magicLinkExpired'   => 'Beklager, lenken har utløpt.',
    'checkYourEmail'     => 'Sjekk e-posten din!',
    'magicLinkDetails'   => 'Vi har nettopp sendt deg en e-post med en påloggingslenke. Den er kun gyldig i {0} minutter.',
    'magicLinkDisabled'  => 'Bruk av MagicLink er for øyeblikket ikke tillatt.',
    'successLogout'      => 'Du har blitt logget ut.',
    'backToLogin'        => 'Tilbake til innlogging',

    // Passwords
    'errorPasswordLength'       => 'Passord må være minst {0, number} tegn langt.',
    'suggestPasswordLength'     => 'Passordfraser - opptil 255 tegn lange - gir sikrere passord som er lett å huske.',
    'errorPasswordCommon'       => 'Passordet må ikke være et vanlig passord.',
    'suggestPasswordCommon'     => 'Passordet ble sjekket mot over 65 000 vanlig brukte passord eller passord som har blitt lekket gjennom hacks.',
    'errorPasswordPersonal'     => 'Passord kan ikke inneholde personlig informasjon som er hashet.',
    'suggestPasswordPersonal'   => 'Variasjoner av e-postadressen din eller brukernavnet ditt bør ikke brukes som passord.',
    'errorPasswordTooSimilar'   => 'Passordet er for likt brukernavnet.',
    'suggestPasswordTooSimilar' => 'Ikke bruk deler av brukernavnet ditt i passordet.',
    'errorPasswordPwned'        => 'Passordet {0} har blitt eksponert på grunn av et datainnbrudd og har blitt sett {1, number} ganger i {2} av kompromitterte passord.',
    'suggestPasswordPwned'      => '{0} bør aldri brukes som passord. Hvis du bruker det noe sted, endre det umiddelbart.',
    'errorPasswordEmpty'        => 'Et passord er påkrevd.',
    'errorPasswordTooLongBytes' => 'Passord kan ikke overskride {param} byte i lengde.',
    'passwordChangeSuccess'     => 'Passordet ble endret',
    'userDoesNotExist'          => 'Passordet ble ikke endret. Brukeren eksisterer ikke',
    'resetTokenExpired'         => 'Beklager. Tilbakestillings-tokenet ditt har utløpt.',

    // Email Globals
    'emailInfo'      => 'Noen informasjon om personen:',
    'emailIpAddress' => 'IP-adresse:',
    'emailDevice'    => 'Enhet:',
    'emailDate'      => 'Dato:',

    // 2FA
    'email2FATitle'       => 'To-faktorautentisering',
    'confirmEmailAddress' => 'Bekreft e-postadressen din.',
    'emailEnterCode'      => 'Bekreft e-posten din',
    'emailConfirmCode'    => 'Skriv inn den 6-sifrede koden vi nettopp sendte til e-postadressen din.',
    'email2FASubject'     => 'Din autentiseringskode',
    'email2FAMailBody'    => 'Din autentiseringskode er:',
    'invalid2FAToken'     => 'Koden var feil.',
    'need2FA'             => 'Du må fullføre en to-faktor-verifisering.',
    'needVerification'    => 'Sjekk e-posten din for å fullføre kontoopprettelsen.',

    // Activate
    'emailActivateTitle'    => 'E-postaktivisering',
    'emailActivateBody'     => 'Vi har nettopp sendt deg en e-post med en kode for å bekrefte e-postadressen din. Kopier den koden og lim den inn nedenfor.',
    'emailActivateSubject'  => 'Din aktiveringskode',
    'emailActivateMailBody' => 'Bruk koden nedenfor for å aktivere kontoen din og begynne å bruke nettstedet.',
    'invalidActivateToken'  => 'Koden var feil.',
    'needActivate'          => 'Du må fullføre registreringen din ved å bekrefte koden som ble sendt til e-postadressen din.',
    'activationBlocked'     => 'Du må aktivere kontoen din før du logger inn.',

    // Groups
    'unknownGroup' => '{0} er ikke en gyldig gruppe.',
    'missingTitle' => 'Grupper må ha en tittel.',

    // Permissions
    'unknownPermission' => '{0} er ikke en gyldig tillatelse.',
];
