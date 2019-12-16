<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenceProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agence_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('agence_id')->index();
            $table->string('nom');
            $table->string('prenom');
            $table->bigInteger('telephone');
            $table->text('about')->nullable();
            $table->string('image')->default('default.png');
            $table->foreign('agence_id')
                ->references('id')->on('agences');
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
        Schema::dropIfExists('agence_profiles');
    }
}
