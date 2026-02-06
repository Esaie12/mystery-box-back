<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            // Recipient info
            $table->string('recipient_name');
            $table->enum('recipient_sex', ['Femme', 'Homme', 'Autre']);

            // Message
            $table->text('message')->nullable();
            $table->boolean('anonymous')->default(false);

            // Delivery info
            $table->string('phone');
            $table->text('address');
            $table->date('delivery_date');
            $table->string('delivery_instructions')->nullable();

            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('status_id')->default(1)->nullable()->constrained('status')->nullOnDelete();
           
            // Payment info
            $table->decimal('amount', 10, 2)->default(0); 
            $table->string('transaction_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
