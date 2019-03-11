<?php

use Illuminate\Database\Seeder;

class BasicConfiguratiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('basic_configurations')->delete();

        $prices1 = array('200', '205', '210', '215', '220', '225','210', '215', '220', '225', '230', '235','220', '225', '230', '235', '240', '245');
        $prices2 = array('270', '280', '290', '300', '310', '320','285', '295', '305', '315', '325', '335','300', '310', '320', '330', '340', '350');
        $prices3 = array('200', '205', '210', '215', '220', '225','210', '215', '220', '225', '230', '235','220', '225', '230', '235', '240', '245');

        for($i=1;$i<=18;$i++){
            DB::table('basic_configurations')->insert([
                'id' => $i,
                'door_model_id' => 1,
                'door_type_id' => 1,
                'dimension_id' => $i,
                'price' => $prices1[$i-1],
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),

            ]);
        }

        for($i=19;$i<=36;$i++){
            DB::table('basic_configurations')->insert([
                'id' =>$i,
                'door_model_id' => 1,
                'door_type_id' => 2,
                'dimension_id' => $i,
                'price' => $prices2[$i-19],
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),

            ]);
        }

        for($i=37;$i<=54;$i++){
            DB::table('basic_configurations')->insert([
                'id' =>$i,
                'door_model_id' => 2,
                'door_type_id' => 3,
                'dimension_id' => $i,
                'price' => $prices3[$i-37],
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),

            ]);
        }

    }
}
