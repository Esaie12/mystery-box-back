<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Liste des produits
    public function index()
    {
        $products = Product::with('category')->get();
        return response()->json(['products' => $products]);
    }

    // Voir un produit précis
    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json(['message' => 'Produit introuvable'], 404);
        }

        return response()->json($product);
    }

    // Créer un produit
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'icon' => 'nullable|string|max:255',
            'compatible' => 'nullable|string|max:255'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'icon' => $request->icon,
            'compatible' => $request->compatible
        ]);

        return response()->json([
            'message' => 'Produit créé avec succès',
            'product' => $product->load('category')
        ], 201);
    }

    // Modifier un produit
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produit introuvable'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'category_id' => 'sometimes|required|exists:categories,id',
            'icon' => 'nullable|string|max:255',
            'compatible' => 'nullable|string|max:255'
        ]);

        $product->update($request->only(['name', 'category_id', 'icon', 'compatible']));

        return response()->json([
            'message' => 'Produit mis à jour avec succès',
            'product' => $product->load('category')
        ]);
    }

    // Supprimer un produit
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produit introuvable'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Produit supprimé avec succès']);
    }
}
