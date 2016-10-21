<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Locations\Location::class, 50)->create()
        ->each(function ($location) {
            $location->address()->save(factory(App\Addresses\Address::class)->create());
            $location->booths()->saveMany(factory(App\Booths\Booth::class, 5)->create());
        });
    }
}
