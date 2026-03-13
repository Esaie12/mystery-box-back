<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Occasion;
use App\Models\Country;

class OccasionSeeder extends Seeder
{
    public function run(): void
    {
        $occasions = [

            [
                'name' => 'Noël',
                'emoji' => '🎄',
                'description' => 'Créez la magie des fêtes avec une box soigneusement composée.',
                'status' => 'active',
                'date_start' => '2025-12-01',
                'picture' => 'occasions/noel.jpg',
                'countries' => [
                    ['code' => 'FR', 'date_activate' => '2025-12-01'],
                    ['code' => 'BJ', 'date_activate' => '2025-12-02'],
                    ['code' => 'CI', 'date_activate' => '2025-12-03'],
                ]
            ],

            [
                'name' => 'Ramadan',
                'emoji' => '🌙',
                'description' => 'Une sélection pensée pour ce mois béni, riche en partage.',
                'status' => 'comming',
                'date_start' => '2026-02-10',
                'picture' => 'occasions/ramadan.jpg',
                'countries' => [
                    ['code' => 'FR', 'date_activate' => '2026-02-10'],
                    ['code' => 'BJ', 'date_activate' => '2026-02-11'],
                    ['code' => 'CI', 'date_activate' => '2026-02-12'],
                ]
            ],

            [
                'name' => 'Anniversaire',
                'emoji' => '🎂',
                'description' => 'Offrez une journée inoubliable avec la box surprise idéale.',
                'status' => 'active',
                'date_start' => null,
                'picture' => 'occasions/anniversaire.jpg',
                'countries' => [
                    ['code' => 'FR','date_activate' => '2026-02-10'],
                    ['code' => 'BJ','date_activate' => '2026-02-10'],
                    ['code' => 'CI','date_activate' => '2026-02-10'],
                ]
            ],

            // … autres occasions comme Fête des Pères, Mariage, etc.
        ];

        foreach ($occasions as $data) {
            // créer l'occasion
            $occasion = Occasion::create([
                'name' => $data['name'],
                'emoji' => $data['emoji'],
                'description' => $data['description'],
                'status' => $data['status'],
                'date_start' => $data['date_start'],
                'picture' => $data['picture'],
            ]);

            // lier aux pays
            foreach ($data['countries'] as $countryData) {
                $country = Country::where('code', $countryData['code'])->first();
                if ($country) {
                    $occasion->countries()->attach($country->id, [
                        'date_activate' => $countryData['date_activate'] ?? null
                    ]);
                }
            }
        }
    }
}