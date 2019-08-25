<?php

use App\Models\Address;
use App\Models\Festival;
use App\Models\FestivalGallery;
use App\Models\User;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FestivalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Festival::create([
            'title'         => 'Zeytinli Rock Festivali 2019',
            'sub_title'     => 'Zeytinli Rock Festivali 2019',
            'advice'       => 'Siyah tişörtler hazırsa, bu seneki Zeytinli Rock Festivali için düğmeye basabiliriz. Türk rock müziğine adeta bir saygı duruşu olan Zeytinli Rock Festivali, 5 gün boyunca Akçay sahilinde olacak. Festivalin programının yakın bir zamanda açıklanması bekleniyor.',
            'place'         => 'Edremit Akçay Sahili',
            'price'         => 500.00,
            'about'         => '28 Ağustos – 1 Eylül / Edremit Akçay Sahili',
            'category_id'   => 3,
            'start_date'    => Carbon::now()->addDays(1),
            'end_date'      => Carbon::now()->addDays(20),
        ]);

        Festival::create([
            'title'         => 'Holifest 2019',
            'sub_title'     => 'Holifest 2019',
            'advice'        => 'Hint kültürünün en önemli bayramları arasında sayılan Holifest, bu yıl Türkiye’de dördüncü defa düzenleniyor. Masmavi deniz ve ormanın sessizliğiyle kutlanacak Holifest, tam bir aktivite yuvası olacak.',
            'place'         => 'İzmir – İzmir Arena',
            'price'         => 300.00,
            'about'         => '20 Nisan / İzmir – İzmir Arena',
            'category_id'   => 2,
            'start_date'    => Carbon::now()->addDays(7),
            'end_date'      => Carbon::now()->addDays(12),
        ]);

        $d4 = Festival::query()->find(2);
        $adress = new Address([
            'city_id'   => 1,
            'county_id' => 1,
            'address'   => 'Adana',
        ]);

        $adress->addressable()->associate($d4);
        $adress->save();

        Festival::create([
            'title'         => 'Kuşadası Gençlik Festivali 2019',
            'sub_title'     => 'Kuşadası Gençlik Festivali 2019',
            'advice'       => '“Her zaman iyi müzik” sloganıyla yola çıkan Kuşadası Gençlik Festivali, bu yıl da Ege Bölgesi’nin ses getiren etkinliklerinden biri olmayı amaçlıyor. Geçtiğimiz yıl 90 bin kişinin katıldığı ve coşkunun üst düzeyde yaşandığı festival, Davutlar mevkiinde konumlanan Sevgi Plajı’nda gerçekleşecek.',
            'place'         => 'Kuşadası Sevgi Plajı',
            'about'         => '10 – 14 Temmuz / Kuşadası Sevgi Plajı',
            'price'         => 800.00,
            'category_id'   => 1,
            'start_date'    => Carbon::now()->addDays(4),
            'end_date'      => Carbon::now()->addDays(31),
        ]);

        $d5 = Festival::query()->find(1);
        $adress = new Address([
            'city_id'   => 2,
            'county_id' => 2,
            'address'   => 'Adıyaman',
        ]);
        $adress->addressable()->associate($d5);
        $adress->save();

        FestivalGallery::create([
            'festival_id' => 1,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_1.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 1,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_2.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 1,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_3.jpg')),
            ])
        );

        FestivalGallery::create([
            'festival_id' => 2,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_1.jpg')),
            ])
        );

        FestivalGallery::create([
            'festival_id' => 2,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_2.jpg')),
            ])
        );


        FestivalGallery::create([
            'festival_id' => 2,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_3.jpg')),
            ])
        );


        FestivalGallery::create([
            'festival_id' => 3,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_1.jpg')),
            ])
        );

        FestivalGallery::create([
            'festival_id' => 3,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_2.jpg')),
            ])
        );

        FestivalGallery::create([
            'festival_id' => 3,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_3.jpg')),
            ])
        );

        Festival::create([
            'title'         => 'Kuşadası Gençlik Festivali 2020',
            'sub_title'     => 'Kuşadası Gençlik Festivali 2020',
            'advice'       => '“Her zaman iyi müzik” sloganıyla yola çıkan Kuşadası Gençlik Festivali, bu yıl da Ege Bölgesi’nin ses getiren etkinliklerinden biri olmayı amaçlıyor. Geçtiğimiz yıl 90 bin kişinin katıldığı ve coşkunun üst düzeyde yaşandığı festival, Davutlar mevkiinde konumlanan Sevgi Plajı’nda gerçekleşecek.',
            'place'         => 'Kuşadası Sevgi Plajı',
            'about'         => '10 – 14 Temmuz / Kuşadası Sevgi Plajı',
            'price'         => 800.00,
            'category_id'   => 1,
            'start_date'    => Carbon::now()->addDays(3),
            'end_date'      => Carbon::now()->addDays(12),
        ]);

        $d5 = Festival::query()->find(4);
        $adress = new Address([
            'city_id'   => 3,
            'county_id' => 3,
            'address'   => 'Ağrı',
        ]);
        $adress->addressable()->associate($d5);
        $adress->save();

        FestivalGallery::create([
            'festival_id' => 4,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_1.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 4,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_2.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 4,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_3.jpg')),
            ])
        );

        Festival::create([
            'title'         => 'Kuşadası Gençlik Festivali 2021',
            'sub_title'     => 'Kuşadası Gençlik Festivali 2021',
            'advice'       => '“Her zaman iyi müzik” sloganıyla yola çıkan Kuşadası Gençlik Festivali, bu yıl da Ege Bölgesi’nin ses getiren etkinliklerinden biri olmayı amaçlıyor. Geçtiğimiz yıl 90 bin kişinin katıldığı ve coşkunun üst düzeyde yaşandığı festival, Davutlar mevkiinde konumlanan Sevgi Plajı’nda gerçekleşecek.',
            'place'         => 'Kuşadası Sevgi Plajı',
            'about'         => '10 – 14 Temmuz / Kuşadası Sevgi Plajı',
            'price'         => 800.00,
            'category_id'   => 1,
            'start_date'    => Carbon::now()->addDays(3),
            'end_date'      => Carbon::now()->addDays(12),
        ]);

        $d5 = Festival::query()->find(5);
        $adress = new Address([
            'city_id'   => 1,
            'county_id' => 1,
            'address'   => 'Selimiye Camii',
        ]);
        $adress->addressable()->associate($d5);
        $adress->save();

        FestivalGallery::create([
            'festival_id' => 5,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_1.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 5,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_2.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 5,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_3.jpg')),
            ])
        );

        Festival::create([
            'title'         => 'Kuşadası Gençlik Festivali 2020',
            'sub_title'     => 'Kuşadası Gençlik Festivali 2020',
            'advice'       => '“Her zaman iyi müzik” sloganıyla yola çıkan Kuşadası Gençlik Festivali, bu yıl da Ege Bölgesi’nin ses getiren etkinliklerinden biri olmayı amaçlıyor. Geçtiğimiz yıl 90 bin kişinin katıldığı ve coşkunun üst düzeyde yaşandığı festival, Davutlar mevkiinde konumlanan Sevgi Plajı’nda gerçekleşecek.',
            'place'         => 'Kuşadası Sevgi Plajı',
            'about'         => '10 – 14 Temmuz / Kuşadası Sevgi Plajı',
            'price'         => 800.00,
            'category_id'   => 1,
            'start_date'    => Carbon::now()->addDays(3),
            'end_date'      => Carbon::now()->addDays(12),
        ]);

        $d5 = Festival::query()->find(6);
        $adress = new Address([
            'city_id'   => 40,
            'county_id' => 440,
            'address'   => 'Çamlıca Tepesi',
        ]);
        $adress->addressable()->associate($d5);
        $adress->save();

        FestivalGallery::create([
            'festival_id' => 6,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_1.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 6,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_2.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 6,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_3.jpg')),
            ])
        );

        Festival::create([
            'title'         => 'Kuşadası Gençlik Festivali 2022',
            'sub_title'     => 'Kuşadası Gençlik Festivali 2022',
            'advice'       => '“Her zaman iyi müzik” sloganıyla yola çıkan Kuşadası Gençlik Festivali, bu yıl da Ege Bölgesi’nin ses getiren etkinliklerinden biri olmayı amaçlıyor. Geçtiğimiz yıl 90 bin kişinin katıldığı ve coşkunun üst düzeyde yaşandığı festival, Davutlar mevkiinde konumlanan Sevgi Plajı’nda gerçekleşecek.',
            'place'         => 'Kuşadası Sevgi Plajı',
            'about'         => '10 – 14 Temmuz / Kuşadası Sevgi Plajı',
            'price'         => 800.00,
            'category_id'   => 1,
            'start_date'    => Carbon::now()->addDays(3),
            'end_date'      => Carbon::now()->addDays(12),
        ]);

        $d5 = Festival::query()->find(7);
        $adress = new Address([
            'city_id'   => 45,
            'county_id' => 450,
            'address'   => 'Hakkari',
        ]);
        $adress->addressable()->associate($d5);
        $adress->save();

        FestivalGallery::create([
            'festival_id' => 7,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_1.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 7,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_2.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 7,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_3.jpg')),
            ])
        );

        Festival::create([
            'title'         => 'Kuşadası Gençlik Festivali 2022',
            'sub_title'     => 'Kuşadası Gençlik Festivali 2022',
            'advice'       => '“Her zaman iyi müzik” sloganıyla yola çıkan Kuşadası Gençlik Festivali, bu yıl da Ege Bölgesi’nin ses getiren etkinliklerinden biri olmayı amaçlıyor. Geçtiğimiz yıl 90 bin kişinin katıldığı ve coşkunun üst düzeyde yaşandığı festival, Davutlar mevkiinde konumlanan Sevgi Plajı’nda gerçekleşecek.',
            'place'         => 'Kuşadası Sevgi Plajı',
            'about'         => '10 – 14 Temmuz / Kuşadası Sevgi Plajı',
            'price'         => 800.00,
            'category_id'   => 1,
            'start_date'    => Carbon::now()->addDays(3),
            'end_date'      => Carbon::now()->addDays(12),
        ]);

        $d5 = Festival::query()->find(8);
        $adress = new Address([
            'city_id'   => 89,
            'county_id' => 500,
            'address'   => 'Trabzon',
        ]);
        $adress->addressable()->associate($d5);
        $adress->save();

        FestivalGallery::create([
            'festival_id' => 8,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_1.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 8,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_2.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 8,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_3.jpg')),
            ])
        );

        Festival::create([
            'title'         => 'Kuşadası Gençlik Festivali 2023',
            'sub_title'     => 'Kuşadası Gençlik Festivali 2023',
            'advice'       => '“Her zaman iyi müzik” sloganıyla yola çıkan Kuşadası Gençlik Festivali, bu yıl da Ege Bölgesi’nin ses getiren etkinliklerinden biri olmayı amaçlıyor. Geçtiğimiz yıl 90 bin kişinin katıldığı ve coşkunun üst düzeyde yaşandığı festival, Davutlar mevkiinde konumlanan Sevgi Plajı’nda gerçekleşecek.',
            'place'         => 'Kuşadası Sevgi Plajı',
            'about'         => '10 – 14 Temmuz / Kuşadası Sevgi Plajı',
            'price'         => 800.00,
            'category_id'   => 1,
            'start_date'    => Carbon::now()->addDays(3),
            'end_date'      => Carbon::now()->addDays(12),
        ]);

        $d5 = Festival::query()->find(9);
        $adress = new Address([
            'city_id'   => 31,
            'county_id' => 310,
            'address'   => 'Muş',
        ]);
        $adress->addressable()->associate($d5);
        $adress->save();

        FestivalGallery::create([
            'festival_id' => 9,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_1.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 9,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_2.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 9,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_3.jpg')),
            ])
        );

        Festival::create([
            'title'         => 'Kuşadası Gençlik Festivali 2024',
            'sub_title'     => 'Kuşadası Gençlik Festivali 2024',
            'advice'       => '“Her zaman iyi müzik” sloganıyla yola çıkan Kuşadası Gençlik Festivali, bu yıl da Ege Bölgesi’nin ses getiren etkinliklerinden biri olmayı amaçlıyor. Geçtiğimiz yıl 90 bin kişinin katıldığı ve coşkunun üst düzeyde yaşandığı festival, Davutlar mevkiinde konumlanan Sevgi Plajı’nda gerçekleşecek.',
            'place'         => 'Kuşadası Sevgi Plajı',
            'about'         => '10 – 14 Temmuz / Kuşadası Sevgi Plajı',
            'price'         => 800.00,
            'category_id'   => 1,
            'start_date'    => Carbon::now()->addDays(3),
            'end_date'      => Carbon::now()->addDays(12),
        ]);

        $d5 = Festival::query()->find(10);
        $adress = new Address([
            'city_id'   => 1,
            'county_id' => 1,
            'address'   => 'Etiler',
        ]);
        $adress->addressable()->associate($d5);
        $adress->save();

        FestivalGallery::create([
            'festival_id' => 10,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_1.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 10,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_2.jpg')),
            ])
        );
        FestivalGallery::create([
            'festival_id' => 10,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_3.jpg')),
            ])
        );

    }
}
