<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DoorModelsTableSeeder::class);
        $this->call(DoorTypesTableSeeder::class);
        $this->call(DimensionsTableSeeder::class);
        $this->call(BasicConfiguratiosTableSeeder::class);
        $this->call(DoorLeafFillingsTableSeeder::class);
        $this->call(FinalTreatmentsTableSeeder::class);
        $this->call(KanelurasTableSeeder::class);
        $this->call(PervajzWallWidthsTableSeeder::class);
        $this->call(HingesTableSeeder::class);
        $this->call(DoorstepsTableSeeder::class);
        $this->call(DoorlockKindsTableSeeder::class);
        $this->call(DoorlockTypesTableSeeder::class);
        $this->call(DoorHanglesTableSeeder::class);
        $this->call(OpeningWaysTableSeeder::class);
        $this->call(TracksTableSeeder::class);
        $this->call(VentilationGridsTableSeeder::class);
        $this->call(StoppersTableSeeder::class);
        $this->call(AssembliesTableSeeder::class);
        $this->call(DisassembliesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(ConfigurationsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderItemsTableSeeder::class);

    }
}
