<?php

use Illuminate\Database\Seeder;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_items')->delete();

        //stavke 1 narudzbenice
        DB::table('order_items')->insert([
            'id' => 1,
            'configuration_id' => 1,
            'order_id' => 1,
            'disassembly_id' => 1,
            'assembly_id' => 2,
            'quantity' => 1,
            'item_price' => '395',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //stavke 2 narudzbenice

        DB::table('order_items')->insert([
            'id' => 2,
            'configuration_id' => 2,
            'order_id' => 2,
            'disassembly_id' => 1,
            'assembly_id' => 2,
            'quantity' => 1,
            'item_price' => '460',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('order_items')->insert([
            'id' => 3,
            'configuration_id' => 3,
            'order_id' => 2,
            'disassembly_id' => 1,
            'assembly_id' => 2,
            'quantity' => 1,
            'item_price' => '505',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //stavke 3. narudzbenice

        DB::table('order_items')->insert([
            'id' => 4,
            'configuration_id' => 4,
            'order_id' => 3,
            'disassembly_id' => 2,
            'assembly_id' => 2,
            'quantity' => 2,
            'item_price' => '700',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
