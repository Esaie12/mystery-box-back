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
                    ['icon' => '📦', 'name' => 'Vin de qualité', 'compatible'=>'all'],
                    ['icon' => '📦', 'name' => 'Chocolat', 'compatible'=>'all'],
                    ['icon' => '🌹', 'name' => 'Montre Homme/Femme', 'compatible'=>'all'],
                    ['icon' => '👗', 'name' => 'Parfums', 'compatible'=>'all'],
                    ['icon' => '🍷', 'name' => 'Taxe personnalisée', 'compatible'=>'all'],
                    ['icon' => '🍷', 'name' => 'Boite Galant', 'compatible'=>'all'],
                ],
                'price'=>5000
            ],
            [
                'title' => 'Romantique',
                'subtitle' => 'Le Cœur Tendre',
                'description' => "Pour les âmes sensibles qui célèbrent l'amour dans toute sa douceur.",
                'icon' => '💕',
                'color' => 'pink',
                'mystery' => 'Vous recevrez 2 à 3 produits sélectionnés aléatoirement !',
                'products' => [
                    ['icon' => '📦', 'name' => 'Champagne de qualité', 'compatible'=>'all'],
                    ['icon' => '🕯️', 'name' => 'Parfums'],
                    ['icon' => '🍫', 'name' => 'Taxe personnalisée'],
                    ['icon' => '💌', 'name' => 'Beurre de karité au cacao', 'compatible'=>'femme'],
                    ['icon' => '🧴', 'name' => 'Montre Homme/Femme'],
                    ['icon' => '🎵', 'name' => 'Boite Romantique'],
                ],
                'price'=>10000
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
                    ['icon' => '🥂', 'name' => 'Pagne de qualité'],
                    ['icon' => '🕯️', 'name' => 'Parfums'],
                    ['icon' => '🌹', 'name' => 'Montre Homme/Femme', 'compatible'=>'all'],
                    ['icon' => '🍫', 'name' => 'Taxe personnalisée'],
                    ['icon' => '🎁', 'name' => 'Boite le Boss'],
                ],
                'price'=>15000
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
