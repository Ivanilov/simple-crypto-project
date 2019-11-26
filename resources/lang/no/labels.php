<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend'   => [
        'access'    => [
            'roles' => [
                'create'        => 'Opprett Rolle',
                'edit'          => 'Oppdater Rolle',
                'management'    => 'Rolleadministration',
                'table'         => [
                    'number_of_users'   => 'Antall Brukere',
                    'permissions'       => 'Rettigheter',
                    'role'              => 'Rolle',
                    'sort'              => 'Sortér',
                    'total'             => 'rolle i alt|roller i alt',
                ],
            ],
            'users' => [
                'active'                => 'Aktive Brukere',
                'all_permissions'       => 'Alle Rettigheter',
                'change_password'       => 'Endre Passord',
                'change_password_for'   => 'Endre Passord for :user',
                'create'                => 'Opprett Bruker',
                'deactivated'           => 'Deaktiver Brukere',
                'deleted'               => 'Slettet Brukere',
                'edit'                  => 'Rediger Bruker',
                'management'            => 'Brukeradministration',
                'no_permissions'        => 'Ingen Rettigheter',
                'no_roles'              => 'Ingen Rolle valgt.',
                'permissions'           => 'Rettigheter',
                'table'                 => [
                    'confirmed'         => 'Bekreftet',
                    'created'           => 'Opprettet',
                    'email'             => 'Email',
                    'first_name'        => 'Brukernavn',
                    'id'                => 'Id',
                    'last_name'         => 'Etternavn',
                    'last_updated'      => 'Sist Oppdateret',
                    'no_deactivated'    => 'Ingen Deaktiverede Brukere',
                    'no_deleted'        => 'Ingen Slettede Brukere',
                    'roles'             => 'Roller',
                    'social'            => 'Sosial',
                    'total'             => 'bruker i alt|brukere i alt',
                ],
                'tabs'                  => [
                    'content'   => [
                        'overview'  => [
                            'avatar'        => 'Avatar',
                            'confirmed'     => 'Bekreftet',
                            'created_at'    => 'Opprettet den',
                            'deleted_at'    => 'Slettet den',
                            'email'         => 'E-mail',
                            'first_name'    => 'Brukernavn',
                            'last_name'     => 'Etternavn',
                            'last_updated'  => 'Sist Oppdatert',
                            'status'        => 'Status',
                        ],
                    ],
                    'titles'    => [
                        'history'   => 'History',
                        'overview'  => 'Overview',
                    ],
                ],
                'view'                  => 'Se på Bruker',
            ],
        ],
    ],
    'frontend'  => [
        'auth'      => [
            'login_box_title'       => 'Logg inn',
            'login_button'          => 'Logg inn',
            'login_with'            => 'Logg inn med :social_media',
            'register_box_title'    => 'Opprett',
            'register_button'       => 'Opprett',
            'remember_me'           => 'Husk meg',
        ],
        'contact'   => [
            'box_title' => 'Kontakt oss',
            'button'    => 'Send Information',
        ],
        'macros'    => [
            'country'           => [
                'alpha'     => 'Landkoder',
                'alpha2'    => 'Landkoder (Alfa-2)',
                'alpha3'    => 'Landkode (Alfa-3)',
                'numeric'   => 'Landkoder (Numerisk)',
            ],
            'macro_examples'    => 'Eksempler på Makroer',
            'state'             => [
                'mexico'    => 'Mexicos stater',
                'us'        => [
                    'armed'     => 'Amerikanske vepnede styrker',
                    'outlying'  => 'Amerikanske oversøiske territorier',
                    'us'        => 'Amerikanske stater',
                ],
            ],
            'territories'       => [
                'canada'    => 'Canada\'s provinser og territorier',
            ],
            'timezone'          => 'Tidssone',
        ],
        'passwords' => [
            'forgot_password'                   => 'Glemt passordet?',
            'reset_password_box_title'          => 'tilbakestill passordet',
            'reset_password_button'             => 'tilbakestill passordet',
            'send_password_reset_link_button'   => 'Send link til å tilbakestille passordet',
        ],
        'user'      => [
            'passwords' => [
                'change'    => 'Endre passord',
            ],
            'profile'   => [
                'avatar'                => 'Avatar',
                'created_at'            => 'Opprettet den',
                'edit_information'      => 'Rediger information',
                'email'                 => 'Email',
                'first_name'            => 'Brukernavn',
                'last_name'             => 'Etternavn',
                'last_updated'          => 'Sist opdateret',
                'update_information'    => 'Oppdater information',
            ],
        ],
    ],
    'general'   => [
        'actions'           => 'Handlinger',
        'active'            => 'Aktiv',
        'all'               => 'Alle',
        'buttons'           => [
            'save'      => 'Lagre',
            'update'    => 'Oppdater',
        ],
        'custom'            => 'Brukerdefineret',
        'hide'              => 'Skjul',
        'inactive'          => 'Innaktiv',
        'no'                => 'Nei',
        'none'              => 'Ingen',
        'show'              => 'Vis',
        'toggle_navigation' => 'Navigation',
        'yes'               => 'Ja',
    ],
];
