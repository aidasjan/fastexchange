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

        $init_items = array(
            [1, 1],
            [1, 2],
            [2, 1],
            [2, 2],
            [3, 1],
            [4, 1],
            [5, 2],
            [6, 2],
            [7, 1],
            [8, 2],
            [9, 3],
            [10, 3],
            [11, 4],
            [12, 4],
        );

        foreach($init_items as $item){
            DB::table('module_tag')->insert([
                'module_id' => $item[0], 
                'tag_id' => $item[1],
            ]);
        }

        $init_items = array(
            ["Skaitiniai metodai", "SM453215", "Bachelor", "Lithuanian", "IT", "Second", "6", "3", true, "1"],
            ["Skaitiniai metodai ir algoritmai", "SM453215", "Bachelor", "Lithuanian", "IT", "Second", "6", "3", true, "3"],
            ["Programavimas", "SM453215", "Bachelor", "Lithuanian", "IT", "Second", "6", "3", true, "1"],
            ["Programavimas C#", "SM453215", "Bachelor", "Lithuanian", "IT", "Second", "6", "3", true, "3"],
            ["Matematika", "SM453215", "Bachelor", "Lithuanian", "IT", "Second", "6", "3", true, "2"],
            ["Matematikos pagrindai", "SM453215", "Bachelor", "Lithuanian", "IT", "Second", "6", "3", true, "4"],
            ["Informatika", "SM453215", "Bachelor", "Lithuanian", "IT", "Second", "6", "3", true, "1"],
            ["Geometrija", "SM453215", "Bachelor", "Lithuanian", "IT", "Second", "6", "3", true, "4"],
            ["Medijų filosofija", "SM453215", "Bachelor", "Lithuanian", "IT", "Second", "6", "3", true, "2"],
            ["Filosofija", "SM453215", "Bachelor", "Lithuanian", "IT", "Second", "6", "3", true, "4"],
            ["Archeologija", "SM453215", "Bachelor", "Lithuanian", "IT", "Second", "6", "3", true, "2"],
            ["Archeologijos pagrindai", "SM453215", "Bachelor", "Lithuanian", "IT", "Second", "6", "3", true, "4"],
        );

        foreach($init_items as $item){
            DB::table('modules')->insert([
                'name' => $item[0], 
                'code' => $item[1],
                'degree' => $item[2], 
                'language' => $item[3], 
                'type' => $item[4],
                'semester' => $item[5],
                'credits' => $item[6],
                'year' => $item[7],
                'isMandatory' => $item[8],
                'faculty_id' => $item[9],
            ]);
        }
        
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
