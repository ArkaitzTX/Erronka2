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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('usuario', 50)->nullable()->unique();;
            $table->string('pass', 250)->nullable();
            $table->integer('rol');
            $table->string('foto', 50);
            $table->string('type', 10);
            // $table->unsignedBigInteger('grupo');
            // $table->foreign('grupo')->references('id')->on('usuarios');
            // $table->integer('grupoV');
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
        Schema::dropIfExists('usuarios');
    }
};
