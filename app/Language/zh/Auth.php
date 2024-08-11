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
    'unknownAuthenticator'  => '{0} 不是有效的驗證器。',
    'unknownUserProvider'   => '無法確定要使用的用戶提供者。',
    'invalidUser'           => '無法找到指定的用戶。',
    'bannedUser'            => '您目前已被禁止登入。',
    'logOutBannedUser'      => '您已被登出，因為您已被禁止。',
    'badAttempt'            => '無法登入。請檢查您的憑證。',
    'noPassword'            => '無法驗證用戶，因為沒有密碼。',
    'invalidPassword'       => '無法登入。請檢查您的密碼。',
    'noToken'               => '每個請求必須在 {0} 標頭中包含承載令牌。',
    'badToken'              => '訪問令牌無效。',
    'oldToken'              => '訪問令牌已過期。',
    'noUserEntity'          => '必須提供用戶實體以進行密碼驗證。',
    'invalidEmail'          => '無法驗證電子郵件地址是否與記錄上的電子郵件匹配。',
    'unableSendEmailToUser' => '抱歉，發送電子郵件時出現問題。我們無法發送電子郵件到 "{0}"。',
    'throttled'             => '來自此 IP 地址的請求太多。您可以在 {0} 秒後重試。',
    'notEnoughPrivilege'    => '您沒有執行所需操作的必要權限。',    
    // JWT Exceptions
    'invalidJWT'     => '令牌無效。',
    'expiredJWT'     => '令牌已過期。',
    'beforeValidJWT' => '令牌尚不可用。',

    'account'         => '帳戶',
    'email'           => '電子郵件地址',
    'username'        => '用戶名',
    'password'        => '密碼',
    'passwordConfirm' => '再次輸入密碼',
    'haveAccount'     => '已經有帳戶了？',
    'token'           => '令牌',

    // Buttons
    'confirm' => '確認',
    'send'    => '發送',

    // Registration
    'register'         => '登記',
    'registerDisabled' => '目前不允許登記。',
    'registerSuccess'  => '歡迎加入！',

    // Login
    'login'              => '登入',
    'needAccount'        => '需要帳戶？',
    'rememberMe'         => '記住我？',
    'forgotPassword'     => '忘記密碼？',
    'useMagicLink'       => '使用登入鏈接',
    'useMagicLinkShort'  => '登入鏈接',
    'magicLinkSubject'   => '您的登入鏈接',
    'magicTokenNotFound' => '無法驗證鏈接。',
    'magicLinkExpired'   => '抱歉，鏈接已過期。',
    'checkYourEmail'     => '檢查您的電子郵件！',
    'magicLinkDetails'   => '我們剛剛向您發送了一封電子郵件，其中包含登入鏈接。該鏈接僅在 {0} 分鐘內有效。',
    'magicLinkDisabled'  => '目前不允許使用 MagicLink。',
    'successLogout'      => '您已成功登出。',
    'backToLogin'        => '返回登入',

    // Change password
    'changePassword'            => '更改密碼',
    'currentPassword'           => '當前密碼',
    'newPassword'               => '新密碼',
    'newPasswordConfirm'        => '再次輸入新密碼',
    'changePasswordBtn'         => '更新',
    'changePasswordTime'        => '您有幾分鐘時間來設置您的新密碼。',
    'changePasswordSuccess'     => '新密碼已成功更改。',

    // Passwords
    'errorPasswordLength'       => '密碼必須至少 {0, number} 個字符長。',
    'suggestPasswordLength'     => '使用長達 255 個字符的密碼短語，使密碼更安全且易於記住。',
    'errorPasswordCommon'       => '密碼不能是常見密碼。',
    'suggestPasswordCommon'     => '密碼已檢查過 65k 個常用密碼或已被洩露的密碼。',
    'errorPasswordPersonal'     => '密碼不能包含重新哈希的個人信息。',
    'suggestPasswordPersonal'   => '不應使用您的電子郵件地址或用戶名的變體作為密碼。',
    'errorPasswordTooSimilar'   => '密碼與用戶名過於相似。',
    'suggestPasswordTooSimilar' => '不要在密碼中使用用戶名的部分。',
    'errorPasswordPwned'        => '密碼 {0} 已因數據泄露而暴露，並且在 {2} 次被破解的密碼中出現了 {1, number} 次。',
    'suggestPasswordPwned'      => '{0} 不應作為密碼使用。如果您在其他地方使用它，請立即更改。',
    'errorPasswordEmpty'        => '需要提供密碼。',
    'errorPasswordTooLongBytes' => '密碼不能超過 {param} 字節長。',
    'passwordChangeSuccess'     => '密碼更改成功',
    'userDoesNotExist'          => '密碼未更改。用戶不存在',
    'resetTokenExpired'         => '抱歉。您的重置令牌已過期。',

    // Email Globals
    'emailInfo'      => '有關此人的一些信息：',
    'emailIpAddress' => 'IP 地址：',
    'emailDevice'    => '設備：',
    'emailDate'      => '日期：',

    // 2FA
    'email2FATitle'       => '雙因素驗證',
    'confirmEmailAddress' => '確認您的電子郵件地址。',
    'emailEnterCode'      => '確認您的電子郵件',
    'emailConfirmCode'    => '輸入我們剛剛發送到您的電子郵件地址的 6 位數代碼。',
    'email2FASubject'     => '您的驗證碼',
    'email2FAMailBody'    => '您的驗證碼是：',
    'invalid2FAToken'     => '代碼不正確。',
    'need2FA'             => '您必須完成雙因素驗證。',
    'needVerification'    => '檢查您的電子郵件以完成帳戶激活。',

    // Activate
    'emailActivateTitle'    => '電子郵件激活',
    'emailActivateBody'     => '我們剛剛向您發送了一封電子郵件，其中包含確認您的電子郵件地址的代碼。複製該代碼並將其粘貼在下面。',
    'emailActivateSubject'  => '您的激活代碼',
    'emailActivateMailBody' => '請使用以下代碼來激活您的帳戶並開始使用網站。',
    'invalidActivateToken'  => '代碼不正確。',
    'needActivate'          => '您必須通過確認發送到您的電子郵件地址的代碼來完成註冊。',
    'activationBlocked'     => '您必須在登入之前激活您的帳戶。',
    'cancelEmail'           => '如果您無法訪問您的電子郵件地址，您可以在取消此過程後使用其他電子郵件再次註冊：',

    // Groups
    'unknownGroup' => '{0} 不是有效的群組。',
    'missingTitle' => '群組必須有標題。',

    // Permissions
    'unknownPermission' => '{0} 不是有效的權限。',
];
