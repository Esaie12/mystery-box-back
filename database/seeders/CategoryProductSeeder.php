<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Galant',
                'subtitle' => 'Le Gentleman Romantique',
                'description' => "Pour les amoureux classiques qui apprécient l'élégance et le raffinement.",
                'icon' => '🌹',
                'color' => 'rose',
                'mystery' => 'Vous recevrez 2 à 3 produits sélectionnés aléatoirement !',
                'products' => [
                    ['icon' => '📦', 'name' => 'Boîte premium 1'],
                    ['icon' => '📦', 'name' => 'Boîte premium 2'],
                    ['icon' => '🌹', 'name' => 'Bouquet de fleurs'],
                    ['icon' => '👗', 'name' => 'Pagne élégant'],
                    ['icon' => '🍷', 'name' => 'Vin de qualité'],
                ],
                'price'=>3000
            ],
            [
                'title' => 'Romantique',
                'subtitle' => 'Le Cœur Tendre',
                'description' => "Pour les âmes sensibles qui célèbrent l'amour dans toute sa douceur.",
                'icon' => '💕',
                'color' => 'pink',
                'mystery' => 'Vous recevrez 2 à 3 produits sélectionnés aléatoirement !',
                'products' => [
                    ['icon' => '🕯️', 'name' => 'Bougies parfumées'],
                    ['icon' => '🍫', 'name' => 'Chocolats artisanaux'],
                    ['icon' => '💌', 'name' => 'Carte d\'amour personnalisée'],
                    ['icon' => '🧴', 'name' => 'Coffret spa & bien-être'],
                    ['icon' => '🎵', 'name' => 'Playlist romantique personnalisée'],
                ],
                'price'=>5000
            ],
            [
                'title' => 'Le Boss',
                'subtitle' => 'Le Prestige Absolu',
                'description' => "Pour ceux qui ne font aucun compromis et veulent ce qu'il y a de meilleur.",
                'icon' => '👑',
                'color' => 'amber',
                'mystery' => 'Vous recevrez 3 à 4 produits premium sélectionnés !',
                'products' => [
                    ['icon' => '💍', 'name' => 'Bijou de luxe'],
                    ['icon' => '🥂', 'name' => 'Champagne millésimé'],
                    ['icon' => '👜', 'name' => 'Accessoire de marque'],
                    ['icon' => '🌹', 'name' => 'Roses éternelles premium'],
                    ['icon' => '🎁', 'name' => 'Expérience VIP exclusive'],
                ],
                'price'=>10000
            ],
        ];

        foreach ($categories as $catData) {
            $products = $catData['products']; // extraire les produits
            unset($catData['products']); // enlever du tableau pour créer la catégorie

            $category = Category::create($catData); // créer la catégorie

            // créer les produits liés
            $category->products()->createMany($products);
        }
    }
}
