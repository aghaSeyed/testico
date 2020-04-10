<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('type');
            $table->string('description')->nullable();
            $table->string('time');
            $table->string('start');
            $table->string('end');
            $table->longText('questions');
            $table->integer('teacher_id')->unsigned()->index();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');;
            $table->integer('room_id')->unsigned()->index();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');;
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
        Schema::dropIfExists('exams');
    }
}
