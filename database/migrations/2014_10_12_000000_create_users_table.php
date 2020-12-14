<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->string('phone');
            $table->string('personal_code');
            $table->string('country_id');
            $table->string('city');
            $table->string('address');
            $table->string('postal_code');
            $table->string('relative_name')->nullable();
            $table->string('relative_phone')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('native_language')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('university_id');
            $table->string('role_id')->default('1');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'email' => 'admin@fastexchange.local',
                'name' => 'Admin',
                'surname' => 'Adminas',
                'phone' => '+370',
                'personal_code' => '123456789',
                'country_id' => '1',
                'city' => 'Kaunas',
                'address' => 'Test address 1',
                'postal_code' => 'LT12345',
                'relative_name' => 'Jonas',
                'relative_phone' => '123456',
                'bank_account' => 'LT00000000',
                'native_language' => 'Lithuanian',
                'role_id' => '1',
                'university_id' => '1',
                'password' => Hash::make('jonas123'),
            )
        );
        DB::table('users')->insert(
            array(
                'email' => 'ktu@fastexchange.local',
                'name' => 'KTU',
                'surname' => 'worker',
                'phone' => '+370',
                'personal_code' => '123456789',
                'country_id' => '1',
                'city' => 'Kaunas',
                'address' => 'Test address 3',
                'postal_code' => 'LT12345',
                'relative_name' => 'Jonas',
                'relative_phone' => '123456',
                'bank_account' => 'LT00000000',
                'native_language' => 'Lithuanian',
                'role_id' => '2',
                'university_id' => '1',
                'password' => Hash::make('jonas123'),
            )
        );
        DB::table('users')->insert(
            array(
                'email' => 'vu@fastexchange.local',
                'name' => 'VU',
                'surname' => 'worker',
                'phone' => '+370',
                'personal_code' => '123456789',
                'country_id' => '1',
                'city' => 'Kaunas',
                'address' => 'Test address 3',
                'postal_code' => 'LT12345',
                'relative_name' => 'Jonas',
                'relative_phone' => '123456',
                'bank_account' => 'LT00000000',
                'native_language' => 'Lithuanian',
                'role_id' => '2',
                'university_id' => '2',
                'password' => Hash::make('jonas123'),
            )
        );
        DB::table('users')->insert(
            array(
                'email' => 'jonas@fastexchange.local',
                'name' => 'Jonas',
                'surname' => 'Studentas',
                'phone' => '+370',
                'personal_code' => '123456781',
                'country_id' => '1',
                'city' => 'Kaunas',
                'address' => 'Test address 2',
                'postal_code' => 'LT12345',
                'relative_name' => 'Jonas',
                'relative_phone' => '123456',
                'bank_account' => 'LT00000000',
                'native_language' => 'Lithuanian',
                'role_id' => '3',
                'university_id' => '1',
                'password' => Hash::make('jonas123'),
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
        Schema::dropIfExists('users');
    }
}
