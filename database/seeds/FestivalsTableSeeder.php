<?php

use App\Models\Address;
use App\Models\Festival;
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
            'start_date'    => Carbon::now()->addDays(10),
            'end_date'      => Carbon::now()->addDays(2),
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/festivals/image_1.jpg')),
        ]));

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
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/festivals/image_2.jpg')),
        ]));

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
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/festivals/image_1.jpg')),
        ]));

        $d5 = Festival::query()->find(1);
        $adress = new Address([
            'city_id'   => 1,
            'county_id' => 1,
            'address'   => 'Adana',
        ]);
        $adress->addressable()->associate($d5);
        $adress->save();

    }
}
