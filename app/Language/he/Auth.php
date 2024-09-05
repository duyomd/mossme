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
    'unknownAuthenticator'  => '{0} אינו מאמת תקף.',
    'unknownUserProvider'   => 'לא ניתן לקבוע את ספק המשתמש לשימוש.',
    'invalidUser'           => 'לא ניתן לאתר את המשתמש שהוגדר.',
    'bannedUser'            => 'לא ניתן להיכנס כי אתה מוחרם כרגע.',
    'logOutBannedUser'      => 'התנתקת כי אתה מוחרם.',
    'badAttempt'            => 'לא ניתן להיכנס. אנא בדוק את אישורי הכניסה שלך.',
    'noPassword'            => 'לא ניתן לאמת משתמש ללא סיסמה.',
    'invalidPassword'       => 'לא ניתן להיכנס. אנא בדוק את הסיסמה שלך.',
    'noToken'               => 'כל בקשה חייבת לכלול טוקן נושא בכותרת {0}.',
    'badToken'              => 'הטוקן אינו תקף.',
    'olToken'               => 'הטוקן פג תוקף.',
    'noUserEntity'          => 'יש לספק ישות משתמש לאימות סיסמה.',
    'invalidEmail'          => 'לא ניתן לאמת שכתובת האימייל תואמת את הכתובת הרשומה.',
    'unableSendEmailToUser' => 'סליחה, הייתה בעיה לשלוח את האימייל. לא הצלחנו לשלוח אימייל ל-"{0}".',
    'throttled'             => 'יותר מדי בקשות נשלחו מכתובת IP זו. תוכל לנסות שוב בעוד {0} שניות.',
    'notEnoughPrivilege'    => 'אין לך את ההרשאות הדרושות לביצוע הפעולה המבוקשת.',
    // JWT Exceptions
    'invalidJWT'     => 'הטוקן אינו תקף.',
    'expiredJWT'     => 'הטוקן פג תוקף.',
    'beforeValidJWT' => 'הטוקן עדיין לא זמין.',

    'email'           => 'כתובת אימייל',
    'username'        => 'שם משתמש',
    'password'        => 'סיסמה',
    'passwordConfirm' => 'סיסמה (שוב)',
    'haveAccount'     => 'כבר יש לך חשבון?',
    'token'           => 'טוקן',

    // Buttons
    'confirm' => 'אשר',
    'send'    => 'שלח',

    // Registration
    'register'         => 'הירשם',
    'registerDisabled' => 'הרשמה איננה מותרת כרגע.',
    'registerSuccess'  => 'ברוך הבא!',

    // Login
    'login'              => 'התחבר',
    'needAccount'        => 'צריך חשבון?',
    'rememberMe'         => 'זכור אותי?',
    'forgotPassword'     => 'שכחת את הסיסמה שלך?',
    'useMagicLink'       => 'השתמש בקישור כניסה',
    'magicLinkSubject'   => 'קישור הכניסה שלך',
    'magicTokenNotFound' => 'לא ניתן לאמת את הקישור.',
    'magicLinkExpired'   => 'סליחה, הקישור פג תוקף.',
    'checkYourEmail'     => 'בדוק את האימייל שלך!',
    'magicLinkDetails'   => 'זה עתה שלחנו לך אימייל עם קישור כניסה בתוכו. הקישור תקף למשך {0} דקות בלבד.',
    'magicLinkDisabled'  => 'שימוש בקישור קסם איננו מותר כרגע.',
    'successLogout'      => 'התנתקת בהצלחה.',
    'backToLogin'        => 'חזור להתחברות',

    // Change password
    'changePassword'            => 'שנה סיסמה',
    'newPassword'               => 'סיסמה חדשה',
    'newPasswordConfirm'        => 'סיסמה חדשה (שוב)',
    'changePasswordBtn'         => 'עדכן',
    'changePasswordTime'        => 'תוכל לשנות לסיסמה חדשה אם תרצה.',
    'changePasswordSuccess'     => 'הסיסמה החדשה שונתה בהצלחה.',

    // Passwords
    'errorPasswordLength'       => 'הסיסמאות חייבות להיות באורך מינימלי של {0, number} תווים.',
    'suggestPasswordLength'     => 'מחרוזות סיסמה - עד 255 תווים - יוצרות סיסמאות מאובטחות שקל לזכור.',
    'errorPasswordCommon'       => 'הסיסמה לא יכולה להיות סיסמה נפוצה.',
    'suggestPasswordCommon'     => 'הסיסמה נבדקה מול יותר מ-65 אלף סיסמאות נפוצות או סיסמאות שנחשפו בהדלפות.',
    'errorPasswordPersonal'     => 'הסיסמאות אינן יכולות להכיל מידע אישי מחדש.',
    'suggestPasswordPersonal'   => 'גרסאות של כתובת האימייל שלך או שם המשתמש שלך לא צריכות לשמש כסיסמאות.',
    'errorPasswordTooSimilar'   => 'הסיסמה דומה מדי לשם המשתמש.',
    'suggestPasswordTooSimilar' => 'אל תשתמש בחלקים משם המשתמש שלך בסיסמה.',
    'errorPasswordPwned'        => 'הסיסמה {0} נחשפה בשל פרצת נתונים וראתה {1, number} פעמים ב-{2} סיסמאות פגועות.',
    'suggestPasswordPwned'      => '{0} לא צריכה לשמש כסיסמה. אם אתה משתמש בה היכן שהוא, החלף אותה מיד.',
    'errorPasswordEmpty'        => 'נדרשת סיסמה.',
    'errorPasswordTooLongBytes' => 'הסיסמה לא יכולה לחרוג מ-{param} בתים באורך.',
    'passwordChangeSuccess'     => 'הסיסמה שונתה בהצלחה',
    'userDoesNotExist'          => 'הסיסמה לא שונתה. המשתמש לא קיים',
    'resetTokenExpired'         => 'סליחה. הטוקן לשחזור שלך פג תוקף.',

    // Email Globals
    'emailInfo'      => 'מידע כללי על האדם:',
    'emailIpAddress' => 'כתובת IP:',
    'emailDevice'    => 'מכשיר:',
    'emailDate'      => 'תאריך:',

    // 2FA
    'email2FATitle'       => 'אימות דו-שלבי',
    'confirmEmailAddress' => 'אשר את כתובת האימייל שלך.',
    'emailEnterCode'      => 'אשר את האימייל שלך',
    'emailConfirmCode'    => 'הכנס את הקוד בן 6 הספרות ששלחנו לכתובת האימייל שלך.',
    'email2FASubject'     => 'הקוד שלך לאימות',
    'email2FAMailBody'    => 'הקוד שלך לאימות הוא:',
    'invalid2FAToken'     => 'הקוד היה שגוי.',
    'need2FA'             => 'עליך להשלים אימות דו-שלבי.',
    'needVerification'    => 'בדוק את האימייל שלך להשלמת הפעלת החשבון.',

    // Activate
    'emailActivateTitle'    => 'הפעלה באמצעות אימייל',
    'emailActivateBody'     => 'זה עתה שלחנו לך אימייל עם קוד לאישור כתובת האימייל שלך. העתק את הקוד והדבק אותו למטה.',
    'emailActivateSubject'  => 'הקוד שלך להפעלה',
    'emailActivateMailBody' => 'אנא השתמש בקוד למטה כדי להפעיל את החשבון שלך ולהתחיל להשתמש באתר.',
    'invalidActivateToken'  => 'הקוד היה שגוי.',
    'needActivate'          => 'עליך להשלים את ההרשמה על ידי אישור הקוד שנשלח לכתובת האימייל שלך.',
    'activationBlocked'     => 'עליך להפעיל את החשבון שלך לפני שתוכל להתחבר.',

    // Groups
    'unknownGroup' => '{0} אינו קבוצה תקפה.',
    'missingTitle' => 'קבוצות חייבות להיות בעלות כותרת.',

    // Permissions
    'unknownPermission' => '{0} אינה הרשאה תקפה.',
];
