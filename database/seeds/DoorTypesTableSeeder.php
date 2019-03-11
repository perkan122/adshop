<?php

use Illuminate\Database\Seeder;

class DoorTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('door_types')->delete();

        DB::table('door_types')->insert([
            'id' => 1,
            'door_model_id' =>1,
            'name' => 'Jednokrilna vrata',
            'name_en' => 'Single leaf door',
            'image_path' => 'images\DoorTypes\jednokrilna.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('door_types')->insert([
            'id' => 2,
            'door_model_id' =>1,
            'name' => 'Dvokrilna vrata',
            'name_en' => 'Double leaf door',
            'image_path' => 'images\DoorTypes\dvokrilna.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('door_types')->insert([
            'id' => 3,
            'door_model_id' =>2,
            'name' => 'Klizna vrata - Ambar',
            'name_en' => 'Sliding door - Ambar',
            'image_path' => 'images\DoorTypes\klizna-ambar.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
