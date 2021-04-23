<?php

use Illuminate\Database\Seeder;

class RaffleItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\RaffleItem', 20)->create();
    }
}
