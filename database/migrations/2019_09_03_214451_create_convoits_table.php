<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvoitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convoits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('agence_id')->unsigned()->nullable();
            $table->bigInteger('phase_id')->unsigned()->index();
            $table->string('nom');
            $table->string('type_vol');
            $table->string('ville_depart');
            $table->string('ville_arriver');
            $table->string('date_depart');
            $table->string('date_arriver');
            $table->string('capacite');
            $table->string('date_operation');
            $table->text('description')->nullable();
            $table->foreign('agence_id')
                  ->references('id')->on('agences');
            $table->foreign('phase_id')
                  ->references('id')->on('phases')
                  ->onDelete('cascade') ;
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
        Schema::dropIfExists('convoits');
    }
}
