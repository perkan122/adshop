<?php

use Illuminate\Database\Seeder;

class DimensionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dimensions')->delete();

        DB::table('dimensions')->insert([
        'id' => 1,
        'door_type_id' => '1',
        'width' => '80',
        'height' => '190',
        'updated_at' => \Carbon\Carbon::now(+2),
        'created_at' => \Carbon\Carbon::now(+2)
    ]);

        DB::table('dimensions')->insert([
            'id' => 2,
            'door_type_id' => '1',
            'width' => '80',
            'height' => '200',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 3,
            'door_type_id' => '1',
            'width' => '80',
            'height' => '210',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 4,
            'door_type_id' => '1',
            'width' => '80',
            'height' => '220',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 5,
            'door_type_id' => '1',
            'width' => '80',
            'height' => '230',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 6,
            'door_type_id' => '1',
            'width' => '80',
            'height' => '240',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 7,
            'door_type_id' => '1',
            'width' => '90',
            'height' => '190',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 8,
            'door_type_id' => '1',
            'width' => '90',
            'height' => '200',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 9,
            'door_type_id' => '1',
            'width' => '90',
            'height' => '210',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 10,
            'door_type_id' => '1',
            'width' => '90',
            'height' => '220',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 11,
            'door_type_id' => '1',
            'width' => '90',
            'height' => '230',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 12,
            'door_type_id' => '1',
            'width' => '90',
            'height' => '240',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 13,
            'door_type_id' => '1',
            'width' => '100',
            'height' => '190',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 14,
            'door_type_id' => '1',
            'width' => '100',
            'height' => '200',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 15,
            'door_type_id' => '1',
            'width' => '100',
            'height' => '210',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 16,
            'door_type_id' => '1',
            'width' => '100',
            'height' => '220',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 17,
            'door_type_id' => '1',
            'width' => '100',
            'height' => '230',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 18,
            'door_type_id' => '1',
            'width' => '100',
            'height' => '240',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 19,
            'door_type_id' => '2',
            'width' => '180',
            'height' => '190',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 20,
            'door_type_id' => '2',
            'width' => '180',
            'height' => '200',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 21,
            'door_type_id' => '2',
            'width' => '180',
            'height' => '210',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 22,
            'door_type_id' => '2',
            'width' => '180',
            'height' => '220',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 23,
            'door_type_id' => '2',
            'width' => '180',
            'height' => '230',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 24,
            'door_type_id' => '2',
            'width' => '180',
            'height' => '240',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 25,
            'door_type_id' => '2',
            'width' => '190',
            'height' => '190',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 26,
            'door_type_id' => '2',
            'width' => '190',
            'height' => '200',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 27,
            'door_type_id' => '2',
            'width' => '190',
            'height' => '210',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 28,
            'door_type_id' => '2',
            'width' => '190',
            'height' => '220',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 29,
            'door_type_id' => '2',
            'width' => '190',
            'height' => '230',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 30,
            'door_type_id' => '2',
            'width' => '190',
            'height' => '240',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 31,
            'door_type_id' => '2',
            'width' => '200',
            'height' => '190',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 32,
            'door_type_id' => '2',
            'width' => '200',
            'height' => '200',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 33,
            'door_type_id' => '2',
            'width' => '200',
            'height' => '210',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 34,
            'door_type_id' => '2',
            'width' => '200',
            'height' => '220',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 35,
            'door_type_id' => '2',
            'width' => '200',
            'height' => '230',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 36,
            'door_type_id' => '2',
            'width' => '200',
            'height' => '240',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 37,
            'door_type_id' => '3',
            'width' => '80',
            'height' => '190',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 38,
            'door_type_id' => '3',
            'width' => '80',
            'height' => '200',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 39,
            'door_type_id' => '3',
            'width' => '80',
            'height' => '210',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 40,
            'door_type_id' => '3',
            'width' => '80',
            'height' => '220',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 41,
            'door_type_id' => '3',
            'width' => '80',
            'height' => '230',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 42,
            'door_type_id' => '3',
            'width' => '80',
            'height' => '240',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 43,
            'door_type_id' => '3',
            'width' => '90',
            'height' => '190',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 44,
            'door_type_id' => '3',
            'width' => '90',
            'height' => '200',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 45,
            'door_type_id' => '3',
            'width' => '90',
            'height' => '210',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 46,
            'door_type_id' => '3',
            'width' => '90',
            'height' => '220',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 47,
            'door_type_id' => '3',
            'width' => '90',
            'height' => '230',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 48,
            'door_type_id' => '3',
            'width' => '90',
            'height' => '240',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 49,
            'door_type_id' => '3',
            'width' => '100',
            'height' => '190',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 50,
            'door_type_id' => '3',
            'width' => '100',
            'height' => '200',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 51,
            'door_type_id' => '3',
            'width' => '100',
            'height' => '210',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 52,
            'door_type_id' => '3',
            'width' => '100',
            'height' => '220',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 53,
            'door_type_id' => '3',
            'width' => '100',
            'height' => '230',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('dimensions')->insert([
            'id' => 54,
            'door_type_id' => '3',
            'width' => '100',
            'height' => '240',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);




    }
}
