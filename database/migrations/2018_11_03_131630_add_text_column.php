<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTextColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tydsmembers',function(Blueprint $table){
           $table->text('process')->nullable();
           $table->text('problem')->nullable();
        });
        Schema::table('tyds_teams', function(Blueprint $table){
            $table->text('process')->nullable();
            $table->text('problem')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
