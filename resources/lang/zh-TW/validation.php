<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'              => '必須接受 :attribute。',
    'active_url'            => ':attribute 並非一個有效的網址。',
    'after'                 => ':attribute 必須要晚於 :date。',
    'after_or_equal'        => ':attribute 必須要等於 :date 或更晚',
    'alpha'                 => ':attribute 只能以字母組成。',
    'alpha_dash'            => ':attribute 只能以字母、數字及斜線組成。',
    'alpha_num'             => ':attribute 只能以字母及數字組成。',
    'array'                 => ':attribute 必須為陣列。',
    'before'                => ':attribute 必須要早於 :date。',
    'before_or_equal'       => ':attribute 必須要等於 :date 或更早。',
    'between'               => [
        'array'     => ':attribute: 必須有 :min - :max 個元素。',
        'file'      => ':attribute 必須介於 :min 至 :max kb 之間。',
        'numeric'   => ':attribute 必須介於 :min 至 :max 之間。',
        'string'    => ':attribute 必須介於 :min 至 :max 個字元之間。',
    ],
    'boolean'               => ':attribute 必須為bool值。',
    'confirmed'             => ':attribute 確認欄位的輸入不一致。',
    'date'                  => ':attribute 並非一個有效的日期。',
    'date_format'           => ':attribute 不符合 :format 的格式。',
    'different'             => ':attribute 與 :other 必須不同。',
    'digits'                => ':attribute 必須是 :digits 位數字。',
    'digits_between'        => ':attribute 必須介於 :min 至 :max 位數字。',
    'dimensions'            => ':attribute 圖片尺寸不正確。',
    'distinct'              => ':attribute 已經存在。',
    'email'                 => ':attribute 必須是有效的電子郵件地址。',
    'exists'                => '所選擇的 :attribute 選項無效。',
    'file'                  => ':attribute 必須是一個檔案。',
    'filled'                => ':attribute 不能留空。',
    'image'                 => ':attribute 必須是一張圖片。',
    'in'                    => '所選擇的 :attribute 選項無效。',
    'in_array'              => ':attribute 沒有在 :other 中。',
    'integer'               => ':attribute 必須是一個整數。',
    'ip'                    => ':attribute 必須是一個有效的 IP 位址。',
    'ipv4'                  => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                  => 'The :attribute must be a valid IPv6 address.',
    'json'                  => ':attribute 必須是正確的 JSON 字串。',
    'max'                   => [
        'array'     => ':attribute 最多有 :max 個元素。',
        'file'      => ':attribute 不能大於 :max kb。',
        'numeric'   => ':attribute 不能大於 :max。',
        'string'    => ':attribute 不能多於 :max 個字元。',
    ],
    'mimes'                 => ':attribute 必須為 :values 的檔案。',
    'mimetypes'             => ':attribute 必須為 :values 的檔案。',
    'min'                   => [
        'array'     => ':attribute 至少有 :min 個元素。',
        'file'      => ':attribute 不能小於 :min kb。',
        'numeric'   => ':attribute 不能小於 :min。',
        'string'    => ':attribute 不能小於 :min 個字元。',
    ],
    'not_in'                => '所揀選的 :attribute 選項無效。',
    'numeric'               => ':attribute 必須為一個數字。',
    'present'               => ':attribute 必須存在。',
    'regex'                 => ':attribute 的格式錯誤。',
    'required'              => ':attribute 不能留空。',
    'required_if'           => '當 :other 是 :value 時 :attribute 不能留空。',
    'required_unless'       => '當 :other 不是 :value 時 :attribute 不能留空。',
    'required_with'         => '當 :values 出現時 :attribute 不能留空。',
    'required_with_all'     => '當 :values 出現時 :attribute 不能為空。',
    'required_without'      => '當 :values 留空時 :attribute field 不能留空。',
    'required_without_all'  => '當 :values 都不出現時 :attribute 不能留空。',
    'same'                  => ':attribute 與 :other 必須相同。',
    'size'                  => [
        'array'     => ':attribute 必須是 :size 個元素。',
        'file'      => ':attribute 的大小必須是 :size kb。',
        'numeric'   => ':attribute 的大小必須是 :size。',
        'string'    => ':attribute 必須是 :size 個字元。',
    ],
    'string'                => ':attribute 必須是一個字串。',
    'timezone'              => ':attribute 必須是一個正確的時區值。',
    'unique'                => ':attribute 已經存在。',
    'uploaded'              => ':attribute 上傳失敗。',
    'url'                   => ':attribute 的格式錯誤。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'    => [
        'attribute-name'    => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'    => [
        'backend'   => [
            'access'    => [
                'permissions'   => [
                    'associated_roles'  => 'Associated Roles',
                    'dependencies'      => 'Dependencies',
                    'display_name'      => 'Display Name',
                    'group'             => 'Group',
                    'group_sort'        => 'Group Sort',
                    'groups'            => [
                        'name'  => 'Group Name',
                    ],
                    'name'              => 'Name',
                    'system'            => 'System?',
                ],
                'roles'         => [
                    'associated_permissions'    => 'Associated Permissions',
                    'name'                      => 'Name',
                    'sort'                      => 'Sort',
                ],
                'users'         => [
                    'active'                    => 'Active',
                    'associated_roles'          => 'Associated Roles',
                    'confirmed'                 => 'Confirmed',
                    'email'                     => 'E-mail Address',
                    'name'                      => 'Name',
                    'other_permissions'         => 'Other Permissions',
                    'password'                  => 'Password',
                    'password_confirmation'     => 'Password Confirmation',
                    'send_confirmation_email'   => 'Send Confirmation E-mail',
                ],
            ],
        ],
        'frontend'  => [
            'email'                     => '電子郵件',
            'message'                   => 'Message',
            'name'                      => '用戶名',
            'new_password'              => '新密碼',
            'new_password_confirmation' => '新密碼（確認）',
            'old_password'              => '舊密碼',
            'password'                  => '密碼',
            'password_confirmation'     => '密碼（確認）',
            'phone'                     => 'Phone',
        ],
    ],
];
