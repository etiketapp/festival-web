<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('address');
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedInteger('city_id');
            $table->foreign('city_id')->references('id')
                ->on('cities')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('county_id');
            $table->foreign('county_id')->references('id')
                ->on('counties')->onUpdate('cascade')->onDelete('cascade');

            $table->morphs('addressable');
        });

        DB::statement("ALTER TABLE addresses ADD COLUMN location POINT AFTER address");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
