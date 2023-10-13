<?php

use App\Models\Classes;
use App\Models\Semestre;
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
        Schema::create('classe_semestres', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Classes::class)->constrained();
            $table->foreignIdFor(Semestre::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_semestres');
    }
};
