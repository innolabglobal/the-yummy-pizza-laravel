<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\OrderItem;

class OrderItemApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, RefreshDatabase;

    /**
     * @test
     */
    public function test_create_order_item()
    {
        $orderItem = factory(OrderItem::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/order_items', $orderItem
        );

        $this->assertApiResponse($orderItem);
    }

    /**
     * @test
     */
    public function test_read_order_item()
    {
        $orderItem = factory(OrderItem::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/order_items/'.$orderItem->id
        );

        $this->assertApiResponse($orderItem->toArray());
    }

    /**
     * @test
     */
    public function test_update_order_item()
    {
        $orderItem = factory(OrderItem::class)->create();
        $editedOrderItem = factory(OrderItem::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/order_items/'.$orderItem->id,
            $editedOrderItem
        );

        $this->assertApiResponse($editedOrderItem);
    }

    /**
     * @test
     */
    public function test_delete_order_item()
    {
        $orderItem = factory(OrderItem::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/order_items/'.$orderItem->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/order_items/'.$orderItem->id
        );

        $this->response->assertStatus(404);
    }
}
