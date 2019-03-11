<?php

use Illuminate\Database\Seeder;

class AssembliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assemblies')->delete();

        DB::table('assemblies')->insert([
        'id' => 1,
        'name' => 'Montaža ne',
        'name_en' => 'Assembly no',
        'price' => '0',
        'updated_at' => \Carbon\Carbon::now(+2),
        'created_at' => \Carbon\Carbon::now(+2)
    ]);

        DB::table('assemblies')->insert([
            'id' => 2,
            'name' => 'Montaža da',
            'name_en' => 'Assembly yes',
            'price' => '20',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);




    }
}
