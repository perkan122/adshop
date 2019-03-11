<?php

use Illuminate\Database\Seeder;

class VentilationGridsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ventilation_grids')->delete();

        DB::table('ventilation_grids')->insert([
        'id' => 1,
        'door_type_id' => '1',
        'name' => 'Ventilaciona rešetka za kupatilo PVC',
        'name_en' => 'Ventilation grid for bathroom PVC',
        'price' => '30',
        'image_path' => '',
        'updated_at' => \Carbon\Carbon::now(+2),
        'created_at' => \Carbon\Carbon::now(+2)
    ]);

        DB::table('ventilation_grids')->insert([
            'id' => 2,
            'door_type_id' => '1',
            'name' => 'Ventilaciona rešetka za kupatilo AL',
            'name_en' => 'Ventilation grid for bathroom AL',
            'price' => '50',
            'image_path' => '',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
        DB::table('ventilation_grids')->insert([
            'id' => 3,
            'door_type_id' => '1',
            'name' => 'Bez ventilacione rešetke',
            'name_en' => 'Without ventilation grid',
            'price' => '0',
            'image_path' => '',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
