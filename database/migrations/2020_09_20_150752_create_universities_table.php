<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('postal_code');
            $table->string('website');
            $table->string('email');
            $table->string('phone_number');
            $table->timestamps();
        });

        Schema::create('faculty_university', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('faculty_id');
            $table->timestamps();
        });

        DB::table('faculty_university')->insert(
            array(
                'university_id' => 1,
                'faculty_id' => 1,
            )
        );

        DB::table('faculty_university')->insert(
            array(
                'university_id' => 1,
                'faculty_id' => 2,
            )
        );



        $init_items = array(
            ["Kaunas University of Technology", "Lithuania", "Kaunas", "Studentu st.", "LT50000", "ktu.edu", "ktu@ktu.edu", "+370555"],
            ["Vilnius University", "Lithuania", "Vilnius", "Vinlius st.", "LT60000", "vu.lt", "vu@vu.lt", "+370666"],
        );

        foreach($init_items as $item){
            DB::table('universities')->insert([
                'name' => $item[0], 
                'country' => $item[1],
                'city' => $item[2], 
                'address' => $item[3], 
                'postal_code' => $item[4], 
                'website' => $item[5], 
                'email' => $item[6], 
                'phone_number' => $item[7], 
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
        Schema::dropIfExists('universities');
    }
}
