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
        // user_data table
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',150)->nullable();
            $table->string('apellidos',150)->nullable();
            $table->string('genero',100)->nullable();
            $table->integer('edad')->nullable();
            $table->dateTime('fecha_cumpleaños')->nullable();
            $table->timestamps();
        });
        // skin table
        Schema::create('skins', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',150);
            $table->decimal('precio',8,2);
            $table->string('imagen',250)->nullable();
            $table->boolean('estatus');    
            $table->timestamps();
        });

        // monedas_compra table
        Schema::create('monedas_compra', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',150);
            $table->decimal('precio',8,2);
            $table->float('monedas');
            $table->boolean('estatus');
            $table->timestamps();
        });
        // monedas compra usuarios table
        Schema::create('monedas_user', function (Blueprint $table) {
            $table->id();
            $table->float('monedas')->nullable();
            $table->integer('user_id');
            $table->timestamps();
        });
        // inventario table
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_item');
            $table->integer('user_id');
            $table->timestamps();
        });
        // skin_user table
        Schema::create('skin_user', function (Blueprint $table) {
            $table->id();
            $table->integer('skin_id');
            $table->integer('user_id');
            $table->timestamps();
        });
        // historial_compras_user
        Schema::create('historial_compras_user', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_compra',150);
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data');
        Schema::dropIfExists('skins');
        Schema::dropIfExists('monedas_compra');
        Schema::dropIfExists('monedas_user');
        Schema::dropIfExists('inventario');
        Schema::dropIfExists('skin_user');
        Schema::dropIfExists('historial_compras_user');

    }
};
