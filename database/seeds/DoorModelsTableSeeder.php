<?php

use Illuminate\Database\Seeder;

class DoorModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('door_models')->delete();

        DB::table('door_models')->insert([
            'id' => 1,
            'name' => 'Klasična vrata',
            'name_en' => 'Classic door',
            'image_path' => 'images\DoorModels\klasicna.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('door_models')->insert([
            'id' => 2,
            'name' => 'Klizna vrata',
            'name_en' => 'Sliding door',
            'image_path' => 'images\DoorModels\klizna.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
