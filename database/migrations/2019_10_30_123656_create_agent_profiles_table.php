<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('agent_id')->index() ;
            $table->string('nom');
            $table->string('prenom');
            $table->bigInteger('telephone');
            $table->text('about')->nullable();
            $table->string('image')->default('default.png');
            $table->foreign('agent_id')
                ->references('id')->on('agents')
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
        Schema::dropIfExists('agent_profiles');
    }
}
