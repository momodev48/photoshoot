<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('name');
            $table->string('type',25); //nombre de carateres limité à 25
            $table->text('desc');  //nom de caracteres non limités
            $table->string('link');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            //definir les clés étrangeres
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
