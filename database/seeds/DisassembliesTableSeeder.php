<?php

use Illuminate\Database\Seeder;

class DisassembliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disassemblies')->delete();

        DB::table('disassemblies')->insert([
            'id' => 1,
            'name' => 'Demontaža ne',
            'name_en' => 'Disassembly no',
            'price' => '0',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('disassemblies')->insert([
            'id' => 2,
            'name' => 'Demontaža da',
            'name_en' => 'Disassembly yes',
            'price' => '20',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
