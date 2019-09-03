<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionFiguresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_figures', function (Blueprint $table) {
          $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('serie_id')->nullable();
            $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade');   //cascade fa sì che eliminando la category si elimino anche i comics ad essa connessi
            // $table->string('brand');
            $table->float('price');
            $table->integer('height')->unsigned()->index();
            $table->string('material');
            $table->integer('year_of_production')->unsigned()->index();
            // $table->string('made_in');
            // $table->string('new_or_used')->unique();
            $table->string('media', 400)->nullable();
            $table->integer('quantity');
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
        Schema::dropIfExists('action_figures');
    }
}
