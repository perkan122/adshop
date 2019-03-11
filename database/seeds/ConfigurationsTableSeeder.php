<?php

use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->delete();

        DB::table('configurations')->insert([
            'id' => 1,
            'basic_configuration_id' => 1,
             'door_leaf_filling_id' => 2,
             'final_treatment_id' => 4,
             'kanelura_id' => 2,
             'pervajz_wall_width_id' => 2,
             'hinge_id' => 1,
             'doorstep_id' => 1,
             'doorlock_kind_id' => 1,
             'doorlock_type_id' => 1,
             'door_handle_id' => 3,
             'opening_way_id' => 1,
             'ventilation_grid_id' => 1,
             'stopper_id' => 2,
            'price' => '375',
            'sold_quantity'=>1,
            'naslovna' => false,
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('configurations')->insert([
            'id' => 2,
            'basic_configuration_id' => 13,
             'door_leaf_filling_id' => 1,
             'final_treatment_id' => 11,
             'kanelura_id' => 1,
             'pervajz_wall_width_id' => 1,
             'hinge_id' => 2,
             'doorstep_id' => 2,
             'doorlock_kind_id' => 2,
             'doorlock_type_id' => 1,
             'door_handle_id' => 2,
             'opening_way_id' => 2,
             'ventilation_grid_id' => 2,
             'stopper_id' => 1,
            'price' => '440',
            'sold_quantity'=>1,
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('configurations')->insert([
            'id' => 3,
            'basic_configuration_id' => 19,
             'door_leaf_filling_id' => 4,
             'final_treatment_id' => 13,
             'kanelura_id' => 4,
             'pervajz_wall_width_id' => 5,
             'hinge_id' => 3,
             'doorstep_id' => 3,
             'doorlock_kind_id' => 3,
             'doorlock_type_id' => 3,
             'door_handle_id' => 5,
             'opening_way_id' => 6,
             'stopper_id' => 4,
            'price' => '485',
            'sold_quantity'=>1,
            'naslovna' => false,
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('configurations')->insert([
            'id' => 4,
            'basic_configuration_id' => 37,
             'door_leaf_filling_id' => 5,
             'final_treatment_id' => 35,
             'kanelura_id' => 6,
             'doorlock_kind_id' => 5,
             'track_id' => 2,
            'price' => '310',
            'sold_quantity'=>1,
            'naslovna' => false,
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        //konfiguracije za naslovnu
        DB::table('configurations')->insert([
            'id' => 5,
            'basic_configuration_id' => 1,
            'door_leaf_filling_id' => 2,
            'final_treatment_id' => 5,
            'kanelura_id' => 2,
            'pervajz_wall_width_id' => 1,
            'hinge_id' => 1,
            'doorstep_id' => 2,
            'doorlock_kind_id' => 1,
            'doorlock_type_id' => 2,
            'door_handle_id' => 3,
            'opening_way_id' => 3   ,
            'ventilation_grid_id' => 3,
            'stopper_id' => 1   ,
            'price' => '360',
            'sold_quantity'=>0,
            'naslovna' => true,
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('configurations')->insert([
            'id' => 6,
            'basic_configuration_id' => 1,
            'door_leaf_filling_id' => 2,
            'final_treatment_id' => 12  ,
            'kanelura_id' => 2,
            'pervajz_wall_width_id' => 3,
            'hinge_id' => 2,
            'doorstep_id' => 2,
            'doorlock_kind_id' => 2,
            'doorlock_type_id' => 2,
            'door_handle_id' => 3,
            'opening_way_id' => 4,
            'ventilation_grid_id' => 2,
            'stopper_id' => 2,
            'price' => '550',
            'sold_quantity'=>0,
            'naslovna' => true,
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('configurations')->insert([
            'id' => 7,
            'basic_configuration_id' => 19,
            'door_leaf_filling_id' => 3,
            'final_treatment_id' => 13,
            'kanelura_id' => 3,
            'pervajz_wall_width_id' => 4,
            'hinge_id' => 3,
            'doorstep_id' => 3,
            'doorlock_kind_id' => 3,
            'doorlock_type_id' => 3,
            'door_handle_id' => 4,
            'opening_way_id' => 5,
            'stopper_id' => 3,
            'price' => '300',
            'sold_quantity'=>0,
            'naslovna' => true,
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('configurations')->insert([
            'id' => 8,
            'basic_configuration_id' => 19,
            'door_leaf_filling_id' => 4,
            'final_treatment_id' => 24,
            'kanelura_id' => 4,
            'pervajz_wall_width_id' => 6,
            'hinge_id' => 4,
            'doorstep_id' => 4,
            'doorlock_kind_id' => 4,
            'doorlock_type_id' => 4,
            'door_handle_id' => 6,
            'opening_way_id' => 8,
            'stopper_id' => 4,
            'price' => '755',
            'sold_quantity'=>0,
            'naslovna' => true,
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('configurations')->insert([
            'id' => 9,
            'basic_configuration_id' => 37,
            'door_leaf_filling_id' => 5,
            'final_treatment_id' => 28,
            'kanelura_id' => 5,
            'doorlock_kind_id' => 5,
            'track_id' => 1,
            'price' => '220',
            'sold_quantity'=>0,
            'naslovna' => true,
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('configurations')->insert([
            'id' => 10,
            'basic_configuration_id' => 37,
            'door_leaf_filling_id' => 6 ,
            'final_treatment_id' => 35,
            'kanelura_id' => 6,
            'doorlock_kind_id' => 6,
            'track_id' => 2,
            'price' => '345',
            'sold_quantity'=>0,
            'naslovna' => true,
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
