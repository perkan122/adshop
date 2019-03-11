<?php

use Illuminate\Database\Seeder;

class DoorlockKindsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doorlock_kinds')->delete();

        //jednokrilna

        DB::table('doorlock_kinds')->insert([
            'id' => 1,
            'door_type_id' => '1',
            'name' => 'Klasična brava sa ključem',
            'name_en' => 'Classic key doorlock',
            'price' => '0',
            'image_path' => 'images\DoorlockKinds\klasicna_brava_sa_kljucem.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('doorlock_kinds')->insert([
            'id' => 2,
            'door_type_id' => '1',
            'name' => 'Brava sa okretačem',
            'name_en' => 'Locksmith doorlock',
            'price' => '20',
            'image_path' => 'images\DoorlockKinds\brava_sa_okretacem.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //dvokrilna

        DB::table('doorlock_kinds')->insert([
            'id' => 3,
            'door_type_id' => '2',
            'name' => 'Klasična brava sa ključem',
            'name_en' => 'Classic key doorlock',
            'price' => '0',
            'image_path' => 'images\DoorlockKinds\klasicna_brava_sa_kljucem.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('doorlock_kinds')->insert([
            'id' => 4,
            'door_type_id' => '2',
            'name' => 'Brava sa okretačem',
            'name_en' => 'Locksmith doorlock',
            'price' => '20',
            'image_path' => 'images\DoorlockKinds\brava_sa_okretacem.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //kruzna - ambar

        DB::table('doorlock_kinds')->insert([
            'id' => 5,
            'door_type_id' => '3',
            'name' => 'Ručica pasaž kvadratna',
            'name_en' => 'Handle passage square',
            'price' => '20',
            'image_path' => 'images\DoorlockKinds\kvadratna_pasaz.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('doorlock_kinds')->insert([
            'id' => 6,
            'door_type_id' => '3',
            'name' => 'Ručica pasaž okrugla',
            'name_en' => 'Handle passage round',
            'price' => '15',
            'image_path' => 'images\DoorlockKinds\okrugla_pasaz.png',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
