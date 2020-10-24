<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestTakingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_takings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('date');
            $table->integer('score');
            $table->timestamps();
        });

        Schema::create('test_taking_test_question', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('test_taking_id');
            $table->unsignedBigInteger('test_question_id');
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
        Schema::dropIfExists('test_takings');
    }
}
