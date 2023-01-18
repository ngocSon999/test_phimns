<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('country_id');
            $table->string('title');
            $table->string('name_eng');
            $table->longText('description');
            $table->string('slug');
            $table->string('image_path');
            $table->string('trailer')->nullable();
            $table->integer('season')->default(1);
            $table->integer('year_movie')->default(2022);
            $table->tinyInteger('movie_host')->default(0);
            $table->text('tag_movie')->nullable();;
            $table->string('movie_duration');
            $table->string('resolution');
            $table->tinyInteger('vietsub')->default(0);
            $table->integer('count_view')->default(0);
            $table->integer('total_movie')->default(1);
            $table->integer('top_view')->default(0);
            $table->tinyInteger('status')->default(0);

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
        Schema::dropIfExists('movies');
    }
}
