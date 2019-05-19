<?php

use Illuminate\Database\Seeder;

class CellnumbersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Cellnumber::class, 100)->create();
    }
}
