<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdonancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pelerin_id')->unsigned()->index();
            $table->Integer('medecin_id')->unsigned()->index();
            $table->string('nom');
            $table->boolean('status')->nullable()->default(false);
            $table->text('description');
            $table->string('date_operation');
            $table->string('certificat');
            $table->foreign('pelerin_id')
                ->references('id')->on('pelerins')
                ->onDelete('cascade');
            $table->foreign('medecin_id')
                ->references('id')->on('medecins');
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
        Schema::dropIfExists('ordonances');
    }
}
