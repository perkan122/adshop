<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePervajzWallWidthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pervajz_wall_widths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('door_type_id');
            $table->string('name');
            $table->string('name_en');
            $table->string('price');
            $table->string('image_path');
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
        Schema::dropIfExists('pervajz_wall_widths');
    }
}
