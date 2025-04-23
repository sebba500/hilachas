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
        Schema::create('inventario_prendas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_producto_textil');
            $table->integer('id_tipo_tejido');
            $table->integer('id_material_textil');
            $table->string('origen', 200);
            $table->string('color', 200);
            $table->string('color_codigo', 15);
            $table->string('estampado', 200);
            $table->tinyInteger('procesada');
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
        Schema::dropIfExists('inventario_prendas');
    }
};
