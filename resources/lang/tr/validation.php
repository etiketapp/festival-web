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

    'accepted'             => ':attribute kabul edilmelidir.',
    'active_url'           => ':attribute geçerli bir bağlantı olmalıdır.',
    'after'                => ':attribute şundan daha sonraki bir tarih olmalıdır :date.',
    'alpha'                => ':attribute sadece harflerden oluşmalıdır.',
    'alpha_dash'           => ':attribute sadece harfler, rakamlar ve tirelerden oluşmalıdır.',
    'alpha_num'            => ':attribute sadece harfler ve rakamlar içermelidir.',
    'array'                => ':attribute dizi olmalıdır.',
    'before'               => ':attribute şundan daha önceki bir tarih olmalıdır :date.',
    'between'              => [
        'numeric' => ':attribute :min - :max arasında olmalıdır.',
        'file'    => ':attribute :min - :max KB arasında olmalıdır.',
        'string'  => ':attribute :min - :max karakter arasında olmalıdır.',
        'array'   => ':attribute :min - :max arasında kayıt içermelidir.'
    ],
    'boolean'              => ':attribute sadece doğru veya yanlış olabilir.',
    'confirmed'            => ':attribute tekrarı eşleşmiyor.',
    'date'                 => ':attribute geçerli bir tarih olmalıdır.',
    'date_format'          => ':attribute :format biçimi ile eşleşmiyor.',
    'different'            => ':attribute ile :other birbirinden farklı olmalıdır.',
    'digits'               => ':attribute :digits rakam olmalıdır.',
    'digits_between'       => ':attribute :min ile :max arasında rakam olmalıdır.',
    'email'                => ':attribute doğru bir e-posta olmalıdır.',
    'filled'               => 'Seçili :attribute dolu olmalıdır.',
    'exists'               => 'Seçili :attribute geçersiz.',
    'image'                => ':attribute resim dosyası olmalıdır.',
    'in'                   => ':attribute değeri geçersiz.',
    'integer'              => ':attribute rakam olmalıdır.',
    'ip'                   => ':attribute geçerli bir IP adresi olmalıdır.',
    'max'                  => [
        'numeric' => ':attribute değeri :max değerinden küçük olmalıdır.',
        'file'    => ':attribute değeri :max KB boyutundan küçük olmalıdır.',
        'string'  => ':attribute en fazla :max karakter olmalıdır.',
        'array'   => ':attribute değeri :max adetten az kayıt içermelidir.'
    ],
    'mimes'                => ':attribute dosya biçimi :values olmalıdır.',
    'min'                  => [
        'numeric' => ':attribute değeri :min değerinden büyük olmalıdır.',
        'file'    => ':attribute değeri :min KB boyutundan büyük olmalıdır.',
        'string'  => ':attribute en az :min karakter olmalıdır.',
        'array'   => ':attribute en az :min kayıt içermelidir.'
    ],
    'not_in'               => 'Seçili :attribute geçersiz.',
    'numeric'              => ':attribute rakam olmalıdır.',
    'regex'                => ':attribute biçimi geçersiz.',
    'required'             => ':attribute gereklidir.',
    'required_if'          => ':attribute  :other :value değerine sahip olduğunda zorunludur.',
    'required_with'        => ':attribute :values varken zorunludur.',
    'required_with_all'    => ':attribute :values varken zorunludur.',
    'required_without'     => ':attribute :values yokken zorunludur.',
    'required_without_all' => ':attribute :values yokken zorunludur.',
    'same'                 => ':attribute ile :other eşleşmelidir.',
    'size'                 => [
        'numeric' => ':attribute :size olmalıdır.',
        'file'    => ':attribute :size KB olmalıdır.',
        'string'  => ':attribute :size karakter olmalıdır.',
        'array'   => ':attribute :size kayda sahip olmalıdır.'
    ],
    'unique'               => ':attribute daha önceden kayıt edilmiş.',
    'url'                  => ':attribute biçimi geçersiz.',
    'timezone'             => ':attribute geçerli bir zaman bölgesi olmalıdır.',
    'translate'            => ':attribute çevirileri gereklidir.',
    'base64image'          => ':attribute resim dosyası olmalıdır.',
    'tckimlik'             => ':attribute hatalıdır.',
    'luhn'                 => ':attribute hatalıdır.',
    'iban'                 => ':attribute hatalıdır.',
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

    'custom' => [
        'username' => [
            'regex' => ':attribute Türkçe karakter içermemeli ve rakamla başlamamalıdır.'
        ],
        'attribute-name' => [
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

    'attributes' => [],

];
