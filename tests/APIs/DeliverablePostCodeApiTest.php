<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DeliverablePostCode;

class DeliverablePostCodeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_deliverable_post_code()
    {
        $deliverablePostCode = factory(DeliverablePostCode::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/deliverable_post_codes', $deliverablePostCode
        );

        $this->assertApiResponse($deliverablePostCode);
    }

    /**
     * @test
     */
    public function test_read_deliverable_post_code()
    {
        $deliverablePostCode = factory(DeliverablePostCode::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/deliverable_post_codes/'.$deliverablePostCode->id
        );

        $this->assertApiResponse($deliverablePostCode->toArray());
    }

    /**
     * @test
     */
    public function test_update_deliverable_post_code()
    {
        $deliverablePostCode = factory(DeliverablePostCode::class)->create();
        $editedDeliverablePostCode = factory(DeliverablePostCode::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/deliverable_post_codes/'.$deliverablePostCode->id,
            $editedDeliverablePostCode
        );

        $this->assertApiResponse($editedDeliverablePostCode);
    }

    /**
     * @test
     */
    public function test_delete_deliverable_post_code()
    {
        $deliverablePostCode = factory(DeliverablePostCode::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/deliverable_post_codes/'.$deliverablePostCode->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/deliverable_post_codes/'.$deliverablePostCode->id
        );

        $this->response->assertStatus(404);
    }
}
