<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('admin')->default(false);
            $table->string('rut');
            $table->string('nombre');
            $table->string('password');
            $table->string('email', 100);
            $table->timestamps();
        });

        DB::table('users')->insert([
            'admin' => true,
            'rut' => 'admin',
            'nombre' => 'admin',
            'password' => '$2y$10$3oBZPBkLbgWR3kfKRw8OX.G5.576P0Y1SAP/6ZifJaXli4bwDSVtO', 
            'email' => 'sebba500@hotmail.com',
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
