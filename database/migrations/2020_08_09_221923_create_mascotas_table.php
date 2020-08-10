<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            /* Fields */
            $table->id()->unique();
            $table->string('description');
            $table->string('photo');
            $table->string('name');
            $table->string('owner');
            $table->timestamps();
            /* Constrains */
            $table->foreign('owner')->references('email')->on('clientes');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
}
