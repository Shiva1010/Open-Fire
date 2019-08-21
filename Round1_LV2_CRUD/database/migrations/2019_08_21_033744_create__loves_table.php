<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Loves', function (Blueprint $table) {
            $table->bigIncrements('Lid');
            $table->string('Lname');
            $table->string('Lemail')->unique();
            $table->timestamp('Lemail_verified_at')->nullable();
            $table->string('Lpassword');
            $table->rememberToken();
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
        Schema::dropIfExists('Loves');
    }
}
