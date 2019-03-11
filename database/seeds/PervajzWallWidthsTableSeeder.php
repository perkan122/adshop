<?php

use Illuminate\Database\Seeder;

class PervajzWallWidthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pervajz_wall_widths')->delete();

        //jednokrilna

        DB::table('pervajz_wall_widths')->insert([
            'id' => 1,
            'door_type_id' => '1',
            'name' => 'Širina zida 10-15cm',
            'name_en' => 'Width of the wall 10-15cm',
            'price' => '15',
            'image_path' => 'images\PervajzWallWidths\10-15cm_debljina zida.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('pervajz_wall_widths')->insert([
            'id' => 2,
            'door_type_id' => '1',
            'name' => 'Širina zida 15-20cm',
            'name_en' => 'Width of the wall 15-20cm',
            'price' => '25',
            'image_path' => 'images\PervajzWallWidths\15-20cm_debljina zida.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('pervajz_wall_widths')->insert([
            'id' => 3,
            'door_type_id' => '1',
            'name' => 'Širina zida 20-25cm',
            'name_en' => 'Width of the wall 20-25cm',
            'price' => '35',
            'image_path' => 'images\PervajzWallWidths\20-25cm_debljina zida.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //dvokrilna

        DB::table('pervajz_wall_widths')->insert([
            'id' => 4,
            'door_type_id' => '2',
            'name' => 'Širina zida 10-15cm',
            'name_en' => 'Width of the wall 10-15cm',
            'price' => '15',
            'image_path' => 'images\PervajzWallWidths\10-15cm_debljina zida.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('pervajz_wall_widths')->insert([
            'id' => 5,
            'door_type_id' => '2',
            'name' => 'Širina zida 15-20cm',
            'name_en' => 'Width of the wall 15-20cm',
            'price' => '25',
            'image_path' => 'images\PervajzWallWidths\15-20cm_debljina zida.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('pervajz_wall_widths')->insert([
            'id' => 6,
            'door_type_id' => '2',
            'name' => 'Širina zida 20-25cm',
            'name_en' => 'Width of the wall 20-25cm',
            'price' => '35',
            'image_path' => 'images\PervajzWallWidths\20-25cm_debljina zida.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
