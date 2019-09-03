<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('serie_id');
          $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade');   //cascade fa sì che eliminando la category si elimino anche i comics ad essa connessi
          $table->string('name');
          $table->string('barcode');
          $table->float('price');
          $table->string('exit_number');
          $table->date('exit_date');
          $table->string('publisher');
          $table->string('editorial_series');
          $table->string('media', 400)->nullable();
          $table->unsignedInteger('rare_id')->nullable();
          $table->foreign('rare_id')->references('id')->on('rares')->onDelete('set null');
          $table->integer('quantity');
          $table->timestamps();

           //nella parent table il campo collegato ad un'altra tabella deve avere index()
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}
