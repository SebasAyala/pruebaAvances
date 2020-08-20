<?php

use Illuminate\Database\Seeder;
use App\Warehouse;

class WarehousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warehouse_1 = new Warehouse();
        $warehouse_1->name = 'Cabecera';
        $warehouse_1->save();

        $warehouse_2 = new Warehouse();
        $warehouse_2->name = 'Cañaveral';
        $warehouse_2->save();
    }
}
