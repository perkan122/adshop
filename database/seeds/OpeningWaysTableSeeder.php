<?php

use Illuminate\Database\Seeder;

class OpeningWaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('opening_ways')->delete();

        //jednokrilna

        DB::table('opening_ways')->insert([
            'id' => 1,
            'door_type_id' => '1',
            'name' => 'Desna ka spolja',
            'name_en' => 'Right to the outside',
            'image_path' => 'images\OpeningWays\desna_ka_spolja.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('opening_ways')->insert([
            'id' => 2,
            'door_type_id' => '1',
            'name' => 'Desna ka unutra',
            'name_en' => 'Right to the inside',
            'image_path' => 'images\OpeningWays\desna_ka_unutra.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('opening_ways')->insert([
            'id' => 3,
            'door_type_id' => '1',
            'name' => 'Leva ka spolja',
            'name_en' => 'Left to the outside',
            'image_path' => 'images\OpeningWays\leva_ka_spolja.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('opening_ways')->insert([
            'id' => 4,
            'door_type_id' => '1',
            'name' => 'Leva ka unutra',
            'name_en' => 'Left to the inside',
            'image_path' => 'images\OpeningWays\leva_ka_unutra.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //dvokrilna

        DB::table('opening_ways')->insert([
            'id' => 5,
            'door_type_id' => '2',
            'name' => 'Desna ka spolja',
            'name_en' => 'Right to the outside',
            'image_path' => 'images\OpeningWays\desna_ka_spolja.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('opening_ways')->insert([
            'id' => 6,
            'door_type_id' => '2',
            'name' => 'Desna ka unutra',
            'name_en' => 'Right to the inside',
            'image_path' => 'images\OpeningWays\desna_ka_unutra.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('opening_ways')->insert([
            'id' => 7,
            'door_type_id' => '2',
            'name' => 'Leva ka spolja',
            'name_en' => 'Left to the outside',
            'image_path' => 'images\OpeningWays\leva_ka_spolja.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('opening_ways')->insert([
            'id' => 8,
            'door_type_id' => '2',
            'name' => 'Leva ka unutra',
            'name_en' => 'Left to the inside',
            'image_path' => 'images\OpeningWays\leva_ka_unutra.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
