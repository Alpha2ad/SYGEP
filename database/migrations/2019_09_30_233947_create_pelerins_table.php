<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelerinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelerins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agence_id')->unsigned()->nullable();
            $table->integer('agent_id')->unsigned()->nullable();
            $table->bigInteger('convoit_id')->unsigned()->nullable();
            $table->bigInteger('tuteur_id')->unsigned()->nullable();
            $table->string('date_operation');
            $table->string('nom');
            $table->string('prenom');
            $table->string('type');
            $table->bigInteger('telephone');
            $table->string('num_passeport')->unique();
            $table->string('id_pelerin')->unique();
            $table->string('date_naissance');
            $table->string('date_delivrance');
            $table->string('date_expiration');
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('visa')->default(false);
            $table->string('image')->default('default.png');
            $table->foreign('agence_id')
                ->references('id')->on('agences')
                ->onDelete('cascade');
            $table->foreign('agent_id')
                ->references('id')->on('agents');
            $table->foreign('convoit_id')
                ->references('id')->on('convoits');
             $table->foreign('tuteur_id')
                ->references('id')->on('tuteurs')
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
        Schema::dropIfExists('pelerins');
    }
}
