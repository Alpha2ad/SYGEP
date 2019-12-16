<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBagagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bagages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pelerin_id')->unsigned()->index();
            $table->bigInteger('phase_id')->unsigned();
            $table->integer('agence_id')->unsigned()->nullable();
            $table->double('poid_bagage');
            $table->integer('nombre_bagages');
            $table->string('date_operation');
            $table->boolean('status')->default(false);
            $table->text('description')->nullable();
            $table->foreign('pelerin_id')
                ->references('id')->on('pelerins')
                ->onDelete('cascade') ;
            $table->foreign('phase_id')
                ->references('id')->on('phases')
                ->onDelete('cascade') ;
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
        Schema::dropIfExists('bagages');
    }
}
