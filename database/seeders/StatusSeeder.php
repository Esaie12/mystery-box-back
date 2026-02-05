<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $statuses = [
            [
                'title' => 'En préparation',
                'emoji' => '🛠️',
                'message' => 'Votre commande est en préparation'
            ],
            [
                'title' => 'En livraison',
                'emoji' => '🚚',
                'message' => 'Votre commande est en cours de livraison'
            ],
            [
                'title' => 'Livrée',
                'emoji' => '✅',
                'message' => 'Votre commande a été livrée'
            ],
            [
                'title' => 'Annulée',
                'emoji' => '❌',
                'message' => 'Votre commande a été annulée'
            ],
        ];

        DB::table('status')->insert($statuses);
    }
}
