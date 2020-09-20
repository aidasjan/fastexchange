<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('roles')->insert(
            array(
                'id' => 1,
                'code' => 'admin',
                'name' => 'Admin',
            )
        );
        DB::table('roles')->insert(
            array(
                'id' => 2,
                'code' => 'employee',
                'name' => 'University employee',
            )
        );
        DB::table('roles')->insert(
            array(
                'id' => 3,
                'code' => 'student',
                'name' => 'Student',
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
        Schema::dropIfExists('roles');
    }
}
