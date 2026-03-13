<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'name' => 'France',
                'drapeau' => '🇫🇷',
                'code' => 'FR',
                'localisation' => 'Europe',
                'devise' => 'EUR - Euro',
                'delivery_delai' => '2-3 jours ouvrés',
                'transporteur' => 'Colissimo, Chronopost, DHL',
                'delivery_price' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Bénin',
                'drapeau' => '🇧🇯',
                'code' => 'BJ',
                'localisation' => "Afrique de l'Ouest",
                'devise' => 'XOF - Franc CFA',
                'delivery_delai' => '5-7 jours ouvrés',
                'transporteur' => 'Chronopost, DHL Express',
                'delivery_price' => 0,
                'is_active' => true,
            ],
            [
                'name' => "Côte d'Ivoire",
                'drapeau' => '🇨🇮',
                'code' => 'CI',
                'localisation' => "Afrique de l'Ouest",
                'devise' => 'XOF - Franc CFA',
                'delivery_delai' => '5-7 jours ouvrés',
                'transporteur' => 'DHL, FedEx',
                'delivery_price' => 0,
                'is_active' => true,
            ],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
