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
        Schema::create('ordenes_compra', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('numero')->nullable();
            $table->string('cotizacion', 50)->nullable();
            $table->string('forma_pago', 100);
            $table->integer('id_proveedor');
            $table->dateTime('fecha_creacion');
            $table->integer('estado');
            $table->integer('monto_orden');
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
        Schema::dropIfExists('ordenes_compra');
    }
};
