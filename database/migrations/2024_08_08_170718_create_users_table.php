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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('admin')->default(false);
            $table->string('rut');
            $table->string('nombre');
            $table->string('password');
            $table->string('email', 100);
            $table->timestamps();
        });

         // Crear un usuario al migrar
    DB::table('users')->insert([
        'admin' => '1',
        'rut' => 'admin',
        'nombre' => 'admin',
        'email' => 'sebba500@hotmail.com',
        'password' => Hash::make('12345'), // Encriptar la contraseña
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
