<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hebergement_id')->unsigned()->nullable();
            $table->integer('agence_id')->unsigned()->nullable();
            $table->string('nom');
            $table->integer('nombre_place');
            $table->boolean('status')->default(false);
            $table->string('date_operation');
            $table->text('description')->nullable();
            $table->foreign('hebergement_id')
                  ->references('id')->on('hebergements');
             $table->foreign('agence_id')
                ->references('id')->on('agences')
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
        Schema::dropIfExists('logements');
    }
}
