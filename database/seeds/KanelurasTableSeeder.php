<?php

use Illuminate\Database\Seeder;

class KanelurasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kaneluras')->delete();

        //jednokrilna

        DB::table('kaneluras')->insert([
            'id' => 1,
            'door_type_id' => '1',
            'name' => 'Kanelure ne',
            'name_en' => 'Kanelure no',
            'price' => '0',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('kaneluras')->insert([
            'id' => 2,
            'door_type_id' => '1',
            'name' => 'Kanelure da',
            'name_en' => 'Kanelure yes',
            'price' => '20',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //dvokrilna

        DB::table('kaneluras')->insert([
            'id' => 3,
            'door_type_id' => '2',
            'name' => 'Kanelure ne',
            'name_en' => 'Kanelure no',
            'price' => '0',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('kaneluras')->insert([
            'id' => 4,
            'door_type_id' => '2',
            'name' => 'Kanelure da',
            'name_en' => 'Kanelure yes',
            'price' => '40',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //klizna-ambar

        DB::table('kaneluras')->insert([
            'id' => 5,
            'door_type_id' => '3',
            'name' => 'Kanelure ne',
            'name_en' => 'Kanelure no',
            'price' => '0',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('kaneluras')->insert([
            'id' => 6,
            'door_type_id' => '3',
            'name' => 'Kanelure da',
            'name_en' => 'Kanelure yes',
            'price' => '20',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
