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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();

            $table->string('title', 255);
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('color');

            //Relación con la tabla doctor
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');

            //Relación con la tabla consultorios
            $table->unsignedBigInteger('consultorio_id');
            $table->foreign('consultorio_id')->references('id')->on('consultorios')->onDelete('cascade');

            //Relación con la tabla usuarios para saber que usuarios ha hecho esta reserva
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
