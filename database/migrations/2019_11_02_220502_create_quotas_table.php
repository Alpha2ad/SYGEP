<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date_operation');
            $table->unsignedInteger('agence_id')->index() ;
            $table->bigInteger('quota_agence');
            $table->text('description');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('quotas');
    }
}
