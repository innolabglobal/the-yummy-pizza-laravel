<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Address;

class AddressApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_address()
    {
        $address = factory(Address::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/addresses', $address
        );

        $this->assertApiResponse($address);
    }

    /**
     * @test
     */
    public function test_read_address()
    {
        $address = factory(Address::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/addresses/'.$address->id
        );

        $this->assertApiResponse($address->toArray());
    }

    /**
     * @test
     */
    public function test_update_address()
    {
        $address = factory(Address::class)->create();
        $editedAddress = factory(Address::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/addresses/'.$address->id,
            $editedAddress
        );

        $this->assertApiResponse($editedAddress);
    }

    /**
     * @test
     */
    public function test_delete_address()
    {
        $address = factory(Address::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/addresses/'.$address->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/addresses/'.$address->id
        );

        $this->response->assertStatus(404);
    }
}
