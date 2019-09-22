<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('message');
            $table->time('date');
            $table->timestamps();

            $table->unsignedInteger('user_one_id');
            $table->foreign('user_one_id')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('user_two_id');
            $table->foreign('user_two_id')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('conversation_id');
            $table->foreign('conversation_id')->references('id')
                ->on('conversations')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
