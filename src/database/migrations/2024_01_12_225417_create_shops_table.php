<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('area_id')->unsigned();
            $table->bigInteger('genre_id')->unsigned();

            $table->text('overview');
            $table->string('image');
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->dropForeign(['area_id']);
            $table->dropForeign(['genre_id']);
        });

        Schema::dropIfExists('shops');
    }
}
