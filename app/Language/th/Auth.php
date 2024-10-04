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
    'unknownAuthenticator'  => '{0} ไม่ใช่การตรวจสอบที่ถูกต้อง.',
    'unknownUserProvider'   => 'ไม่สามารถกำหนดผู้ให้บริการผู้ใช้ที่ใช้ได้.',
    'invalidUser'           => 'ไม่สามารถค้นหาผู้ใช้ที่ระบุได้.',
    'bannedUser'            => 'ไม่สามารถเข้าสู่ระบบได้เนื่องจากคุณถูกแบน.',
    'logOutBannedUser'      => 'คุณถูกออกจากระบบเนื่องจากคุณถูกแบน.',
    'badAttempt'            => 'ไม่สามารถเข้าสู่ระบบได้ โปรดตรวจสอบข้อมูลรับรองของคุณ.',
    'noPassword'            => 'ไม่สามารถตรวจสอบผู้ใช้ได้โดยไม่มีรหัสผ่าน.',
    'invalidPassword'       => 'ไม่สามารถเข้าสู่ระบบได้ โปรดตรวจสอบรหัสผ่านของคุณ.',
    'noToken'               => 'ทุกคำขอจะต้องมีโทเค็นเบียร์ในส่วนหัว {0}.',
    'badToken'              => 'โทเค็นการเข้าถึงไม่ถูกต้อง.',
    'oldToken'              => 'โทเค็นการเข้าถึงหมดอายุแล้ว.',
    'noUserEntity'          => 'ต้องมีผู้ใช้เพื่อการตรวจสอบรหัสผ่าน.',
    'invalidEmail'          => 'ไม่สามารถตรวจสอบที่อยู่อีเมลได้ว่าตรงกับที่บันทึกไว้.',
    'unableSendEmailToUser' => 'ขออภัย เกิดปัญหาในการส่งอีเมล ไม่สามารถส่งอีเมลไปยัง "{0}".',
    'throttled'             => 'มีการส่งคำขอจากที่อยู่ IP นี้มากเกินไป คุณอาจลองอีกครั้งใน {0} วินาที.',
    'notEnoughPrivilege'    => 'คุณไม่มีสิทธิ์ที่จำเป็นในการดำเนินการที่ต้องการ.',
    // JWT Exceptions
    'invalidJWT'     => 'โทเค็นไม่ถูกต้อง.',
    'expiredJWT'     => 'โทเค็นหมดอายุแล้ว.',
    'beforeValidJWT' => 'โทเค็นยังไม่สามารถใช้งานได้.',
    
    'email'           => 'ที่อยู่อีเมล',
    'username'        => 'ชื่อผู้ใช้',
    'password'        => 'รหัสผ่าน',
    'passwordConfirm' => 'รหัสผ่าน (อีกครั้ง)',
    'haveAccount'     => 'มีบัญชีอยู่แล้ว?',
    'token'           => 'โทเค็น',
    
    // Buttons
    'confirm' => 'ยืนยัน',
    'send'    => 'ส่ง',
    
    // Registration
    'register'         => 'ลงทะเบียน',
    'registerDisabled' => 'การลงทะเบียนไม่สามารถทำได้ในขณะนี้.',
    'registerSuccess'  => 'ยินดีต้อนรับสู่ระบบ!',
    
    // Login
    'login'              => 'เข้าสู่ระบบ',
    'needAccount'        => 'ต้องการบัญชี?',
    'rememberMe'         => 'จำฉันไว้?',
    'forgotPassword'     => 'ลืมรหัสผ่านของคุณ?',
    'useMagicLink'       => 'ใช้ลิงก์เข้าสู่ระบบ',
    'magicLinkSubject'   => 'ลิงก์เข้าสู่ระบบของคุณ',
    'magicTokenNotFound' => 'ไม่สามารถตรวจสอบลิงก์ได้.',
    'magicLinkExpired'   => 'ขออภัย ลิงก์หมดอายุแล้ว.',
    'checkYourEmail'     => 'ตรวจสอบอีเมลของคุณ!',
    'magicLinkDetails'   => 'เราเพิ่งส่งอีเมลให้คุณพร้อมลิงก์เข้าสู่ระบบ หากคุณไม่สามารถหาได้ โปรดตรวจสอบโฟลเดอร์สแปม/จดหมายขยะของคุณ ลิงก์นี้มีอายุเพียง {0} นาทีเท่านั้น.',
    'magicLinkDisabled'  => 'การใช้ MagicLink ไม่สามารถใช้งานได้ในขณะนี้.',
    'successLogout'      => 'คุณออกจากระบบสำเร็จ.',
    'backToLogin'        => 'กลับไปที่หน้าเข้าสู่ระบบ',

    // Change password
    'changePassword'            => 'เปลี่ยนรหัสผ่าน',
    'newPassword'               => 'รหัสผ่านใหม่',
    'newPasswordConfirm'        => 'รหัสผ่านใหม่ (อีกครั้ง)',
    'changePasswordBtn'         => 'อัปเดต',
    'changePasswordTime'        => 'คุณสามารถเปลี่ยนเป็นรหัสผ่านใหม่ได้หากต้องการ',
    'changePasswordSuccess'     => 'รหัสผ่านใหม่ถูกเปลี่ยนสำเร็จ',
    
    // Passwords
    'errorPasswordLength'       => 'รหัสผ่านต้องยาวอย่างน้อย {0, number} ตัวอักษร.',
    'suggestPasswordLength'     => 'การใช้ประโยคผ่าน - ยาวสูงสุด 255 ตัวอักษร - ทำให้รหัสผ่านปลอดภัยยิ่งขึ้นและจำได้ง่าย.',
    'errorPasswordCommon'       => 'รหัสผ่านต้องไม่เป็นรหัสผ่านที่ใช้ทั่วไป.',
    'suggestPasswordCommon'     => 'รหัสผ่านได้รับการตรวจสอบกับรหัสผ่านที่ใช้กันทั่วไปกว่า 65,000 รายการหรือรหัสผ่านที่ถูกเปิดเผยผ่านการแฮ็ก.',
    'errorPasswordPersonal'     => 'รหัสผ่านไม่สามารถมีข้อมูลส่วนบุคคลที่แฮชซ้ำ.',
    'suggestPasswordPersonal'   => 'ไม่ควรใช้การเปลี่ยนแปลงของที่อยู่อีเมลหรือชื่อผู้ใช้ของคุณเป็นรหัสผ่าน.',
    'errorPasswordTooSimilar'   => 'รหัสผ่านคล้ายกับชื่อผู้ใช้มากเกินไป.',
    'suggestPasswordTooSimilar' => 'อย่าใช้ส่วนของชื่อผู้ใช้ในรหัสผ่านของคุณ.',
    'errorPasswordPwned'        => 'รหัสผ่าน {0} ถูกเปิดเผยเนื่องจากการละเมิดข้อมูลและเคยพบ {1, number} ครั้งใน {2} ของรหัสผ่านที่ถูกเปิดเผย.',
    'suggestPasswordPwned'      => '{0} ไม่ควรใช้เป็นรหัสผ่าน หากคุณใช้ที่ไหนก็ตาม ให้เปลี่ยนทันที.',
    'errorPasswordEmpty'        => 'ต้องมีรหัสผ่าน.',
    'errorPasswordTooLongBytes' => 'รหัสผ่านไม่สามารถยาวเกิน {param} ไบต์.',
    'passwordChangeSuccess'     => 'รหัสผ่านเปลี่ยนแปลงสำเร็จ',
    'userDoesNotExist'          => 'รหัสผ่านไม่ถูกเปลี่ยนแปลง ผู้ใช้ไม่พบ',
    'resetTokenExpired'         => 'ขออภัย โทเค็นการรีเซ็ตของคุณหมดอายุแล้ว.',
    
    // Email Globals
    'emailInfo'      => 'ข้อมูลบางอย่างเกี่ยวกับบุคคล:',
    'emailIpAddress' => 'ที่อยู่ IP:',
    'emailDevice'    => 'อุปกรณ์:',
    'emailDate'      => 'วันที่:',
    
    // 2FA
    'email2FATitle'       => 'การตรวจสอบสองปัจจัย',
    'confirmEmailAddress' => 'ยืนยันที่อยู่อีเมลของคุณ.',
    'emailEnterCode'      => 'ยืนยันอีเมลของคุณ',
    'emailConfirmCode'    => 'กรอกรหัส 6 หลักที่เราพึ่งส่งไปยังที่อยู่อีเมลของคุณ.',
    'email2FASubject'     => 'รหัสการตรวจสอบของคุณ',
    'email2FAMailBody'    => 'รหัสการตรวจสอบของคุณคือ:',
    'invalid2FAToken'     => 'รหัสไม่ถูกต้อง.',
    'need2FA'             => 'คุณต้องทำการตรวจสอบสองปัจจัยให้เสร็จสมบูรณ์.',
    'needVerification'    => 'ตรวจสอบอีเมลของคุณเพื่อทำการเปิดใช้งานบัญชี.',
    
    // Activate
    'emailActivateTitle'    => 'การเปิดใช้งานอีเมล',
    'emailActivateBody'     => 'เราเพิ่งส่งอีเมลพร้อมรหัสให้คุณเพื่อยืนยันที่อยู่อีเมลของคุณ คัดลอกรหัสนั้นและวางไว้ด้านล่าง.',
    'emailActivateSubject'  => 'รหัสเปิดใช้งานของคุณ',
    'emailActivateMailBody' => 'โปรดใช้รหัสด้านล่างเพื่อเปิดใช้งานบัญชีของคุณและเริ่มใช้เว็บไซต์.',
    'invalidActivateToken'  => 'รหัสไม่ถูกต้อง.',
    'needActivate'          => 'คุณต้องทำการลงทะเบียนให้เสร็จสมบูรณ์โดยการยืนยันรหัสที่ส่งไปยังที่อยู่อีเมลของคุณ.',
    'activationBlocked'     => 'คุณต้องเปิดใช้งานบัญชีของคุณก่อนเข้าสู่ระบบ.',
    
    // Groups
    'unknownGroup' => '{0} ไม่ใช่กลุ่มที่ถูกต้อง.',
    'missingTitle' => 'กลุ่มต้องมีชื่อเรื่อง.',
    
    // Permissions
    'unknownPermission' => '{0} ไม่ใช่สิทธิ์ที่ถูกต้อง.',
];
