<?php

class OrderService{

    public function create(array $validated, $user){
        DB::beginTransaction();

        try {

            $category = Category::findOrFail($validated['category_id']);

            $order = Order::create([
                'user_id' => $user->id,
                'reference'=> "MLB-".(Order::count()+1).rand(100,999),

                'recipient_name' => $validated['recipientName'],
                'recipient_sex' => $validated['recipientSexe'],

                'message' => $validated['message'] ?? null,
                'anonymous' => $validated['anonymous'] ?? false,

                'phone' => $validated['recipientTel'],
                'address' => $validated['recipientAddress'],
                'delivery_date' => $validated['dateDelivery'],
                'delivery_instructions' => $validated['instructionDelivery'] ?? null,

                'category_id' => $validated['category_id'],
                'amount' => $category->price,
                'transaction_id' => $validated['transaction_id']
            ]);

            $sexe = $validated['recipientSexe'];

            $compatibles = match ($sexe) {
                'Homme' => ['all', 'homme'],
                'Femme' => ['all', 'femme'],
                default => ['all'],
            };

            $products = Product::where('category_id', $validated['category_id'])
                ->whereIn('compatible', $compatibles)
                ->inRandomOrder()
                ->take(2)
                ->get();

            foreach ($products as $product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => 1,
                ]);
            }

            DB::commit();

            Mail::to($user->email)->send(new OrderCreatedMail($order));

            return [
                'order' => $order,
                'products' => $products
            ];

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}