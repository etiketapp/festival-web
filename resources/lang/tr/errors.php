<?php

return [
    'common'     => [
        'error' => 'Hata',
    ],
    'auth'       => [
        'invalid'         => 'Hatalı e-posta adresi veya parola',
        'not-registered'  => 'Not Registered',
        'not-found'       => 'Kullanıcı bulunamadı',
        'gsm-verify'      => 'GSM Onayı Gereklidir',

        'verify'    => [
            'required'  => 'Doğrulama kodunuz gsm numaranıza gönderilmiştir.',
            'invalid'   => 'Hatalı telefon numarası',
            'not-found' => 'Kullanıcı bulunamadı',
            'deleted'   => 'Silinmiş Kullanıcı',
            'code'      => [
                'no-timeout'    => 'Eski onay kodunun süresi dolmadı',
            ],
        ],
        'password'        => [
            'invalid' => 'Hatalı parola.',
        ],
        'forgot'          => [
            'invalid' => 'Hatalı e-posta adresi.',
        ],
        'reset'           => [
            'invalid' => 'Sıfırlama kodu hatalı veya süresi dolmuş.',
        ],
        'social'          => [
            'agreement'   => 'Sözleşmeyi kabul etmelisiniz.',
            'unsupported' => 'Desteklenmeyen sosyal ağ.',
            'invalid'     => 'Hatalı giriş bilgisi.',
            'missing'     => 'Bazı bilgiler eksik.',
        ],
    ],
    'dietician' => [
        'not-found' => 'Diyetisyen bulunamadı.',

        'service' => [
            'not-found' => 'Hizmet bulunamadı.',
        ],
    ],
    'user' => [
        'gsm' => [
            'registered' => 'Gsm numarası kayıtlı.',
            'already'   => 'Gsm numaranız daha önceden doğrulanmış.'
        ],
        'meal' => [
            'image' => 'Resim dosyası olmalıdır.',
            'daily_count'   => 'Günde sadece 5 öğün ekleyebilirsiniz.',
        ],
        'size' => [
            'wait-next-day' => 'Vücut ölçülerini günlük bir kere ekleyebilirsiniz.',
            'not-found'     => 'Vücut ölçüleri bulunamadı.',
        ],
        'appointment' => [
            'not-found'         => 'Randevu bulunamadı.',
            'already-delayed'   => 'Bu randevu daha önce ertelenmiş',
            'timeout'           => 'Geçmiş randevular ertelenemez.',
            'not-confirmed'     => 'Onaylanmış randevular ertelenemez.',
        ],
    ],
    'service' => [
        'not-found' => 'Hizmet bulunamadı.',
    ],
];