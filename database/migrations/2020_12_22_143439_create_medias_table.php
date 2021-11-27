<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('title');
            $table->string('link');
            $table->boolean('selected');
            $table->unsignedBigInteger('gallery_id');
            $table->timestamps();
            //definir les clés étrangeres
            $table->foreign('gallery_id')
                ->references('id')
                ->on('galleries')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medias');
    }
}
