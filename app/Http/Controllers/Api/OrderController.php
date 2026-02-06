<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\User\OrderCreatedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Category;

class OrderController extends Controller
{
    /**
     * Liste des commandes
     */
    public function index()
    {
        $orders = Order::with([
                'category:id,title',
                'items.product:id,name,icon'
            ])
            ->latest()
            ->paginate(10); // pagination propre

        return response()->json($orders);
    }

    /** Créer une commande */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',

            'recipientName' => 'required|string|max:255',
            'recipientSexe' => 'required|in:Femme,Homme,Autre',

            'message' => 'nullable|string|max:500',
            'anonymous' => 'boolean',

            'recipientTel' => 'required|string|max:20',
            'recipientAddress' => 'required|string',

            'dateDelivery' => 'required|date',
            'instructionDelivery' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction(); // ⬅️ Début de la transaction

        try {
            $user = $request->user();

            $category = Category::find($validated['category_id']);

            $order = Order::create([
                'user_id'=>$user->id,
                'reference'=> "MLB-".(Order::count()+1).rand(100,999),
                // Recipient
                'recipient_name' => $validated['recipientName'],
                'recipient_sex' => $validated['recipientSexe'],

                // Message
                'message' => $validated['message'] ?? null,
                'anonymous' => $validated['anonymous'] ?? false,

                // Delivery
                'phone' => $validated['recipientTel'],
                'address' => $validated['recipientAddress'],
                'delivery_date' => $validated['dateDelivery'],
                'delivery_instructions' => $validated['instructionDelivery'] ?? null,

                // Relations
                'category_id' => $validated['category_id'],

                // Prix (fixe pour l’instant)
                'amount' =>  $category->price,
            ]);

            //Le choix du produit
            $sexe = $validated['recipientSexe'];

            $compatibles = match ($sexe) {
                'Homme' => ['all', 'homme'],
                'Femme' => ['all', 'femme'],
                default => ['all'],
            };

            // Récupérer 2 produits aléatoires de la catégorie
            $products = Product::where('category_id', $validated['category_id'])
            ->whereIn('compatible', $compatibles)
            ->inRandomOrder()->take(2)->get();

            // Creer les order items
            foreach ($products as $product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => 1,
                ]);
            }

            //Envoyer le mail de commande à la personne

            DB::commit();

            Mail::to( $user->email )->send(new OrderCreatedMail($order));

            return response()->json([
                'message' => 'Commande créée avec succès',
                'order_id' => $order->id,
                'products'=> $products
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack(); // ⬅️ Annuler la transaction si une erreur survient

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création de la commande',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Détail d'une commande
     */
    public function show($id)
    {
        //$order = Order::with(['category', 'product'])->find($id);

        $order = Order::with(['category'])->where('reference',$id)->first();

        return response()->json($order); 

    }


    // Liste toutes les commandes de l'utilisateur connecté
    public function myorders_users(Request $request)
    {
       $user = $request->user();

        $orders = Order::orderBy('created_at', 'desc')->with('category','status') //'orderItems.product', 
            ->where('user_id', $user->id)
            ->get();

        return response()->json([
            'success' => true,
            'orders' => $orders
        ]);
    }

    //Les stats
    public function summary_order_users(Request $request)
    {
        $user = $request->user(); // Utilisateur connecté

        // Total commandes
        $totalOrders = Order::where('user_id', $user->id)->count();

        // Montant total
        $totalAmount = Order::where('user_id', $user->id)->sum('amount');

        // Commandes en cours (statuts : En préparation, En livraison)
        $inProgress = Order::where('user_id', $user->id)->where('status_id','<',3)->count();

        return response()->json([
            'total_orders' => $totalOrders,
            'total_amount' => $totalAmount,
            'in_progress' => $inProgress,
        ]);
    }

}
