<?php

// database/migrations/xxxx_xx_xx_create_inventory_logs_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Asegúrate de importar DB

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_logs', function (Blueprint $table) {
            $table->id();

            // Define las columnas siempre como unsignedBigInteger
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('prod_id')->nullable();

            // Aplica las claves foráneas condicionalmente para bases de datos que no sean SQLite
            if (! (DB::connection() instanceof \Illuminate\Database\SQLiteConnection)) {
                $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('set null');
                $table->foreign('prod_id')->references('id')->on('products')->onDelete('set null');
            }

            $table->string('action');
            $table->json('old_data')->nullable();
            $table->json('new_data');
            $table->timestamps();
        });

        // Este PRAGMA solo es relevante para SQLite, y asegura que las FKs se respeten
        // si se definen a nivel de aplicación o en otras migraciones.
        // En tu caso, si no las defines condicionalmente para SQLite, esta línea es menos crítica
        // pero no hace daño.
        if (DB::connection() instanceof \Illuminate\Database\SQLiteConnection) {
            DB::statement('PRAGMA foreign_keys=ON;');
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory_logs');
    }
};