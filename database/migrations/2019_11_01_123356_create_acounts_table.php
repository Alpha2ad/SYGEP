<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pelerin_id')->unsigned();
            $table->integer('agence_id')->unsigned()->nullable();
            $table->string('nom');
            $table->foreign('pelerin_id')
                ->references('id')->on('pelerins')
                ->onDelete('cascade');
            $table->foreign('agence_id')
                ->references('id')->on('agences')
                ->onDelete('cascade');
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
        Schema::dropIfExists('acounts');
    }
}
