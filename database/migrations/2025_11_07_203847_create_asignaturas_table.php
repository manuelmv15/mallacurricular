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
    Schema::create('asignaturas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 10)->unique();
            $table->string('nombre');
            // Obligatoria | Electiva
            $table->enum('tipo', ['Obligatoria', 'Electiva']);
            // Puedes elegir: default(0) o nullable()
            $table->decimal('nota', 4, 2)->nullable()->default(null); // o ->default(0)
            // Guardaremos los prerequisitos como JSON con códigos (p.ej. ["MAT155","MEX155"])
            $table->tinyInteger('ciclo')->nullable();
            $table->json('prerequisitos')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('asignaturas');
    }
};
