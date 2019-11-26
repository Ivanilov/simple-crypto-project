<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Языковые ресурсы Исключений (Exception)
    |--------------------------------------------------------------------------
    | Следующие языковые ресурсы используются для вывода
    | сообщений перехвата Исключений (Exception) всего вашего приложения.
    | Вы можете свободно изменять эти языковые ресурсы в соответствии
    | с требованиями вашего приложения.
    |
    */

    'backend'   => [
        'access'    => [
            'roles' => [
                'already_exists'    => 'Такое название роли уже существует. Пожалуйста, выберите другое название.',
                'cant_delete_admin' => 'Вы не можете удалить роль администратора.',
                'create_error'      => 'Невозможно создать роль. Пожалуйста, попробуйте позже.',
                'delete_error'      => 'Невозможно удалить роль. Пожалуйста, попробуйте позже.',
                'has_users'         => 'Вы не можете удалить эту роль, она связана с существующими пользователями.',
                'needs_permission'  => 'Вы должны выбрать по крайней мере одно разрешение для этой роли.',
                'not_found'         => 'Роль не существует.',
                'update_error'      => 'Невозможно обновить роль. Пожалуйста, попробуйте позже.',
            ],
            'users' => [
                'already_confirmed'         => 'Этот пользователь уже подтвержден.',
                'cant_confirm'              => 'Возникла проблема с подтверждением учетной записи пользователя.',
                'cant_deactivate_self'      => 'Для себя вы не можете это сделать.',
                'cant_delete_admin'         => 'Вы не можете удалить главного администратора.',
                'cant_delete_own_session'   => 'Вы не можете удалить свою собственную сессию.',
                'cant_delete_self'          => 'Вы не можете себя удалить.',
                'cant_restore'              => 'Этот пользователь не удален, поэтому он не может быть восстановлен.',
                'cant_unconfirm_admin'      => 'Вы не можете подтвердить супер администратора.',
                'cant_unconfirm_self'       => 'Вы не можете подтвердить себя же.',
                'create_error'              => 'Невозможно создать пользователя. Пожалуйста, попробуйте позже.',
                'delete_error'              => 'Невозможно удалить пользователя. Пожалуйста, попробуйте позже.',
                'delete_first'              => 'Этот пользователь должен быть мягко удален, прежде чем он может быть окончательно удален.',
                'email_error'               => 'Этот E-mail адрес принадлежит другому пользователю.',
                'mark_error'                => 'Невозможно обновить пользователя. Пожалуйста, попробуйте позже.',
                'not_confirmed'             => 'Этот пользователь не подтвержден.',
                'not_found'                 => 'Такого пользователя не существует.',
                'restore_error'             => 'Невозможно восстановить пользователя. Пожалуйста, попробуйте позже.',
                'role_needed'               => 'Вы должны выбрать как минимум одну роль.',
                'role_needed_create'        => 'Вы должны выбрать по крайней мере одну роль.',
                'session_wrong_driver'      => 'Для использования этой функции, данные сессии должны использовать базу данных.',
                'social_delete_error'       => 'Не удалось удалить социальную учетную запись у пользователя.',
                'update_error'              => 'Невозможно обновить пользователя. Пожалуйста, попробуйте позже.',
                'update_password_error'     => 'Невозможно изменить пароль пользователя. Пожалуйста, попробуйте позже.',
            ],
        ],
    ],
    'frontend'  => [
        'auth'  => [
            'confirmation'          => [
                'already_confirmed' => 'Ваша учетная запись уже подтверждена.',
                'confirm'           => 'Подтвердите вашу учетную запись!',
                'created_confirm'   => 'Ваш учетная запись успешно создана. Мы отправили вам уведомление на ваш E-mail для подтверждения вашей учетной записи.',
                'created_pending'   => 'Ваша учетная запись записана и находится на рассмотрении. После удтверждения вашей учетной записи, вам будет отправлено уведомление на ваш E-mail.',
                'mismatch'          => 'Неправильный код подтверждения.',
                'not_found'         => 'Такого кода не существует.',
                'pending'           => 'В настоящее время ваша учетная запись находится на рассмотрении.',
                'resend'            => 'Ваша учетная запись не подтверждена. Пожалуйста, нажмите на ссылку для подтверждения в письме высланном на Ваш E-mail, или <a href="http://boilerplate.dev/account/confirm/resend/:user_uuid">щелкните здесь</a>, чтобы повторно отправить подтверждение на Ваш E-mail.',
                'resent'            => 'Новые параметры подтверждения высланы вам на ваш E-mail адрес.',
                'success'           => 'Ваша учетная запись успешно подтверждена!',
            ],
            'deactivated'           => 'Ваша учетная запись была деактивирована.',
            'email_taken'           => 'Этот E-mail адрес уже занят.',
            'password'              => [
                'change_mismatch'   => 'Неверный старый пароль.',
                'reset_problem'     => 'Не удалось изменить пароль. Повторите запрос на изменение пароля.',
            ],
            'registration_disabled' => 'Регистрация в настоящее время закрыта, приходите позже',
        ],
    ],
];
