<?php

use Illuminate\Database\Seeder;

class DoorstepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doorsteps')->delete();

        //jednokrilna

        DB::table('doorsteps')->insert([
            'id' => 1,
            'door_type_id' => '1',
            'name' => 'Bez praga',
            'name_en' => 'Without doorstep',
            'price' => '0',
            'image_path' => 'images\Doorsteps\bez_praga.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('doorsteps')->insert([
            'id' => 2,
            'door_type_id' => '1',
            'name' => 'Padajući prag',
            'name_en' => 'Falling doorstep',
            'price' => '25',
            'image_path' => 'images\Doorsteps\padajuci_prag.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //dvokrilna

        DB::table('doorsteps')->insert([
            'id' => 3,
            'door_type_id' => '2',
            'name' => 'Bez praga',
            'name_en' => 'Without doorstep',
            'price' => '0',
            'image_path' => 'images\Doorsteps\bez_praga.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('doorsteps')->insert([
            'id' => 4,
            'door_type_id' => '2',
            'name' => 'Padajući prag',
            'name_en' => 'Falling doorstep',
            'price' => '50',
            'image_path' => 'images\Doorsteps\padajuci_prag.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
