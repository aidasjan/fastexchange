<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('language_levels')->insert([
            'code' => 'A2', 
            'description' => 'Low',
        ]);
        DB::table('language_levels')->insert([
            'code' => 'B1', 
            'description' => 'Moderate',
        ]);
        DB::table('language_levels')->insert([
            'code' => 'B2', 
            'description' => 'Advanced',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_levels');
    }
}
