<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PriceOption;

class PriceOptionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_price_option()
    {
        $priceOption = factory(PriceOption::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/price_options', $priceOption
        );

        $this->assertApiResponse($priceOption);
    }

    /**
     * @test
     */
    public function test_read_price_option()
    {
        $priceOption = factory(PriceOption::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/price_options/'.$priceOption->id
        );

        $this->assertApiResponse($priceOption->toArray());
    }

    /**
     * @test
     */
    public function test_update_price_option()
    {
        $priceOption = factory(PriceOption::class)->create();
        $editedPriceOption = factory(PriceOption::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/price_options/'.$priceOption->id,
            $editedPriceOption
        );

        $this->assertApiResponse($editedPriceOption);
    }

    /**
     * @test
     */
    public function test_delete_price_option()
    {
        $priceOption = factory(PriceOption::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/price_options/'.$priceOption->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/price_options/'.$priceOption->id
        );

        $this->response->assertStatus(404);
    }
}
