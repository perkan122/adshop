<?php

use Illuminate\Database\Seeder;

class DoorLeafFillingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('door_leaf_fillings')->delete();

        DB::table('door_leaf_fillings')->insert([
        'id' => 1,
        'door_type_id' => '1',
        'name' => 'Papirno saće',
        'name_en' => 'Paper honeycomb',
        'price' => '0',
        'image_path' => 'images\DoorLeafFillings\papirno_sace.jpg',
        'updated_at' => \Carbon\Carbon::now(+2),
        'created_at' => \Carbon\Carbon::now(+2)
    ]);

        DB::table('door_leaf_fillings')->insert([
            'id' => 2,
            'door_type_id' => '1',
            'name' => 'Ekstrudirana iverica',
            'name_en' => 'Extruded chipboard',
            'price' => '40',
            'image_path' => 'images\DoorLeafFillings\ekstrudirana_iverica.jpeg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('door_leaf_fillings')->insert([
            'id' => 3,
            'door_type_id' => '2',
            'name' => 'Papirno saće',
            'name_en' => 'Paper honeycomb',
            'price' => '0',
            'image_path' => 'images\DoorLeafFillings\papirno_sace.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('door_leaf_fillings')->insert([
            'id' => 4,
            'door_type_id' => '2',
            'name' => 'Ekstrudirana iverica',
            'name_en' => 'Extruded chipboard',
            'price' => '80',
            'image_path' => 'images\DoorLeafFillings\ekstrudirana_iverica.jpeg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('door_leaf_fillings')->insert([
            'id' => 5,
            'door_type_id' => '3',
            'name' => 'Papirno saće',
            'name_en' => 'Paper honeycomb',
            'price' => '0',
            'image_path' => 'images\DoorLeafFillings\papirno_sace.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('door_leaf_fillings')->insert([
            'id' => 6,
            'door_type_id' => '3',
            'name' => 'Ekstrudirana iverica',
            'name_en' => 'Extruded chipboard',
            'price' => '40',
            'image_path' => 'images\DoorLeafFillings\ekstrudirana_iverica.jpeg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
