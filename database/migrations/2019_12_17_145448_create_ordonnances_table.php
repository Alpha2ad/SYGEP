<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdonnancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonnances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pelerin_id')->unsigned()->index();
            $table->Integer('medecin_id')->unsigned();
            $table->Integer('agence_id')->unsigned();
            $table->string('nom');
            $table->boolean('status')->nullable()->default(false);
            $table->text('description');
            $table->string('date_operation');
            $table->foreign('pelerin_id')
                ->references('id')->on('pelerins')
                ->onDelete('cascade');
            $table->foreign('medecin_id')
                ->references('id')->on('medecins');
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
        Schema::dropIfExists('ordonnances');
    }
}
