<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Title');
            $table->string('Caption');
            $table->unsignedInteger('Height');
            $table->unsignedInteger('Width');
            $table->unsignedInteger('id_review');
            //$table->binary('user_image');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE images ADD user_image LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
