<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('total_price')->nullable();
            $table->tinyInteger('payment_status'); //0-nije placeno, 1-dat avans, 2-placeno
            $table->string('shipping_address');
            $table->string('shipping_apartment')->nullable();
            $table->string('shipping_city');
            $table->tinyInteger('order_status'); //0-naruceno, 1-odobreno, 2-isporuceno(ugradjeno)
            $table->string('additional_note',500)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
