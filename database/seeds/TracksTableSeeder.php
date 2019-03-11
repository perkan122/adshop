<?php

use Illuminate\Database\Seeder;

class TracksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tracks')->delete();

        DB::table('tracks')->insert([
        'id' => 1,
        'door_type_id' => '3',
        'name' => 'Bez šine',
        'name_en' => 'Without track',
        'price' => '0',
        'image_path' => 'images\Tracks\bez_sine.png',
        'updated_at' => \Carbon\Carbon::now(+2),
        'created_at' => \Carbon\Carbon::now(+2)
    ]);

        DB::table('tracks')->insert([
            'id' => 2,
            'door_type_id' => '3',
            'name' => 'Standardna šina',
            'name_en' => 'Standard track',
            'price' => '30',
            'image_path' => 'images\Tracks\standardna_sina.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

    }
}
