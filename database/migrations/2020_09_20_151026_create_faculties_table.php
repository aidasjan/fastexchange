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

        
        DB::table('faculties')->insert(
            array(
                'name' => 'Informatics',
                'code' => 'IT454545',
                'type' => 'Computer science',
                'establishmentdate' => '25-02-1990',
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
