<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_compra', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('numero')->nullable();
            $table->string('cotizacion', 50)->nullable();
            $table->string('forma_pago', 100);
            $table->integer('id_proveedor');
            $table->integer('estado');
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
}
