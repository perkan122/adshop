<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name',64);
            $table->string('email',128)->unique();
            $table->string('password');
            $table->string('surname',64)->nullable();
            $table->string('address',64)->nullable();
            $table->string('floor',64)->nullable();
            $table->string('apartment_number',64)->nullable();
            $table->string('telephone',64)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
