<?php

use Illuminate\Database\Seeder;

class StoppersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stoppers')->delete();

        DB::table('stoppers')->insert([
            'id' => 1,
            'door_type_id' => '1',
            'name' => 'Podni stoper ne',
            'name_en' => 'Floor stopper no',
            'price' => '0',
            'image_path' => '',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('stoppers')->insert([
            'id' => 2,
            'door_type_id' => '1',
            'name' => 'Podni stoper da',
            'name_en' => 'Floor stopper yes',
            'price' => '20',
            'image_path' => '',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('stoppers')->insert([
            'id' => 3,
            'door_type_id' => '2',
            'name' => 'Podni stoper ne',
            'name_en' => 'Floor stopper no',
            'price' => '0',
            'image_path' => '',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('stoppers')->insert([
            'id' => 4,
            'door_type_id' => '2',
            'name' => 'Podni stoper da',
            'name_en' => 'Floor stopper yes',
            'price' => '40',
            'image_path' => '',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
