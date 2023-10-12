<?php

namespace Http\Controllers\Backend;

use App\Models\Address;
use Tests\TestCase;

class AddressTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_addresses_index_page_status()
    {
        $response = $this->get('/dashboard/1/addresses');

        $response->assertStatus(200);
    }

    public function test_addresses_index_goes_to_correct_view()
    {
        $response = $this->get('/dashboard/1/addresses');

        $response->assertViewIs("backend.addresses.index");
    }

    public function test_addresses_create_form_page_status()
    {
        $response = $this->get('/dashboard/1/addresses/create');

        $response->assertOk();
    }

    public function test_addresses_create_form_goes_to_correct_view()
    {
        $response = $this->get('/dashboard/1/addresses/create');

        $response->assertViewIs("backend.addresses.insert_form");
    }

    public function test_addresses_new_resource_is_created()
    {
        $address = Address::factory()->make();
        $data = $address->toArray();

        $response = $this->post('/dashboard/1/addresses',$data);
        $response->assertRedirect('/dashboard/1/addresses');
    }

    public function test_addresses_existing_address_is_updated()
    {
        $address = Address::all()->last();
        $address->city = "City " . $address->city;
        $address->district = "District " . $address->district;
        $data = $address->toArray();

        $response = $this->put('/dashboard/1/addresses' . $address->address_id,$data);
        $response->assertRedirect('/dashboard/1/addresses');
    }
}
