<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_materias_primas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_material_textil');
            $table->string('color', 200);
            $table->string('color_codigo', 15);
            $table->decimal('peso', 5, 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventario_materias_primas');
    }
};
