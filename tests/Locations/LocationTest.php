<?php
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Locations\Location;


/**
 * Class LocationTest
 */
class LocationTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * test_create
     */
    public function testCreate()
    {
        $location = Location::create([
            'name' => 'Test Location',
            'map' => 'this will be the map'
        ]);
        $this->assertNotNull($location);
        $this->assertInstanceOf(App\Locations\Location::class, $location);
        $this->seeInDatabase('locations', [
            'name' => 'Test Location',
            'map' => 'this will be the map'
        ]);
    }

    /**
     * test_delete
     */
    public function testDelete()
    {
        $location = Location::create([
             'name' => 'Test Location',
             'map' => 'this will be the map'
        ]);
        $location->delete();
        $this->notSeeInDatabase('locations', [
           'name' => 'Test Location',
           'map' => 'this will be the map',
           'deleted_at' => null
        ]);
    }

    /**
     * test_find
     */
    public function testFind()
    {
        $location = Location::create([
             'name' => 'Test Location',
             'map' => 'this will be the map'
        ]);
        $location2 = Location::create([
          'name' => 'Test Location 2',
          'map' => 'this will be the map'
        ]);
        $found = Location::where('name', 'Test Location')->first();
        $this->assertInstanceOf(App\Locations\Location::class, $found);
        $this->assertNotNull($found);
        $this->assertEquals($location->name, $found->name);
    }

    /**
     * test_all
     */
    public function testAll()
    {
        $location = Location::create([
         'name' => 'Test Location',
         'map' => 'this will be the map'
        ]);
        $location2 = Location::create([
          'name' => 'Test Location 2',
          'map' => 'this will be the map'
        ]);
        $locations = Location::all();
        $this->assertInstanceOf(Illuminate\Support\Collection::class, $locations);
        $this->assertEquals(2, $location->count());
    }

    /**
     * testAttachAddress
     */
    public function testAttachAddress()
    {
        $location = Location::create([
             'name' => 'Test Location',
             'map' => 'this will be the map'
        ]);
        $address = factory(App\Addresses\Address::class)->create();
        //dd($address);
        $address->save();
        $location->address()->save($address);
        $this->assertNotNull($location->address);
    }
}
