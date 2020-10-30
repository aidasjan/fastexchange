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
            $table->unsignedBigInteger('university_id');
            $table->timestamps();
        });

        DB::table('faculties')->insert(
            array(
                'id' => '1',
                'name' => 'Informatics',
                'code' => 'IT454545',
                'type' => 'Computer science',
                'university_id' => '1',
                'establishmentdate' => '25-02-1990',
            )
        );

        DB::table('faculties')->insert(
            array(
                'id' => '2',
                'name' => 'Math',
                'code' => 'MT454545',
                'type' => 'Math',
                'university_id' => '1',
                'establishmentdate' => '25-02-1992',
            )
        );

        DB::table('faculties')->insert(
            array(
                'id' => '3',
                'name' => 'IT',
                'code' => 'I555',
                'type' => 'Informatics',
                'university_id' => '2',
                'establishmentdate' => '25-02-1990',
            )
        );

        DB::table('faculties')->insert(
            array(
                'id' => '4',
                'name' => 'Mathemathics',
                'code' => 'MT454545',
                'type' => 'Math',
                'university_id' => '2',
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
