<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('name')->nullable();
            $table->text('desc')->nullable();
            $table->string('type',50);
            $table->integer('number_photos')->nullable();
            $table->integer('photos_selection')->default(0);
            $table->string('link_zip')->nullable();
            $table->boolean('selection_lock')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            //definir les clés étrangeres
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
