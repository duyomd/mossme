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
    'unknownAuthenticator'  => '{0} không phải là một authenticator.',
    'unknownUserProvider'   => 'Không thể xác định được User Provider.',
    'invalidUser'           => 'Không thể xác định được người dùng.',
    'bannedUser'            => 'Hiện tại tài khoản bạn đang bị cấm, không thể đăng nhập.',
    'logOutBannedUser'      => 'Bạn đã bị đăng xuất vì lý do tài khoản bị cấm.',
    'badAttempt'            => 'Đăng nhập thất bại. Xin kiểm tra lại thông tin.',
    'noPassword'            => 'Không thể xác thực người dùng không có mật khẩu.',
    'invalidPassword'       => 'Đăng nhập thất bại. Xin kiểm tra lại mật khẩu.',
    'noToken'               => 'Mỗi request phải mang một token ở {0} header.',
    'badToken'              => 'Token không đúng.',
    'oldToken'              => 'Token đã hết hạn.',
    'noUserEntity'          => 'User Entity phải được cung cấp để xác thực mật khẩu.',
    'invalidEmail'          => 'Không thể xác thực địa chỉ email.',
    'unableSendEmailToUser' => 'Xin lỗi, có lỗi khi gửi thư. Không thể gửi email đến "{0}".',
    'throttled'             => 'Có quá nhiều yêu cầu được gửi từ địa chỉ IP này. Bạn có thể thử lại sau {0} giây',
    'notEnoughPrivilege'    => 'Bạn không có thẩm quyền để thực hiện tác vụ này.',
    // JWT Exceptions
    'invalidJWT'     => 'Token không đúng.',
    'expiredJWT'     => 'Token đã hết hạn.',
    'beforeValidJWT' => 'Token chưa có.',

    'account'         => 'Người dùng',
    'email'           => 'Email',
    'username'        => 'Username',
    'password'        => 'Mật khẩu',
    'passwordConfirm' => 'Mật khẩu (nhập lại)',
    'haveAccount'     => 'Đã đăng ký?',
    'token'           => 'Token',

    // Buttons
    'confirm' => 'Xác nhận',
    'send'    => 'Gửi',

    // Registration
    'register'         => 'Đăng ký',
    'registerDisabled' => 'Tạm thời không được phép đăng ký.',
    'registerSuccess'  => 'Đăng ký thành công!',

    // Login
    'login'              => 'Đăng nhập',
    'needAccount'        => 'Người dùng mới?',
    'rememberMe'         => 'Duy trì đăng nhập?',
    'forgotPassword'     => 'Quên mật khẩu?',
    'useMagicLink'       => 'Dùng liên kết đăng nhập',
    'magicLinkSubject'   => 'Liên kết đăng nhập của bạn',
    'magicTokenNotFound' => 'Không thể xác thực liên kết.',
    'magicLinkExpired'   => 'Xin lỗi, liên kết đã hết hạn.',
    'checkYourEmail'     => 'Xin kiểm tra email!',
    'magicLinkDetails'   => 'Bạn vừa nhận được một email có chứa liên kết đăng nhập. Liên kết chỉ khả dụng trong {0} phút.',
    'magicLinkDisabled'  => 'Liên kết đăng nhập tạm thời không được cấp phép.',
    'successLogout'      => 'Đăng xuất thành công.',
    'backToLogin'        => 'Trở lại màn hình đăng nhập',

    // Change password
    'changePassword'            => 'Đổi Mật Khẩu',
    'newPassword'               => 'Mật khẩu mới',
    'newPasswordConfirm'        => 'Mật khẩu mới (nhập lại)',
    'changePasswordBtn'         => 'Cập Nhật',
    'changePasswordTime'        => 'Bạn có vài phút để thiết lập mật khẩu mới.',
    'changePasswordSuccess'     => 'Đổi mật khẩu mới thành công.',

    // Passwords
    'errorPasswordLength'       => 'Mật khẩu phải dài ít nhất {0, number} ký tự.',
    'suggestPasswordLength'     => 'Nên tạo mật khẩu dễ nhớ nhưng khó đoán biết để bảo mật hơn.',
    'errorPasswordCommon'       => 'Mật khẩu không nên là những từ thông dụng.',
    'suggestPasswordCommon'     => 'Mật khẩu được kiểm tra từ 65k từ thông dụng hoặc những mật khẩu đã bị lộ do hacker.',
    'errorPasswordPersonal'     => 'Mật khẩu không nên chứa thông tin cá nhân.',
    'suggestPasswordPersonal'   => 'Mật khẩu không nên có phần tương tự với email hoặc username.',
    'errorPasswordTooSimilar'   => 'Mật khẩu không được giống với username.',
    'suggestPasswordTooSimilar' => 'Không nên sử dụng một phần username cho mật khẩu.',
    'errorPasswordPwned'        => 'Mật khẩu {0} đã bị lộ do đánh cắp thông tin và đã bị thấy {1, number} lần tại {2} mật khẩu bị xâm nhập.',
    'suggestPasswordPwned'      => 'Không được sử dụng {0} làm mật khẩu. Nếu bạn đã dùng nó ở những nơi nào khác thì nên thay đổi ngay lập tức.',
    'errorPasswordEmpty'        => 'Xin nhập mật khẩu.',
    'errorPasswordTooLongBytes' => 'Chiều dài mật khẩu không được vượt quá {param} byte.',
    'passwordChangeSuccess'     => 'Thay đổi mật khẩu thành công.',
    'userDoesNotExist'          => 'Không thể thay đổi mật khẩu. Người dùng không tồn tại.',
    'resetTokenExpired'         => 'Xin lỗi, token đã hết hạn.',

    // Email Globals
    'emailInfo'      => 'Một vài thông tin:',
    'emailIpAddress' => 'Địa chỉ IP:',
    'emailDevice'    => 'Thiết bị:',
    'emailDate'      => 'Ngày:',

    // 2FA
    'email2FATitle'       => 'Xác thực hai yếu tố',
    'confirmEmailAddress' => 'Xác nhận địa chỉ email của bạn.',
    'emailEnterCode'      => 'Xác nhận email của bạn',
    'emailConfirmCode'    => 'Nhập mã có 6 ký số chúng tôi vừa gửi đến mail của bạn.',
    'email2FASubject'     => 'Mã xác thực của bạn',
    'email2FAMailBody'    => 'Mã xác thực của bạn là:',
    'invalid2FAToken'     => 'Mã không chính xác.',
    'need2FA'             => 'Bạn phải hoàn tất xác thực hai yếu tố.',
    'needVerification'    => 'Kiểm tra email để hoàn tất kích hoạt tài khoản.',

    // Activate
    'emailActivateTitle'    => 'Xác thự Email',
    'emailActivateBody'     => 'Một email với mã xác thực đã được gửi đến địa chỉ email của bạn. Hãy nhập mã xác thực ấy vào ô bên dưới đây.',
    'emailActivateSubject'  => 'Mã xác thực',
    'emailActivateMailBody' => 'Vui lòng dùng mã xác thự này để kích hoạt tài khoản của bạn.',
    'invalidActivateToken'  => 'Mã xác thực không đúng.',
    'needActivate'          => 'Bạn phải hoàn thành đăng ký tài khoản bằng việc nhập mã xác thực đã được gửi đến email của bạn.',
    'activationBlocked'     => 'Bạn phải kích hoạt tài khoản trước khi có thể đăng nhập.',

    // Groups
    'unknownGroup' => '{0} không phải là một nhóm.',
    'missingTitle' => 'Nhóm phải có tên.',

    // Permissions
    'unknownPermission' => '{0} không phải là một quyền.',
];
