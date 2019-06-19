<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->unsignedBigInteger('category_id')
            ->foreign('category_id')
            ->references('id')
            ->on('categories');

            $table->unsignedBigInteger('post_id')
            ->foreign('post_id')
            ->references('id')
            ->on('posts');

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
        Schema::dropIfExists('category_post');
    }
}
