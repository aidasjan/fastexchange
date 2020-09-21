<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('permission_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('permission_id');
            $table->timestamps();
        });

        DB::table('permissions')->insert(
            array(
                'id' => 1,
                'code' => 'manage_users',
                'name' => 'Manage users',
            )
        );
        DB::table('permissions')->insert(
            array(
                'id' => 2,
                'code' => 'manage_roles',
                'name' => 'Manage roles',
            )
        );
        DB::table('permissions')->insert(
            array(
                'id' => 3,
                'code' => 'manage_tests',
                'name' => 'Manage tests',
            )
        );
        DB::table('permissions')->insert(
            array(
                'id' => 4,
                'code' => 'confirm_reviews',
                'name' => 'Confirm reviews',
            )
        );
        DB::table('permissions')->insert(
            array(
                'id' => 5,
                'code' => 'manage_modules',
                'name' => 'Manage modules',
            )
        );
        DB::table('permissions')->insert(
            array(
                'id' => 6,
                'code' => 'take_tests',
                'name' => 'Take tests',
            )
        );
        DB::table('permissions')->insert(
            array(
                'id' => 7,
                'code' => 'participate_in_exchange',
                'name' => 'Participate in exchange',
            )
        );

        $init_roles_perms = array(
            [1, 1],
            [1, 2],
            [1, 3],
            [1, 4],
            [2, 5],
            [3, 6],
            [3, 7],
        );

        foreach($init_roles_perms as $role_perm){
            DB::table('permission_role')->insert([
                'role_id' => $role_perm[0], 
                'permission_id' => $role_perm[1], 
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
        Schema::dropIfExists('permissions');
    }
}
