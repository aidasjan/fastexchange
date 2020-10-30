<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type');
            $table->string('code');
            $table->string('establishmentdate');
            $table->timestamps();
        });

        Schema::create('faculty_module', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('faculty_id');
            $table->unsignedBigInteger('module_id');
            $table->timestamps();
        });

        
        DB::table('faculty_module')->insert(
            array(
                'faculty_id' => 1,
                'module_id' => 1,
            )
        );

        DB::table('faculty_module')->insert(
            array(
                'faculty_id' => 1,
                'module_id' => 2,
            )
        );

        DB::table('faculties')->insert(
            array(
                'name' => 'Informatics',
                'code' => 'IT454545',
                'type' => 'Computer science',
                'establishmentdate' => '25-02-1990',
            )
        );

        DB::table('faculties')->insert(
            array(
                'name' => 'Mathexl',
                'code' => 'MT454545',
                'type' => 'Math',
                'establishmentdate' => '25-02-1992',
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
        Schema::dropIfExists('faculties');
    }
}
