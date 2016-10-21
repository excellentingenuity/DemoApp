<?php

use App\Locations\Location;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


/**
 * Class LocationControllerTest
 */
class LocationControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var
     */
    protected $locations;

    /**
     * setUp
     */
    public function setUp ()
    {
        parent::setUp();
        $this->locations = factory(Location::class, 50)->create()
            ->each(function ($location) {
            $location->address()->save(factory(App\Addresses\Address::class)->create());
        });;
    }

    /**
     * testAll
     */
    public function testAll()
    {
        $this->get('api/location')->seeJsonStructure([
            '*' => [
                'id', 'name', 'map'
            ]
        ]);
    }

    /**
     * testView
     */
    public function testView()
    {
        $location = Location::first();
        $this->get('api/location/' . $location->id)->seeJson([
            'id' => $location->id,
            'name' => $location->name,
            'map' => $location->map
        ]);
    }

    /**
     * testDelete
     */
    public function testDelete()
    {
        $location = Location::first();
        $this->get('api/location/delete/' . $location->id)->seeJsonEquals(['deleted' => true]);
        $this->notSeeInDatabase('locations', [
            'id' => $location->id,
            'deleted_at' => null
        ]);
    }

    /**
     * testFindByName
     */
    public function testFindByName()
    {
        $location = Location::first();
        $this->get('api/location/find/' . $location->name)->seeJson([
          'id' => $location->id,
          'name' => $location->name,
          'map' => $location->map
        ]);
    }

    /**
     * testFindByID
     */
    public function testFindByID()
    {
        $location = Location::first();
        $this->get('api/location/find/' . $location->id)->seeJson([
            'id' => $location->id,
            'name' => $location->name,
            'map' => $location->map
        ]);
    }

    /**
     * testSaveNew
     */
    public function testSaveNew()
    {

        $this->json('POST', 'api/location/save/',
            [
                'name' => 'Test Location',
                'map' => 'Test Location Map',
                'street' => '123 Sesame Street',
                'city' => 'New York',
                'state' => 'New York',
                'postal_code' => '1234',
                'country' => 'United States'
            ])->seeJson([
                'name' => 'Test Location',
                'map' => 'Test Location Map',
                'street' => '123 Sesame Street',
                'city' => 'New York',
                'state' => 'New York',
                'postal_code' => '1234',
                'country' => 'United States'
            ]);
    }

    /**
     * testSaveExisting
     */
    public function testSaveExisting()
    {
        $location = Location::first();
        $this->json('POST', 'api/location/save/' . $location->id,
        [
            'name' => 'Test Location',
            'map' => 'Test Location Map',
            'street' => '123 Sesame Street',
            'city' => 'New York',
            'state' => 'New York',
            'postal_code' => '1234',
            'country' => 'United States'
        ])->seeJson([
            'id' => $location->id,
            'name' => 'Test Location',
            'map' => 'Test Location Map',
            'street' => '123 Sesame Street',
            'city' => 'New York',
            'state' => 'New York',
            'postal_code' => '1234',
            'country' => 'United States'
        ]);
    }
}
