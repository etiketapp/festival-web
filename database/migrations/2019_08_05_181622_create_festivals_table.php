<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('sub_title');
            $table->text('content');
            $table->text('place');
            $table->decimal('price');
            $table->text('about');
            $table->date('date');
            $table->timestamps();

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')
                ->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });

        DB::statement("ALTER TABLE festivals ADD COLUMN location POINT AFTER about");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('festivals');
    }
}
