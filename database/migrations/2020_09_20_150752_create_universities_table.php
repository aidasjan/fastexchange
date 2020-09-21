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
            $table->timestamps();
        });

        $init_items = array(
            ["Kaunas University of Technology", "Lithuania", "Kaunas", "Studentu st.", "LT50000"],
            ["Vilnius University", "Lithuania", "Vilnius", "Vinlius st.", "LT60000"],
        );

        foreach($init_items as $item){
            DB::table('universities')->insert([
                'name' => $item[0], 
                'country' => $item[1],
                'city' => $item[2], 
                'address' => $item[3], 
                'postal_code' => $item[4], 
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
