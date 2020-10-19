<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->string('degree');
            $table->string('language');
            $table->string('type');
            $table->string('semester');
            $table->integer('credits');
            $table->integer('year');
            $table->Boolean('isMandatory');
            $table->timestamps();
        });
        
        DB::table('modules')->insert(
            array(
                'name' => 'Skaitiniai metodai',
                'code' => 'SM453215',
                'degree' => 'Bachelor',
                'language' => 'Lithuanian',
                'type' => 'Computer science',
                'semester' => 'Second',
                'credits' => 6,
                'year' => '3',
                'isMandatory' => true,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
