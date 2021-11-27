<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('url')->nullable();
            $table->string('title');
            $table->string('meta_description');
            $table->string('cover_photo');
            $table->text('content_text');
            $table->boolean('published')->default(1);
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
        Schema::dropIfExists('articles');
    }
}
