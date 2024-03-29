<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Strings Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in strings throughout the system.
    | Regardless where it is placed, a string can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend'   => [
        'access'    => [
            'users' => [
                'delete_user_confirm'   => 'האם את/ה בטוח/ה שברצונך למחוק את המשתמש לצמיתות? כל מקום באפליקציה שקשור למשתמש זה כנראה יסבול מתקלות. ראו הוזהרתם, מחיקה לצמיתות היא בלתי הפיכה.',
                'if_confirmed_off'      => '(אם האימות כבוי)',
                'no_deactivated'        => 'אין משתמשים מכובים.',
                'no_deleted'            => 'אין משתמשים מחוקים.',
                'restore_user_confirm'  => 'לשחזר את המשתמש למצבו המקורי?',
            ],
        ],
        'dashboard' => [
            'title'     => 'לוח בקרה',
            'welcome'   => 'ברוכים הבאים',
        ],
        'general'   => [
            'all_rights_reserved'   => 'כל הזכויות שמורות.',
            'are_you_sure'          => 'האם את/ה בטוח/ה שאת/ה רוצה לעשות את זה?',
            'boilerplate_link'      => 'Laravel 5 Boilerplate',
            'continue'              => 'המשך',
            'member_since'          => 'חבר מאז',
            'minutes'               => 'דקות',
            'search_placeholder'    => 'חיפוש...',
            'see_all'               => [
                'messages'      => 'הצג את כל ההודעות',
                'notifications' => 'הצג הכל',
                'tasks'         => 'הצג את כל המשימות',
            ],
            'status'                => [
                'offline'   => 'מנותק/ת',
                'online'    => 'מחובר/ת',
            ],
            'timeout'               => 'המשתמש שלך נותק אוטומטית מטעמי אבטחה, כי הוא לא פעיל כבר',
            'you_have'              => [
                'messages'      => '{0} אין לך הודעות|{1} יש לך הודעה אחת|[2,Inf] יש לך :number הודעות',
                'notifications' => '{0} אין לך התראות|{1} יש לך התראה אחת|[2,Inf] יש לך :number התראות',
                'tasks'         => '{0} אין לך משימות|{1} יש לך משימה אחת|[2,Inf] יש לך :number משימות',
            ],
        ],
        'search'    => [
            'empty'         => 'יש להקליד מילת חיפוש.',
            'incomplete'    => 'אתה צריך לכתוב לוגיקת חיפוש משלך למערכת הזו.',
            'results'       => 'תוצאות חיפוש עבור :query',
            'title'         => 'תוצאות חיפוש',
        ],
        'welcome'   => <<<'TEXT'
<p>This is the CoreUI theme by <a href="https://coreui.io/" target="_blank">creativeLabs</a>. This is a stripped down version with only the necessary styles and scripts to get it running. Download the full version to start adding components to your dashboard.</p>
<p>All the functionality is for show with the exception of the <strong>Access Management</strong> to the left. This boilerplate comes with a fully functional access control library to manage users/roles/permissions.</p>
<p>Keep in mind it is a work in progress and their may be bugs or other issues I have not come across. I will do my best to fix them as I receive them.</p>
<p>Hope you enjoy all of the work I have put into this. Please visit the <a href="https://github.com/rappasoft/laravel-5-boilerplate" target="_blank">GitHub</a> page for more information and report any <a href="https://github.com/rappasoft/Laravel-5-Boilerplate/issues" target="_blank">issues here</a>.</p>
<p><strong>This project is very demanding to keep up with given the rate at which the master Laravel branch changes, so any help is appreciated.</strong></p>
<p>- Anthony Rappa</p>
TEXT
,
    ],
    'emails'    => [
        'auth'      => [
            'account_confirmed'         => 'החשבון שלך אומת.',
            'click_to_confirm'          => 'לחץ/י כאן לאימות החשבון:',
            'error'                     => 'אופס!',
            'greeting'                  => 'אהלן!',
            'password_cause_of_email'   => 'המייל הזה הגיע אליך כי מישהו ביקש לאפס את הסיסמה של החשבון שלך.',
            'password_if_not_requested' => 'אם לא ביקשת איפוס סיסמה, אין צורך בפעולה נוספת.',
            'password_reset_subject'    => 'איפוס סיסמה',
            'regards'                   => 'בברכה,',
            'reset_password'            => 'לחצו כאן לאיפוס הסיסמה',
            'thank_you_for_using_app'   => 'תודה על השימוש באפליקציה שלנו!',
            'trouble_clicking_button'   => 'אם יש סיבוך בלחיצה על הכפתור ":action_text", אפשר להדביק את הקישור הבא בשורת הכתובת בדפדפן:',
        ],
        'contact'   => [
            'email_body_title'  => 'מישהו השאיר פנייה בטופס צור קשר. הנה הפרטים:',
            'subject'           => 'פנייה חדשה מטופס צור קשר - :app_name',
        ],
    ],
    'frontend'  => [
        'general'       => [
            'joined'    => 'צורף',
        ],
        'test'          => 'בדיקה',
        'tests'         => [
            'based_on'                          => [
                'permission'    => 'מבוסס הרשאה -',
                'role'          => 'מבוסס תפקיד -',
            ],
            'js_injected_from_controller'       => 'ג\'אווה סקריפט הוזרק מהקונטרולר',
            'using_access_helper'               => [
                'array_permissions'     => 'Using Access Helper with Array of Permission Names or ID\'s where the user does have to possess all.',
                'array_permissions_not' => 'Using Access Helper with Array of Permission Names or ID\'s where the user does not have to possess all.',
                'array_roles'           => 'Using Access Helper with Array of Role Names or ID\'s where the user does have to possess all.',
                'array_roles_not'       => 'Using Access Helper with Array of Role Names or ID\'s where the user does not have to possess all.',
                'permission_id'         => 'Using Access Helper with Permission ID',
                'permission_name'       => 'Using Access Helper with Permission Name',
                'role_id'               => 'Using Access Helper with Role ID',
                'role_name'             => 'Using Access Helper with Role Name',
            ],
            'using_blade_extensions'            => 'שימוש בהרחבות בלייד',
            'view_console_it_works'             => 'View console, you should see \'it works!\' which is coming from FrontendController@index',
            'you_can_see_because'               => 'את/ה יכול/ה לראות את זה כי יש לך את התפקיד \':role\'!',
            'you_can_see_because_permission'    => 'את/ה יכול/ה לראות את זה כי יש לך את ההרשאה \':permission\'!',
        ],
        'user'          => [
            'change_email_notice'   => 'בהחלפת כתובת מייל תנותקו מהמערכת, ותצטרכו לאמת את הכתובת החדשה כדי להתחבר שוב.',
            'email_changed_notice'  => 'נשלח מייל אימות לכתובת החדשה. כדי להתחבר שוב, חובה לאמת את כתובת הדוא"ל.',
            'password_updated'      => 'הסיסמה עודכנה בהצלחה.',
            'profile_updated'       => 'הפרופיל עודכן בהצלחה.',
        ],
        'welcome_to'    => 'ברוכים הבאים ל:place',
    ],
];
