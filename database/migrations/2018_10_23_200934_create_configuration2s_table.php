<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguration2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuration2s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('basic_configuration_id');
            $table->integer('door_leaf_filling_id')->nullable();
            $table->integer('final_treatment_id')->nullable();
            $table->integer('kanelura_id')->nullable();
            $table->integer('pervajz_wall_width_id')->nullable();
            $table->integer('hinge_id')->nullable();
            $table->integer('doorstep_id')->nullable();
            $table->integer('doorlock_kind_id')->nullable();
            $table->integer('doorlock_type_id')->nullable();
            $table->integer('door_handle_id')->nullable();
            $table->integer('opening_way_id')->nullable();
            $table->integer('track_id')->nullable();
            $table->integer('ventilation_grid_id')->nullable();
            $table->integer('stopper_id')->nullable();
            $table->string('price');
            $table->boolean('naslovna')->default(false);
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
        Schema::dropIfExists('configuration2s');
    }
}
