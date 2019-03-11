<?php

use Illuminate\Database\Seeder;

class HingesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hinges')->delete();

        //jednokrilna

        DB::table('hinges')->insert([
            'id' => 1,
            'door_type_id' => '1',
            'name' => 'Brodska šarka',
            'name_en' => 'Ship hinge',
            'price' => '0',
            'image_path' => 'images\Hinges\brodska_sarka.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('hinges')->insert([
            'id' => 2,
            'door_type_id' => '1',
            'name' => 'Skrivena šarka',
            'name_en' => 'Hidden hinge',
            'price' => '40',
            'image_path' => 'images\Hinges\skrivena_sarka.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //dvokrilna

        DB::table('hinges')->insert([
            'id' => 3,
            'door_type_id' => '2',
            'name' => 'Brodska šarka',
            'name_en' => 'Ship hinge',
            'price' => '0',
            'image_path' => 'images\Hinges\brodska_sarka.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('hinges')->insert([
            'id' => 4,
            'door_type_id' => '2',
            'name' => 'Skrivena šarka',
            'name_en' => 'Hidden hinge',
            'price' => '80',
            'image_path' => 'images\Hinges\skrivena_sarka.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
