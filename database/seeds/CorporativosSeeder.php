<?php

use Illuminate\Database\Seeder;
use App\Corporativo;

class CorporativosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Corporativo::class)->times(10)->create();
    }
}
