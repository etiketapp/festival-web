<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('platform', ['android', 'ios', 'apns']);
            $table->string('token')->index();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('device_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
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
        Schema::dropIfExists('devices');
    }
}