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
            'question' => 'This application would be ___ best choice for Exchange students', 
            'answer' => 'a',
            'a' => 'the',
            'b' => 'a',
            'c' => 'an',
            'points' => '10',
            'language_level_id' => '1',
        ]);
        DB::table('test_questions')->insert([
            'question' => 'A brown fox jumped over ___ lazy dog', 
            'answer' => 'b',
            'a' => 'the',
            'b' => 'a',
            'c' => 'an',
            'points' => '10',
            'language_level_id' => '1',
        ]);
        DB::table('test_questions')->insert([
            'question' => 'Yesterday I ___ to the university', 
            'answer' => 'a',
            'a' => 'went',
            'b' => 'will go',
            'c' => 'go',
            'points' => '20',
            'language_level_id' => '2',
        ]);
        DB::table('test_questions')->insert([
            'question' => 'A car was riding on the road. ___ same car was red.', 
            'answer' => 'a',
            'a' => 'a',
            'b' => 'an',
            'c' => 'the',
            'points' => '20',
            'language_level_id' => '2',
        ]);
        DB::table('test_questions')->insert([
            'question' => 'What does "coined" mean?', 
            'answer' => 'c',
            'a' => 'Paid',
            'b' => 'Bending coins',
            'c' => 'Devised new word',
            'points' => '20',
            'language_level_id' => '3',
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
