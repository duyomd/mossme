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
    'unknownAuthenticator'  => '{0} nu este un autentificator valid.',
    'unknownUserProvider'   => 'Nu se poate determina Providerul de Utilizatori utilizat.',
    'invalidUser'           => 'Nu s-a putut găsi utilizatorul specificat.',
    'bannedUser'            => 'Nu te poți conecta deoarece ești momentan suspendat.',
    'logOutBannedUser'      => 'Ai fost deconectat deoarece ai fost suspendat.',
    'badAttempt'            => 'Nu s-a putut conecta. Te rugăm să verifici datele tale de autentificare.',
    'noPassword'            => 'Nu se poate valida un utilizator fără parolă.',
    'invalidPassword'       => 'Nu s-a putut conecta. Te rugăm să verifici parola ta.',
    'noToken'               => 'Fiecare solicitare trebuie să aibă un token bearer în headerul {0}.',
    'badToken'              => 'Tokenul de acces este invalid.',
    'olToken'               => 'Tokenul de acces a expirat.',
    'noUserEntity'          => 'Entity-ul utilizatorului trebuie să fie furnizat pentru validarea parolei.',
    'invalidEmail'          => 'Nu s-a putut verifica că adresa de email se potrivește cu emailul înregistrat.',
    'unableSendEmailToUser' => 'Ne pare rău, a fost o problemă la trimiterea emailului. Nu am putut trimite un email la "{0}".',
    'throttled'             => 'Prea multe solicitări efectuate de la această adresă IP. Poți încerca din nou în {0} secunde.',
    'notEnoughPrivilege'    => 'Nu ai permisiunile necesare pentru a efectua operațiunea dorită.',
    // JWT Exceptions
    'invalidJWT'     => 'Tokenul este invalid.',
    'expiredJWT'     => 'Tokenul a expirat.',
    'beforeValidJWT' => 'Tokenul nu este încă disponibil.',

    'email'           => 'Adresă de Email',
    'username'        => 'Nume de utilizator',
    'password'        => 'Parolă',
    'passwordConfirm' => 'Parolă (din nou)',
    'haveAccount'     => 'Ai deja un cont?',
    'token'           => 'Token',

    // Buttons
    'confirm' => 'Confirmă',
    'send'    => 'Trimite',

    // Registration
    'register'         => 'Înregistrează-te',
    'registerDisabled' => 'Înregistrarea nu este momentan permisă.',
    'registerSuccess'  => 'Bine ai venit!',

    // Login
    'login'              => 'Autentificare',
    'needAccount'        => 'Ai nevoie de un cont?',
    'rememberMe'         => 'Ține-mă minte?',
    'forgotPassword'     => 'Ți-ai uitat parola?',
    'useMagicLink'       => 'Folosește un Link de Autentificare',
    'magicLinkSubject'   => 'Link-ul tău de autentificare',
    'magicTokenNotFound' => 'Nu s-a putut verifica linkul.',
    'magicLinkExpired'   => 'Ne pare rău, linkul a expirat.',
    'checkYourEmail'     => 'Verifică-ți emailul!',
    'magicLinkDetails'   => 'Tocmai ți-am trimis un email cu un link de autentificare. Este valabil doar timp de {0} minute.',
    'magicLinkDisabled'  => 'Utilizarea MagicLink-ului nu este momentan permisă.',
    'successLogout'      => 'Te-ai deconectat cu succes.',
    'backToLogin'        => 'Înapoi la autentificare',

    // Change password
    'changePassword'            => 'Schimbă parola',
    'newPassword'               => 'Parolă nouă',
    'newPasswordConfirm'        => 'Parolă nouă (din nou)',
    'changePasswordBtn'         => 'Actualizează',
    'changePasswordTime'        => 'Poți schimba la o parolă nouă dacă dorești.',
    'changePasswordSuccess'     => 'Parola nouă a fost schimbată cu succes.',

    // Passwords
    'errorPasswordLength'       => 'Parolele trebuie să aibă cel puțin {0, number} caractere.',
    'suggestPasswordLength'     => 'Frazele de parolă - până la 255 de caractere - fac parolele mai sigure și ușor de reținut.',
    'errorPasswordCommon'       => 'Parola nu trebuie să fie o parolă comună.',
    'suggestPasswordCommon'     => 'Parola a fost verificată împotriva a peste 65k de parole comune sau parole care au fost divulgate prin hack-uri.',
    'errorPasswordPersonal'     => 'Parolele nu pot conține informații personale rehashate.',
    'suggestPasswordPersonal'   => 'Variatiunile adresei tale de email sau numelui de utilizator nu ar trebui folosite pentru parole.',
    'errorPasswordTooSimilar'   => 'Parola este prea similară cu numele de utilizator.',
    'suggestPasswordTooSimilar' => 'Nu folosi părți ale numelui de utilizator în parola ta.',
    'errorPasswordPwned'        => 'Parola {0} a fost expusă din cauza unei breșe de securitate și a fost văzută de {1, number} ori în {2} de parole compromise.',
    'suggestPasswordPwned'      => '{0} nu ar trebui niciodată folosită ca parolă. Dacă o folosești undeva, schimb-o imediat.',
    'errorPasswordEmpty'        => 'O parolă este necesară.',
    'errorPasswordTooLongBytes' => 'Parola nu poate depăși {param} bytes în lungime.',
    'passwordChangeSuccess'     => 'Parola a fost schimbată cu succes',
    'userDoesNotExist'          => 'Parola nu a fost schimbată. Utilizatorul nu există',
    'resetTokenExpired'         => 'Ne pare rău. Tokenul tău de resetare a expirat.',

    // Email Globals
    'emailInfo'      => 'Informații despre persoană:',
    'emailIpAddress' => 'Adresă IP:',
    'emailDevice'    => 'Dispozitiv:',
    'emailDate'      => 'Data:',

    // 2FA
    'email2FATitle'       => 'Autentificare în doi pași',
    'confirmEmailAddress' => 'Confirmă adresa ta de email.',
    'emailEnterCode'      => 'Confirmă emailul',
    'emailConfirmCode'    => 'Introdu codul de 6 cifre pe care tocmai ți l-am trimis pe adresa de email.',
    'email2FASubject'     => 'Codul tău de autentificare',
    'email2FAMailBody'    => 'Codul tău de autentificare este:',
    'invalid2FAToken'     => 'Codul a fost incorect.',
    'need2FA'             => 'Trebuie să finalizezi verificarea în doi pași.',
    'needVerification'    => 'Verifică-ți emailul pentru a finaliza activarea contului.',

    // Activate
    'emailActivateTitle'    => 'Activare Email',
    'emailActivateBody'     => 'Tocmai ți-am trimis un email cu un cod pentru a confirma adresa ta de email. Copiază acel cod și lipește-l mai jos.',
    'emailActivateSubject'  => 'Codul tău de activare',
    'emailActivateMailBody' => 'Te rog să folosești codul de mai jos pentru a activa contul tău și a începe să folosești site-ul.',
    'invalidActivateToken'  => 'Codul a fost incorect.',
    'needActivate'          => 'Trebuie să finalizezi înregistrarea confirmând codul trimis la adresa ta de email.',
    'activationBlocked'     => 'Trebuie să îți activezi contul înainte de a te conecta.',

    // Groups
    'unknownGroup' => '{0} nu este un grup valid.',
    'missingTitle' => 'Grupurile trebuie să aibă un titlu.',

    // Permissions
    'unknownPermission' => '{0} nu este o permisiune validă.',
];
