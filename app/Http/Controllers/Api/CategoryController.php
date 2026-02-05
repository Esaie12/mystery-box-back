<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // 1️⃣ Lister toutes les catégories avec leurs produits
    public function index()
    {
        $categories = Category::with('products')->get();
        return response()->json($categories);
    }

    // 2️⃣ Détail d’une catégorie
    public function show($id)
    {
        $category = Category::with('products')->find($id);

        if (!$category) {
            return response()->json(['message' => 'Catégorie non trouvée'], 404);
        }

        return response()->json($category);
    }


    // 3️⃣ Ajouter une nouvelle catégorie avec produits
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'mystery' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'color' => 'required|string|max:50',
            'price' => 'nullable|numeric',
            'products' => 'nullable|array',
            'products.*.name' => 'required_with:products|string|max:255',
            'products.*.icon' => 'nullable|string|max:255',
        ]);

        $products = $validated['products'] ?? [];
        unset($validated['products']);

        $category = Category::create($validated);

        if (!empty($products)) {
            $category->products()->createMany($products);
        }

        return response()->json($category->load('products'), 201);
    }

    // 4️⃣ Modifier une catégorie
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Catégorie non trouvée'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'mystery' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'color' => 'sometimes|required|string|max:50',
            'price' => 'nullable|numeric',
            'products' => 'nullable|array',
            'products.*.id' => 'sometimes|exists:products,id',
            'products.*.name' => 'required_with:products|string|max:255',
            'products.*.icon' => 'nullable|string|max:255',
        ]);

        $products = $validated['products'] ?? [];
        unset($validated['products']);

        $category->update($validated);

        // Mettre à jour les produits : simple approche, on supprime puis recrée
        if (!empty($products)) {
            $category->products()->delete();
            $category->products()->createMany($products);
        }

        return response()->json($category->load('products'));
    }

    // 5️⃣ Supprimer une catégorie et ses produits
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Catégorie non trouvée'], 404);
        }

        $category->delete(); // les produits sont supprimés grâce à cascade
        return response()->json(['message' => 'Catégorie supprimée avec succès']);
    }


}
