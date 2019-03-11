<?php

use Illuminate\Database\Seeder;

class DoorlockTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doorlock_types')->delete();

        //jednokrilna

        DB::table('doorlock_types')->insert([
            'id' => 1,
            'door_type_id' => '1',
            'name' => 'Klasična brava',
            'name_en' => 'Classic doorlock',
            'price' => '0',
            'image_path' => 'images\DoorlockTypes\klasicna_brava.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('doorlock_types')->insert([
            'id' => 2,
            'door_type_id' => '1',
            'name' => 'Magnetna brava',
            'name_en' => 'Magnetic doorlock',
            'price' => '20',
            'image_path' => 'images\DoorlockTypes\magnetna_brava.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //dvokrilna

        DB::table('doorlock_types')->insert([
            'id' => 3,
            'door_type_id' => '2',
            'name' => 'Klasična brava',
            'name_en' => 'Classic doorlock',
            'price' => '0',
            'image_path' => 'images\DoorlockTypes\klasicna_brava.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('doorlock_types')->insert([
            'id' => 4,
            'door_type_id' => '2',
            'name' => 'Magnetna brava',
            'name_en' => 'Magnetic doorlock',
            'price' => '20',
            'image_path' => 'images\DoorlockTypes\magnetna_brava.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
