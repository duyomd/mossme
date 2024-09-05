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
    'unknownAuthenticator'  => '{0} 不是有效的验证器。',
    'unknownUserProvider'   => '无法确定要使用的用户提供者。',
    'invalidUser'           => '无法找到指定的用户。',
    'bannedUser'            => '您目前已被禁止登录。',
    'logOutBannedUser'      => '您已被登出，因为您已被禁止。',
    'badAttempt'            => '无法登录。请检查您的凭证。',
    'noPassword'            => '无法验证用户，因为没有密码。',
    'invalidPassword'       => '无法登录。请检查您的密码。',
    'noToken'               => '每个请求必须在 {0} 头部中包含承载令牌。',
    'badToken'              => '访问令牌无效。',
    'olToken'               => '访问令牌已过期。',
    'noUserEntity'          => '必须提供用户实体以进行密码验证。',
    'invalidEmail'          => '无法验证电子邮件地址是否与记录上的电子邮件匹配。',
    'unableSendEmailToUser' => '抱歉，发送电子邮件时出现问题。我们无法发送电子邮件到 "{0}"。',
    'throttled'             => '来自此 IP 地址的请求太多。您可以在 {0} 秒后重试。',
    'notEnoughPrivilege'    => '您没有执行所需操作的必要权限。',

    // JWT Exceptions
    'invalidJWT'     => '令牌无效。',
    'expiredJWT'     => '令牌已过期。',
    'beforeValidJWT' => '令牌尚不可用。',

    'account'         => '账户',
    'email'           => '电子邮件地址',
    'username'        => '用户名',
    'password'        => '密码',
    'passwordConfirm' => '再次输入密码',
    'haveAccount'     => '已经有账户了？',
    'token'           => '令牌',

    // Buttons
    'confirm' => '确认',
    'send'    => '发送',

    // Registration
    'register'         => '登记',
    'registerDisabled' => '目前不允许登记。',
    'registerSuccess'  => '欢迎加入！',

    // Login
    'login'              => '登录',
    'needAccount'        => '需要账户？',
    'rememberMe'         => '记住我？',
    'forgotPassword'     => '忘记密码？',
    'useMagicLink'       => '使用登录链接',
    'magicLinkSubject'   => '您的登录链接',
    'magicTokenNotFound' => '无法验证链接。',
    'magicLinkExpired'   => '抱歉，链接已过期。',
    'checkYourEmail'     => '检查您的电子邮件！',
    'magicLinkDetails'   => '我们刚刚向您发送了一封电子邮件，其中包含登录链接。该链接仅在 {0} 分钟内有效。',
    'magicLinkDisabled'  => '目前不允许使用 MagicLink。',
    'successLogout'      => '您已成功登出。',
    'backToLogin'        => '返回登录',

    // Change password
    'changePassword'            => '更改密码',
    'newPassword'               => '新密码',
    'newPasswordConfirm'        => '再次输入新密码',
    'changePasswordBtn'         => '更新',
    'changePasswordTime'        => '您有几分钟时间来设置您的新密码。',
    'changePasswordSuccess'     => '新密码已成功更改。',

    // Passwords
    'errorPasswordLength'       => '密码必须至少 {0, number} 个字符长。',
    'suggestPasswordLength'     => '使用长达 255 个字符的密码短语，使密码更安全且易于记住。',
    'errorPasswordCommon'       => '密码不能是常见密码。',
    'suggestPasswordCommon'     => '密码已检查过 65k 个常用密码或已被泄露的密码。',
    'errorPasswordPersonal'     => '密码不能包含与个人信息相关的信息。',
    'suggestPasswordPersonal'   => '不应使用您的电子邮件地址或用户名的变体作为密码。',
    'errorPasswordTooSimilar'   => '密码与用户名过于相似。',
    'suggestPasswordTooSimilar' => '不要在密码中使用用户名的部分。',
    'errorPasswordPwned'        => '密码 {0} 已因数据泄露而暴露，并且在 {2} 次被破解的密码中出现了 {1, number} 次。',
    'suggestPasswordPwned'      => '{0} 不应作为密码使用。如果您在其他地方使用它，请立即更改。',
    'errorPasswordEmpty'        => '需要提供密码。',
    'errorPasswordTooLongBytes' => '密码不能超过 {param} 字节长。',
    'passwordChangeSuccess'     => '密码更改成功',
    'userDoesNotExist'          => '密码未更改。用户不存在',
    'resetTokenExpired'         => '抱歉。您的重置令牌已过期。',

    // Email Globals
    'emailInfo'      => '有关此人的一些信息：',
    'emailIpAddress' => 'IP 地址：',
    'emailDevice'    => '设备：',
    'emailDate'      => '日期：',

    // 2FA
    'email2FATitle'       => '双因素验证',
    'confirmEmailAddress' => '确认您的电子邮件地址。',
    'emailEnterCode'      => '确认您的电子邮件',
    'emailConfirmCode'    => '输入我们刚刚发送到您的电子邮件地址的 6 位数代码。',
    'email2FASubject'     => '您的验证码',
    'email2FAMailBody'    => '您的验证码是：',
    'invalid2FAToken'     => '代码不正确。',
    'need2FA'             => '您必须完成双因素验证。',
    'needVerification'    => '检查您的电子邮件以完成账户激活。',

    // Activate
    'emailActivateTitle'    => '电子邮件激活',
    'emailActivateBody'     => '我们刚刚向您发送了一封电子邮件，其中包含确认您的电子邮件地址的代码。复制该代码并将其粘贴在下面。',
    'emailActivateSubject'  => '您的激活代码',
    'emailActivateMailBody' => '请使用以下代码来激活您的账户并开始使用网站。',
    'invalidActivateToken'  => '代码不正确。',
    'needActivate'          => '您必须通过确认发送到您的电子邮件地址的代码来完成注册。',
    'activationBlocked'     => '您必须在登录之前激活您的账户。',
    'cancelEmail'           => '如果您无法访问您的电子邮件地址，您可以在取消此过程后使用其他电子邮件再次注册：',

    // Groups
    'unknownGroup' => '{0} 不是有效的群组。',
    'missingTitle' => '群组必须有标题。',

    // Permissions
    'unknownPermission' => '{0} 不是有效的权限。',
];
