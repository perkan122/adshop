<?php

use Illuminate\Database\Seeder;

class DoorHanglesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('door_handles')->delete();

        //jednokrilna

        DB::table('door_handles')->insert([
            'id' => 1,
            'door_type_id' => '1',
            'name' => 'Kvaka opcija 1 th-104',
            'name_en' => 'Handle option 1 th-104',
            'price' => '15',
            'image_path' => 'images\DoorHandles\opcija1.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('door_handles')->insert([
            'id' => 2,
            'door_type_id' => '1',
            'name' => 'Kvaka opcija 2 alice',
            'name_en' => 'Handle option 2 alice',
            'price' => '30',
            'image_path' => 'images\DoorHandles\opcija2.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('door_handles')->insert([
            'id' => 3,
            'door_type_id' => '1',
            'name' => 'Kvaka opcija 3 shelby',
            'name_en' => 'Handle option 3 shelby',
            'price' => '40',
            'image_path' => 'images\DoorHandles\opcija3.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //dvokrilna

        DB::table('door_handles')->insert([
            'id' => 4,
            'door_type_id' => '2',
            'name' => 'Kvaka opcija 1 th-104',
            'name_en' => 'Handle option 1 th-104',
            'price' => '15',
            'image_path' => 'images\DoorHandles\opcija1.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('door_handles')->insert([
            'id' => 5,
            'door_type_id' => '2',
            'name' => 'Kvaka opcija 2 alice',
            'name_en' => 'Handle option 2 alice',
            'price' => '30',
            'image_path' => 'images\DoorHandles\opcija2.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('door_handles')->insert([
            'id' => 6,
            'door_type_id' => '2',
            'name' => 'Kvaka opcija 3 shelby',
            'name_en' => 'Handle option 3 shelby',
            'price' => '40',
            'image_path' => 'images\DoorHandles\opcija3.jpg',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
