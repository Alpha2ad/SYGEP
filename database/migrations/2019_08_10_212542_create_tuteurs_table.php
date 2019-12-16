<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuteurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agence_id')->unsigned();
            $table->string('nom');
            // $table->string('prenom');
            $table->string('date_operation');
            $table->bigInteger('telephone');
            $table->string('email');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('tuteurs');
    }
}
