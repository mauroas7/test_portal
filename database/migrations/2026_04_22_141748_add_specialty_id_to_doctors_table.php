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
    Schema::table('doctors', function (Blueprint $table) {
        // Creamos la columna que apunta al ID de la tabla specialties
        $table->foreignId('specialty_id')->nullable()->constrained('specialties')->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('doctors', function (Blueprint $table) {
        $table->dropForeign(['specialty_id']);
        $table->dropColumn('specialty_id');
    });
}
};
