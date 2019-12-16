<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHebergementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hebergements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agence_id')->unsigned()->nullable();
            $table->string('nom');
            $table->string('adresse');
            $table->integer('nombre_etage')->nullable();
            $table->integer('nombre_chambre')->nullable();
            $table->bigInteger('telephone')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(false);
            $table->string('date_operation');
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
        Schema::dropIfExists('hebergements');
    }
}
