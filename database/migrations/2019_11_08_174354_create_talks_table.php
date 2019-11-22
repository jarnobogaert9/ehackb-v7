<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('speaker');
            $table->string('photo');
            $table->text('excerpt');
            $table->text('body');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('max_places');
            $table->integer('available_places');
            $table->timestamps();
        });

        Schema::create('talk_user', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->unsignedBigInteger('talk_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->unique(['talk_id', 'user_id']);
            $table->foreign('talk_id')->references('id')->on('talks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talk_user');
        Schema::dropIfExists('talks');
    }
}
