<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Category;
use App\Models\Status;

class OrderController extends Controller
{
    //Liste des commandes
    public function index()
    {
        $orders = Order::with(['user', 'status', 'items.product', 'category'])->get();

        return response()->json([
            'orders' => $orders
        ]);
    }

    //Voir une commande avec son user, items, produits, status
    public function show($id)
    {
        $order = Order::with(['user', 'status', 'items.product', 'category'])->where('reference',$id)->first();

        if (!$order) {
            return response()->json([
                'message' => 'Commande introuvable'
            ], 404);
        }

        return response()->json($order);
    }

    /**
     * Changer le statut d'une commande
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_id' => 'required|exists:status,id'
        ]);

        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                'message' => 'Commande introuvable'
            ], 404);
        }

        $order->status_id = $request->status_id;
        $order->save();

        return response()->json([
            'message' => 'Statut mis à jour avec succès',
            'order' => $order->load(['status', 'user'])
        ]);
    }

    //Stats des commandes  ( total, nombre_commande par les status existant , chiffre d'affire qui se base sur les commande livré )
    public function stats()
    {
        $totalOrders = Order::count();

        // Nombre de commandes par statut
        $ordersByStatus = Status::withCount('orders')->where('id','<',3)->get()->map(function($status) {
            return [
                'status' => $status->title,
                'emoji' => $status->emoji,
                'count' => $status->orders_count
            ];
        });

        // Chiffre d'affaire basé sur les commandes livrées
        $revenue = Order::where('status_id', 3)->sum('amount');

        return response()->json([
            'total_orders' => $totalOrders,
            'orders_by_status' => $ordersByStatus,
            'revenue' => $revenue
        ]);
    }
    
}
