<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text');
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('is_confirmed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reviews');
    }
}
