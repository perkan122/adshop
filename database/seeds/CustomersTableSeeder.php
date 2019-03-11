<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->delete();

        DB::table('customers')->insert([
        'id' => 1,
        'name' => 'Petar',
        'surname' => 'Petrović',
        'email' => 'petar.petrovic@gmail.com',
        'address' => 'Živka Davidovića 28',
        'apartment' => '12',
        'city' => 'Beograd',
        'post_number' => '11000',
        'telephone' => '0641234567',
        'updated_at' => \Carbon\Carbon::now(+2),
        'created_at' => \Carbon\Carbon::now(+2)
    ]);

        DB::table('customers')->insert([
            'id' => 2,
            'name' => 'Marko',
            'surname' => 'Marković',
            'email' => 'marko.markovic@gmail.com',
            'address' => 'Svetogorska 74',
            'apartment' => '3',
            'city' => 'Beograd',
            'post_number' => '11000',
            'telephone' => '0641112223',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);

        DB::table('customers')->insert([
            'id' => 3,
            'name' => 'Nikola',
            'surname' => 'Nikolić',
            'email' => 'nikola.nikolic@gmail.com',
            'address' => 'Marije Bursać 62',
            'apartment' => '',
            'city' => 'Zemun Beograd',
            'post_number' => '11080',
            'telephone' => '0647654321',
            'updated_at' => \Carbon\Carbon::now(+2),
            'created_at' => \Carbon\Carbon::now(+2)
        ]);
    }
}
