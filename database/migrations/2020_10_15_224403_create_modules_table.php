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
            $table->integer('faculty_id');
            $table->timestamps();
        });

        Schema::create('module_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
        });

        Schema::create('module_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        DB::table('module_user')->insert(
            array(
                'module_id' => 1,
                'user_id' => 3,
            )
        );

        DB::table('module_tag')->insert(
            array(
                'module_id' => 1,
                'tag_id' => 1,
            )
        );
        DB::table('module_tag')->insert(
            array(
                'module_id' => 1,
                'tag_id' => 2,
            )
        );
        
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
                'faculty_id' => 1,
            )
        );

        DB::table('modules')->insert(
            array(
                'name' => 'Skaitiniai metodai2',
                'code' => 'SM453215',
                'degree' => 'Bachelor',
                'language' => 'Lithuanian',
                'type' => 'Computer science',
                'semester' => 'Second',
                'credits' => 6,
                'year' => '3',
                'isMandatory' => true,
                'faculty_id' => 1,
            )
        );

        DB::table('modules')->insert(
            array(
                'name' => 'Skaitiniai metodai3',
                'code' => 'SM453215',
                'degree' => 'Bachelor',
                'language' => 'Lithuanian',
                'type' => 'Computer science',
                'semester' => 'Second',
                'credits' => 6,
                'year' => '3',
                'isMandatory' => true,
                'faculty_id' => 1,
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
