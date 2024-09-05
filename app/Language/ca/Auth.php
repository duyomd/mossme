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
    'unknownAuthenticator'  => '{0} no és un autenticador vàlid.',
    'unknownUserProvider'   => 'No es pot determinar el proveïdor d’usuaris a utilitzar.',
    'invalidUser'           => 'No es pot localitzar l’usuari especificat.',
    'bannedUser'            => 'No es pot iniciar sessió perquè actualment estàs prohibit.',
    'logOutBannedUser'      => 'Has estat desconnectat perquè estàs prohibit.',
    'badAttempt'            => 'No es pot iniciar sessió. Si us plau, comprova les teves credencials.',
    'noPassword'            => 'No es pot validar un usuari sense una contrasenya.',
    'invalidPassword'       => 'No es pot iniciar sessió. Si us plau, comprova la teva contrasenya.',
    'noToken'               => 'Cada sol·licitud ha de tenir un token de portador a l’encapçalament {0}.',
    'badToken'              => 'El token d’accés no és vàlid.',
    'oldToken'              => 'El token d’accés ha caducat.',
    'noUserEntity'          => 'S’ha de proporcionar una entitat d’usuari per a la validació de la contrasenya.',
    'invalidEmail'          => 'No es pot verificar que l’adreça de correu electrònic coincideixi amb l’adreça enregistrada.',
    'unableSendEmailToUser' => 'Ho sentim, hi ha hagut un problema enviant el correu electrònic. No s’ha pogut enviar un correu electrònic a "{0}".',
    'throttled'             => 'S’han fet massa sol·licituds des d’aquesta adreça IP. Pots tornar-ho a intentar en {0} segons.',
    'notEnoughPrivilege'    => 'No tens els permisos necessaris per realitzar l’operació desitjada.',
    // JWT Exceptions
    'invalidJWT'     => 'El token no és vàlid.',
    'expiredJWT'     => 'El token ha caducat.',
    'beforeValidJWT' => 'El token no està disponible encara.',

    'email'           => 'Adreça de correu electrònic',
    'username'        => 'Nom d’usuari',
    'password'        => 'Contrasenya',
    'passwordConfirm' => 'Contrasenya (novament)',
    'haveAccount'     => 'Ja tens un compte?',
    'token'           => 'Token',

    // Buttons
    'confirm' => 'Confirmar',
    'send'    => 'Enviar',

    // Registration
    'register'         => 'Registrar-se',
    'registerDisabled' => 'La registració no està actualment permès.',
    'registerSuccess'  => 'Benvingut a bord!',

    // Login
    'login'              => 'Iniciar sessió',
    'needAccount'        => 'Necessites un compte?',
    'rememberMe'         => 'Recorda’m?',
    'forgotPassword'     => 'Has oblidat la contrasenya?',
    'useMagicLink'       => 'Utilitza un enllaç de connexió',
    'magicLinkSubject'   => 'El teu enllaç de connexió',
    'magicTokenNotFound' => 'No es pot verificar l’enllaç.',
    'magicLinkExpired'   => 'Ho sentim, l’enllaç ha caducat.',
    'checkYourEmail'     => 'Comprova el teu correu electrònic!',
    'magicLinkDetails'   => 'Acabem d’enviar-te un correu electrònic amb un enllaç de connexió. És vàlid només durant {0} minuts.',
    'magicLinkDisabled'  => 'L’ús de MagicLink no està actualment permès.',
    'successLogout'      => 'Has tancat la sessió amb èxit.',
    'backToLogin'        => 'Tornar a iniciar sessió',

    // Change password
    'changePassword'            => 'Canvia la contrasenya',
    'newPassword'               => 'Nova contrasenya',
    'newPasswordConfirm'        => 'Nova contrasenya (de nou)',
    'changePasswordBtn'         => 'Actualitza',
    'changePasswordTime'        => 'Pots canviar a una nova contrasenya si vols.',
    'changePasswordSuccess'     => 'Nova contrasenya canviada correctament.',

    // Passwords
    'errorPasswordLength'       => 'Les contrasenyes han de tenir almenys {0, number} caràcters.',
    'suggestPasswordLength'     => 'Les frases de contrasenya - fins a 255 caràcters de longitud - fan que les contrasenyes siguin més segures i fàcils de recordar.',
    'errorPasswordCommon'       => 'La contrasenya no ha de ser una contrasenya comuna.',
    'suggestPasswordCommon'     => 'La contrasenya s’ha comprovat amb més de 65 mil contrasenyes comunes o contrasenyes que han estat filtrades per atacs.',
    'errorPasswordPersonal'     => 'Les contrasenyes no poden contenir informació personal rehashada.',
    'suggestPasswordPersonal'   => 'Les variacions del teu correu electrònic o nom d’usuari no s’han de fer servir com a contrasenyes.',
    'errorPasswordTooSimilar'   => 'La contrasenya és massa similar al nom d’usuari.',
    'suggestPasswordTooSimilar' => 'No utilitzis parts del teu nom d’usuari a la contrasenya.',
    'errorPasswordPwned'        => 'La contrasenya {0} s’ha exposat a causa d’una filtració de dades i s’ha vist {1, number} vegades en {2} de contrasenyes compromeses.',
    'suggestPasswordPwned'      => '{0} no hauria de ser mai utilitzat com a contrasenya. Si l’estàs utilitzant en qualsevol lloc, canvia-la immediatament.',
    'errorPasswordEmpty'        => 'Es requereix una contrasenya.',
    'errorPasswordTooLongBytes' => 'La contrasenya no pot excedir els {param} bytes de longitud.',
    'passwordChangeSuccess'     => 'Contrasenya canviada amb èxit',
    'userDoesNotExist'          => 'La contrasenya no s’ha canviat. L’usuari no existeix',
    'resetTokenExpired'         => 'Ho sentim. El teu token de reinici ha caducat.',

    // Email Globals
    'emailInfo'      => 'Alguna informació sobre la persona:',
    'emailIpAddress' => 'Adreça IP:',
    'emailDevice'    => 'Dispositiu:',
    'emailDate'      => 'Data:',

    // 2FA
    'email2FATitle'       => 'Autenticació de dos factors',
    'confirmEmailAddress' => 'Confirma la teva adreça de correu electrònic.',
    'emailEnterCode'      => 'Confirma el teu correu electrònic',
    'emailConfirmCode'    => 'Introdueix el codi de 6 dígits que acabem d’enviar a la teva adreça de correu electrònic.',
    'email2FASubject'     => 'El teu codi d’autenticació',
    'email2FAMailBody'    => 'El teu codi d’autenticació és:',
    'invalid2FAToken'     => 'El codi era incorrecte.',
    'need2FA'             => 'Hauràs de completar una verificació de dos factors.',
    'needVerification'    => 'Comprova el teu correu electrònic per completar l’activació del compte.',

    // Activate
    'emailActivateTitle'    => 'Activació del correu electrònic',
    'emailActivateBody'     => 'Acabem d’enviar-te un correu electrònic amb un codi per confirmar la teva adreça de correu electrònic. Copia aquest codi i enganxa’l a continuació.',
    'emailActivateSubject'  => 'El teu codi d’activació',
    'emailActivateMailBody' => 'Si us plau, utilitza el codi següent per activar el teu compte i començar a utilitzar el lloc.',
    'invalidActivateToken'  => 'El codi era incorrecte.',
    'needActivate'          => 'Hauràs de completar el registre confirmant el codi enviat a la teva adreça de correu electrònic.',
    'activationBlocked'     => 'Hauràs d’activar el teu compte abans d’iniciar sessió.',

    // Groups
    'unknownGroup' => '{0} no és un grup vàlid.',
    'missingTitle' => 'Els grups han de tenir un títol.',

    // Permissions
    'unknownPermission' => '{0} no és un permís vàlid.',
];
