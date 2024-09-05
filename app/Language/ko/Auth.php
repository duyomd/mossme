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
    'unknownAuthenticator'  => '{0}은(는) 유효한 인증기가 아닙니다.',
    'unknownUserProvider'   => '사용자 제공자를 확인할 수 없습니다.',
    'invalidUser'           => '지정된 사용자를 찾을 수 없습니다.',
    'bannedUser'            => '현재 차단되어 있어 로그인할 수 없습니다.',
    'logOutBannedUser'      => '차단된 계정으로 로그아웃되었습니다.',
    'badAttempt'            => '로그인할 수 없습니다. 자격 증명을 확인하십시오.',
    'noPassword'            => '비밀번호 없이 사용자를 검증할 수 없습니다.',
    'invalidPassword'       => '로그인할 수 없습니다. 비밀번호를 확인하십시오.',
    'noToken'               => '모든 요청에는 {0} 헤더에 베어러 토큰이 필요합니다.',
    'badToken'              => '액세스 토큰이 유효하지 않습니다.',
    'oldToken'              => '액세스 토큰이 만료되었습니다.',
    'noUserEntity'          => '비밀번호 검증을 위해 사용자 엔터티를 제공해야 합니다.',
    'invalidEmail'          => '이메일 주소가 기록된 이메일과 일치하지 않습니다.',
    'unableSendEmailToUser' => '죄송합니다. 이메일을 보내는 데 문제가 발생했습니다. "{0}"로 이메일을 보낼 수 없습니다.',
    'throttled'             => '이 IP 주소에서 너무 많은 요청이 발생했습니다. {0}초 후에 다시 시도할 수 있습니다.',
    'notEnoughPrivilege'    => '원하는 작업을 수행할 수 있는 권한이 없습니다.',

    // JWT Exceptions
    'invalidJWT'     => '토큰이 유효하지 않습니다.',
    'expiredJWT'     => '토큰이 만료되었습니다.',
    'beforeValidJWT' => '토큰이 아직 사용 가능하지 않습니다.',

    'email'           => '이메일 주소',
    'username'        => '사용자 이름',
    'password'        => '비밀번호',
    'passwordConfirm' => '비밀번호 (다시 입력)',
    'haveAccount'     => '계정이 이미 있습니까?',
    'token'           => '토큰',

    // Buttons
    'confirm' => '확인',
    'send'    => '전송',

    // Registration
    'register'         => '가입',
    'registerDisabled' => '현재 가입이 허용되지 않습니다.',
    'registerSuccess'  => '환영합니다!',

    // Login
    'login'              => '로그인',
    'needAccount'        => '계정이 필요하십니까?',
    'rememberMe'         => '기억하기',
    'forgotPassword'     => '비밀번호를 잊으셨나요?',
    'useMagicLink'       => '로그인 링크 사용',
    'magicLinkSubject'   => '귀하의 로그인 링크',
    'magicTokenNotFound' => '링크를 확인할 수 없습니다.',
    'magicLinkExpired'   => '죄송합니다. 링크가 만료되었습니다.',
    'checkYourEmail'     => '이메일을 확인하세요!',
    'magicLinkDetails'   => '방금 로그인 링크가 포함된 이메일을 보냈습니다. 이 링크는 {0}분 동안만 유효합니다.',
    'magicLinkDisabled'  => 'MagicLink 사용이 현재 허용되지 않습니다.',
    'successLogout'      => '로그아웃되었습니다.',
    'backToLogin'        => '로그인으로 돌아가기',

    // Change password
    'changePassword'            => '비밀번호 변경',
    'newPassword'               => '새 비밀번호',
    'newPasswordConfirm'        => '새 비밀번호 (다시 입력)',
    'changePasswordBtn'         => '업데이트',
    'changePasswordTime'        => '원하는 경우 새 비밀번호로 변경할 수 있습니다.',
    'changePasswordSuccess'     => '새 비밀번호가 성공적으로 변경되었습니다.',

    // Passwords
    'errorPasswordLength'       => '비밀번호는 최소 {0, number}자 이상이어야 합니다.',
    'suggestPasswordLength'     => '암호 구문은 최대 255자까지 가능하며, 기억하기 쉬운 보안 암호를 만드세요.',
    'errorPasswordCommon'       => '비밀번호는 일반적인 비밀번호여서는 안 됩니다.',
    'suggestPasswordCommon'     => '비밀번호는 65,000개 이상의 일반적인 비밀번호 또는 해킹으로 유출된 비밀번호를 확인했습니다.',
    'errorPasswordPersonal'     => '비밀번호에 개인 정보가 재해시되지 않아야 합니다.',
    'suggestPasswordPersonal'   => '이메일 주소나 사용자 이름의 변형은 비밀번호로 사용하지 마세요.',
    'errorPasswordTooSimilar'   => '비밀번호가 사용자 이름과 너무 유사합니다.',
    'suggestPasswordTooSimilar' => '비밀번호에 사용자 이름의 일부를 사용하지 마세요.',
    'errorPasswordPwned'        => '비밀번호 {0}이 데이터 유출로 인해 노출되었으며 {1, number}번 발견되었습니다. {2}개의 손상된 비밀번호 중 하나입니다.',
    'suggestPasswordPwned'      => '{0}는 비밀번호로 사용해서는 안 됩니다. 사용 중이라면 즉시 변경하십시오.',
    'errorPasswordEmpty'        => '비밀번호가 필요합니다.',
    'errorPasswordTooLongBytes' => '비밀번호는 {param}바이트를 초과할 수 없습니다.',
    'passwordChangeSuccess'     => '비밀번호가 성공적으로 변경되었습니다.',
    'userDoesNotExist'          => '비밀번호가 변경되지 않았습니다. 사용자가 존재하지 않습니다.',
    'resetTokenExpired'         => '죄송합니다. 리셋 토큰이 만료되었습니다.',

    // Email Globals
    'emailInfo'      => '사람에 대한 정보:',
    'emailIpAddress' => 'IP 주소:',
    'emailDevice'    => '기기:',
    'emailDate'      => '날짜:',

    // 2FA
    'email2FATitle'       => '이중 인증',
    'confirmEmailAddress' => '이메일 주소를 확인하십시오.',
    'emailEnterCode'      => '이메일 확인',
    'emailConfirmCode'    => '방금 이메일로 보낸 6자리 코드를 입력하십시오.',
    'email2FASubject'     => '귀하의 인증 코드',
    'email2FAMailBody'    => '귀하의 인증 코드는 다음과 같습니다:',
    'invalid2FAToken'     => '코드가 올바르지 않습니다.',
    'need2FA'             => '이중 인증을 완료해야 합니다.',
    'needVerification'    => '계정 활성화를 완료하려면 이메일을 확인하십시오.',

    // Activate
    'emailActivateTitle'    => '이메일 활성화',
    'emailActivateBody'     => '이메일 주소를 확인하기 위해 코드가 포함된 이메일을 보냈습니다. 그 코드를 복사하여 아래에 붙여넣으십시오.',
    'emailActivateSubject'  => '귀하의 활성화 코드',
    'emailActivateMailBody' => '계정을 활성화하고 사이트를 사용 시작하려면 아래 코드를 사용하십시오.',
    'invalidActivateToken'  => '코드가 올바르지 않습니다.',
    'needActivate'          => '이메일로 전송된 코드를 확인하여 등록을 완료해야 합니다.',
    'activationBlocked'     => '로그인하기 전에 계정을 활성화해야 합니다.',

    // Groups
    'unknownGroup' => '{0}은(는) 유효한 그룹이 아닙니다.',
    'missingTitle' => '그룹에는 제목이 필요합니다.',

    // Permissions
    'unknownPermission' => '{0}은(는) 유효한 권한이 아닙니다.',
];
