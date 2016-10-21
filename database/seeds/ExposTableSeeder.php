<?php

use Illuminate\Database\Seeder;

class ExposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Expos\Expo::class, 150)->create();
    }
}
