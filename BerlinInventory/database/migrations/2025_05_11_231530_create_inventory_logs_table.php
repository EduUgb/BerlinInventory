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
       Schema::create('inventory_logs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained('usuarios');
    
    // Cambia a esto:
    $table->unsignedBigInteger('prod_id')->nullable();
    $table->string('action');
    $table->text('old_data')->nullable();
    $table->text('new_data');
    $table->timestamps();
    
    // Añade la FK por separado con condición para SQLite
    if (!DB::connection() instanceof \Illuminate\Database\SQLiteConnection) {
        $table->foreign('prod_id')->references('id')->on('products')->onDelete('set null');
    }
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_logs');
    }
};
