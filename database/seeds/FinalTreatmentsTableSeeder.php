<?php

use Illuminate\Database\Seeder;

class FinalTreatmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('final_treatments')->delete();

        $colors = ['plava','crvena','zuta','braon','crna','bela','zelena','narandzasta','ljubicasta','roze'];
        $colors_en = ['blue','red','yellow','brown','black','white','green','orange','purple','pink'];

        //jednokrilna
        for($i=1;$i<=10;$i++){
            DB::table('final_treatments')->insert([
                'id' =>$i,
                'door_type_id' => 1,
                'name' => 'Farbani medijapan - ' .$colors[$i-1] . ' boja' ,
                'name_en' => 'Colored MDF - ' .$colors_en[$i-1] . ' color' ,
                'price' => '0',
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),

            ]);
        }

        DB::table('final_treatments')->insert([
            'id' =>11,
            'door_type_id' => 1,
            'name' => 'Furnirani medijapan - horizintalne teksture',
            'name_en' => 'Veneered MDF - horizontal texture',
            'price' => '40',
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),

        ]);

        DB::table('final_treatments')->insert([
            'id' =>12,
            'door_type_id' => 1,
            'name' => 'Furnirani medijapan - vertikalne teksture',
            'name_en' => 'Veneered MDF - vertical  texture',
            'price' => '40',
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),

        ]);

        //dvokrilna

        for($i=1;$i<=10;$i++){
            DB::table('final_treatments')->insert([
                'id' =>$i+12,
                'door_type_id' => 2,
                'name' => 'Farbani medijapan - ' .$colors[$i-1] . ' boja' ,
                'name_en' => 'Colored MDF - ' .$colors_en[$i-1] . ' color' ,
                'price' => '0',
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),

            ]);
        }

        DB::table('final_treatments')->insert([
            'id' =>23,
            'door_type_id' => 2,
            'name' => 'Furnirani medijapan - horizintalne teksture',
            'name_en' => 'Veneered MDF - horizontal texture',
            'price' => '80',
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),

        ]);

        DB::table('final_treatments')->insert([
            'id' =>24,
            'door_type_id' => 2,
            'name' => 'Furnirani medijapan - vertikalne teksture',
            'name_en' => 'Veneered MDF - vertical  texture',
            'price' => '80',
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),

        ]);

        //klizna-ambar

        for($i=1;$i<=10;$i++){
            DB::table('final_treatments')->insert([
                'id' =>$i+24,
                'door_type_id' => 3,
                'name' => 'Farbani medijapan - ' .$colors[$i-1] . ' boja' ,
                'name_en' => 'Colored MDF - ' .$colors_en[$i-1] . ' color' ,
                'price' => '0',
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),

            ]);
        }

        DB::table('final_treatments')->insert([
            'id' =>35,
            'door_type_id' => 3,
            'name' => 'Furnirani medijapan - horizintalne teksture',
            'name_en' => 'Veneered MDF - horizontal texture',
            'price' => '40',
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),

        ]);

        DB::table('final_treatments')->insert([
            'id' =>36,
            'door_type_id' => 3,
            'name' => 'Furnirani medijapan - vertikalne teksture',
            'name_en' => 'Veneered MDF - vertical  texture',
            'price' => '40',
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),

        ]);
    }
}
