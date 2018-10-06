<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTydsTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyds_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('studentA_id', 10);
            $table->string('studentB_id', 10);
            $table->string('subject',1)->nullable();
            $table->tinyInteger('level')->default(0);
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
        Schema::dropIfExists('tyds_teams');
    }
}
