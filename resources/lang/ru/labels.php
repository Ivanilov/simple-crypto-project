<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Языковые ресурсы названий Labels
    |--------------------------------------------------------------------------
    |
    | Следующие языковые ресурсы используются в названиях
    | Labels всего вашего приложения.
    | Вы можете свободно изменять эти языковые ресурсы в соответствии
    | с требованиями вашего приложения.
    |
    */

    'backend'   => [
        'access'        => [
            'roles' => [
                'create'            => 'Создать новую роль',
                'create_role_form'  => 'Создать роль',
                'edit'              => 'Изменить роль',
                'management'        => 'Доступ',
                'table'             => [
                    'number_of_users'   => 'Пользователей',
                    'permissions'       => 'Разрешения',
                    'role'              => 'Роль',
                    'sort'              => 'Позиция',
                    'total'             => 'ролей всего|всего ролей',
                ],
            ],
            'users' => [
                'access_permissions'    => 'Разрешения и доступы',
                'active'                => 'Активные пользователи',
                'all_permissions'       => 'Полный доступ',
                'basic_information'     => 'Главная информация',
                'change_password'       => 'Изменение пароля',
                'change_password_for'   => 'Изменить пароль :user',
                'create'                => 'Создать учётную запись',
                'deactivated'           => 'Заблокированные пользователи',
                'deleted'               => 'Удаленные пользователи',
                'edit'                  => 'Редактирование учётной записи',
                'management'            => 'Пользователи',
                'no_permissions'        => 'Нет разрешений',
                'no_roles'              => 'Невозможно присвоить роль.',
                'other_permissions'     => 'Другие разрешения',
                'permissions'           => 'Разрешения',
                'roles'                 => 'Роли',
                'table'                 => [
                    'confirmed'         => 'Подтверждён',
                    'created'           => 'Создан',
                    'email'             => 'E-mail',
                    'first_name'        => 'Имя',
                    'id'                => 'ID',
                    'last_name'         => 'Фамилия',
                    'last_updated'      => 'Обновлён',
                    'name'              => 'Логин',
                    'no_deactivated'    => 'Нет заблокированных пользователей',
                    'no_deleted'        => 'Нет удаленных пользователей',
                    'other_permissions' => 'Другие Разрешения',
                    'permissions'       => 'Разрешения',
                    'roles'             => 'Роль',
                    'social'            => 'Социальный аккаунт',
                    'total'             => 'пользователей всего|всего пользователей',
                ],
                'tabs'                  => [
                    'content'   => [
                        'overview'  => [
                            'access'        => 'Доступ',
                            'avatar'        => 'Аватар',
                            'confirmed'     => 'Подтверждён',
                            'created_at'    => 'Создан',
                            'deleted_at'    => 'Удалён',
                            'email'         => 'E-mail',
                            'first_name'    => 'Имя',
                            'last_name'     => 'Фамилия',
                            'last_updated'  => 'Обновлён',
                            'main'          => 'Главные',
                            'name'          => 'Логин',
                            'permissions'   => 'Права доступа',
                            'roles'         => 'Роли доступа',
                            'status'        => 'Статус',
                        ],
                    ],
                    'titles'    => [
                        'history'   => 'История',
                        'overview'  => 'Обзор',
                    ],
                ],
                'view'                  => 'Просмотр учётной записи',
            ],
        ],
        'breadcrumbs'   => [
            'home'  => 'Главная',
        ],
    ],
    'frontend'  => [
        'auth'      => [
            'login_box_title'       => 'Вход',
            'login_button'          => 'Вход',
            'login_with'            => 'Вход из :social_media',
            'register_box_title'    => 'Регистрация',
            'register_button'       => 'Зарегистрироваться',
            'remember_me'           => 'Запомнить меня',
        ],
        'contact'   => [
            'box_title' => 'Контакт',
            'button'    => 'Отправить',
        ],
        'passwords' => [
            'expired_password_box_title'        => 'Срок действия изменения пароля истек.',
            'forgot_password'                   => 'Забыли Пароль?',
            'reset_password_box_title'          => 'Сброс Пароля',
            'reset_password_button'             => 'Смена пароля',
            'send_password_reset_link_button'   => 'Отправить',
            'update_password_button'            => 'Обновить пароль',
        ],
        'user'      => [
            'passwords' => [
                'change'    => 'Изменить пароль',
            ],
            'profile'   => [
                'avatar'                => 'Аватар',
                'created_at'            => 'Создан',
                'edit_information'      => 'Редактирование информации',
                'email'                 => 'E-mail',
                'first_name'            => 'Имя',
                'last_name'             => 'Фамилия',
                'last_updated'          => 'Обновлён',
                'name'                  => 'Логин',
                'update_information'    => 'Обновление информации',
            ],
        ],
    ],
    'general'   => [
        'actions'           => 'Действие',
        'active'            => 'Активирован',
        'all'               => 'Все',
        'buttons'           => [
            'save'      => 'Сохранить',
            'update'    => 'Обновить',
        ],
        'copyright'         => 'Copyright',
        'custom'            => 'Выборочно',
        'hide'              => 'Скрыть',
        'inactive'          => 'Неактивен',
        'no'                => 'Нет',
        'none'              => 'Нет',
        'show'              => 'Показать',
        'toggle_navigation' => 'Навигация',
        'yes'               => 'Да',
    ],
];
