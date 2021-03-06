<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrawUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draw_users', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_joined')->default(false);
            $table->timestamps();

            $table->unsignedInteger('draw_id');
            $table->foreign('draw_id')->references('id')
                ->on('draws')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('winner_id_first')->nullable();
            $table->foreign('winner_id_first')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('winner_id_second')->nullable();
            $table->foreign('winner_id_second')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('draw_users');
    }
}
