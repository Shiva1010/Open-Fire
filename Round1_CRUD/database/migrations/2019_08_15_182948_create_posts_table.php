<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            Schema::create('posts', function (Blueprint $table) {
                $table->increments('id');                  // ID 自動遞增，使用相當於「big integer、BIGINT」型態
                $table->unsignedInteger('user_id');        // 無符號整數unsigned Integer
                $table->string('title');
                $table->string('content');
                $table->timestamps();
            });

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
