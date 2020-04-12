<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content')->unique();
            $table->integer('type');
            $table->string('slug');
            $table->string('o1')->nullable();
            $table->string('o2')->nullable();
            $table->string('o3')->nullable();
            $table->string('o4')->nullable();
            $table->string('answer')->nullable();
            $table->string('image')->nullable();
            $table->integer('teacher_id')->unsigned()->index();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
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
        Schema::dropIfExists('questions');
    }
}
