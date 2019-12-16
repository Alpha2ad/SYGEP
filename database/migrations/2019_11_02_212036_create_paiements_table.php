<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('date_operation');
            $table->bigInteger('acount_id')->unsigned();
            $table->integer('agence_id')->unsigned()->nullable();
            $table->integer('agent_id')->unsigned()->nullable();
            $table->integer('comptable_id')->unsigned()->nullable();
            $table->double('montant');
            $table->text('description')->nullable();
            $table->boolean('status')->default(false);
            $table->string('image')->default('default.png');
            $table->foreign('acount_id')
                ->references('id')->on('acounts')
                ->onDelete('cascade');
            $table->foreign('agent_id')
                ->references('id')->on('agents');
            $table->foreign('comptable_id')
                ->references('id')->on('comptables');
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
        Schema::dropIfExists('paiements');
    }
}
