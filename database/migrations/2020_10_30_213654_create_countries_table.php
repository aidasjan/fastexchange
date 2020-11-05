<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('shortcode');
            $table->string('quality');
            $table->timestamps();
        });

        DB::table('countries')->insert([
            'name' => 'Lithuania', 
            'shortcode' => 'LT',
            'quality' => '70',
        ]);
        
        DB::table('countries')->insert([
            'name' => 'Poland', 
            'shortcode' => 'PL',
            'quality' => '70',
        ]);
        
        DB::table('countries')->insert([
            'name' => 'USA', 
            'shortcode' => 'US',
            'quality' => '80',
        ]);
        
        DB::table('countries')->insert([
            'name' => 'Germany', 
            'shortcode' => 'DE',
            'quality' => '90',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
