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
        factory(App\Customers\Customer::class, 50)->create()
          ->each(function ($location)
          {
              $location->address()->save(factory(App\Addresses\Address::class)->create());
          });
    }
}
