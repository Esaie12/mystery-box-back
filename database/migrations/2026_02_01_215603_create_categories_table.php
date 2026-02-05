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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); 
            $table->string('title');         // titre obligatoire
            $table->string('subtitle')->nullable();    // subtitle optionnel
            $table->text('description')->nullable();  // description optionnel
            $table->string('mystery')->nullable();    // mystery optionnel
            $table->string('icon')->nullable();       // icon optionnel
            $table->string('color');                 // couleur obligatoire
            $table->integer('price'); // prix optionnel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
