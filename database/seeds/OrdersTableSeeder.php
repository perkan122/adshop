<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->delete();

        //prvi kupac kupuje 1*prva konfiguracija
        DB::table('orders')->insert([
            'id' => 1,
            'customer_id' => '1',
            'total_price' => '395',
            'payment_status' => '0',
            'shipping_address' => 'Živka Davidovića 28',
            'shipping_apartment' => '12',
            'shipping_city' => 'Beograd',
            'order_status' => '0',
            'additional_note' => 'Molim isporuku posle 16h.',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //drugi kupac kupuje 1*2.konfiguracija + 1*3 konfiguracija

        DB::table('orders')->insert([
            'id' => 2,
            'customer_id' => '2',
            'total_price' => '965',
            'payment_status' => '1',
            'shipping_address' => 'Svetogorska 74',
            'shipping_apartment' => '3',
            'shipping_city' => 'Beograd',
            'order_status' => '1',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //treci kupac kupuje 2*4.konfiguracija

        DB::table('orders')->insert([
            'id' => 3,
            'customer_id' => '3',
            'total_price' => '1400',
            'payment_status' => '2',
            'shipping_address' => 'Marije Bursać 62',
            'shipping_apartment' => '',
            'shipping_city' => 'Zemun Beograd',
            'order_status' => '2',
            'additional_note' => '2. kuca posle Maxija.',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
