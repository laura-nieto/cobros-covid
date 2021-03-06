<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->softDeletes('deleted_at');
            $table->timestamps();
        });
        Schema::create('sucursales_usuarios',function(Blueprint $table){
            $table->id();
            $table->foreignId('sucursal_id')->nullable()->constrained('sucursales')->onDelete('cascade');
            $table->foreignId('usuario_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->float('precio');
            $table->foreignId('sucursal_id')->constrained('sucursales')->onDelete('cascade');
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('sucursals');
    }
}
