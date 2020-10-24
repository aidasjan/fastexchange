<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question');
            $table->string('answer');
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->integer('points');
            $table->unsignedBigInteger('language_level_id');
            $table->timestamps();
        });
        DB::table('test_questions')->insert([
            'question' => 'q1', 
            'answer' => 'a',
            'a' => 'aaa',
            'b' => 'bbb',
            'c' => 'ccc',
            'points' => '10',
            'language_level_id' => '1',
        ]);
        DB::table('test_questions')->insert([
            'question' => 'q2', 
            'answer' => 'b',
            'a' => 'aaa',
            'b' => 'bbb',
            'c' => 'ccc',
            'points' => '10',
            'language_level_id' => '1',
        ]);
        DB::table('test_questions')->insert([
            'question' => 'q3', 
            'answer' => 'c',
            'a' => 'aaa',
            'b' => 'bbb',
            'c' => 'ccc',
            'points' => '20',
            'language_level_id' => '2',
        ]);
        DB::table('test_questions')->insert([
            'question' => 'q4', 
            'answer' => 'a',
            'a' => 'aaa',
            'b' => 'bbb',
            'c' => 'ccc',
            'points' => '20',
            'language_level_id' => '2',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_questions');
    }
}
