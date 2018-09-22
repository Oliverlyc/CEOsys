<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTydsmembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tydsmembers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id', 10)->unique();
            $table->string('name', 20);
            $table->string('class',10);
            $table->tinyInteger('gender');
            $table->string('major',20);
            $table->string('tel', 11);
            $table->string('direction',10);
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
        Schema::dropIfExists('tydsmembers');
    }
}
