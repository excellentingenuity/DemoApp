<?php

use App\Locations\Location;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\App;

class LocationControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected $locations;

    public function setUp ()
    {
        parent::setUp();
        $this->locations = factory(Location::class, 50)->create();
    }

    public function testAll()
    {
        $this->get('api/location')->seeJsonStructure([
            '*' => [
                'id', 'name', 'map'
            ]
        ]);
    }

    public function testView()
    {
        $location = Location::first();
        $this->get('api/location/' . $location->id)->seeJson([
            'id' => $location->id,
            'name' => $location->name,
            'map' => $location->map
        ]);
    }
}
