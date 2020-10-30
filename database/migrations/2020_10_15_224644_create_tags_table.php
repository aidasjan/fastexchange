<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->timestamps();
        });

        DB::table('tags')->insert(
            array(
                'name' => 'Math',
                'code' => 'SM453215',
            )
        );

        DB::table('tags')->insert(
            array(
                'name' => 'Computer science',
                'code' => 'SC453215',
            )
        );

        DB::table('tags')->insert(
            array(
                'name' => 'Philosophy',
                'code' => 'SP453215',
            )
        );

        DB::table('tags')->insert(
            array(
                'name' => 'Archaeology',
                'code' => 'SA453215',
            )
        );

        DB::table('tags')->insert(
            array(
                'name' => 'Architecture / Built Environment',
                'code' => 'SB453215',
            )
        );

        DB::table('tags')->insert(
            array(
                'name' => 'English Language & Literature',
                'code' => 'SE453215',
            )
        );

        DB::table('tags')->insert(
            array(
                'name' => 'History',
                'code' => 'SH453215',
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
        Schema::dropIfExists('tags');
    }
}
