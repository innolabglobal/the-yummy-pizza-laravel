<?php namespace Tests\Repositories;

use App\Models\OrderItem;
use App\Repositories\OrderItemRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\ApiTestTrait;

class OrderItemRepositoryTest extends TestCase
{
    use ApiTestTrait, RefreshDatabase;

    /**
     * @var OrderItemRepository
     */
    protected $orderItemRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->orderItemRepo = \App::make(OrderItemRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_order_item()
    {
        $orderItem = factory(OrderItem::class)->make()->toArray();

        $createdOrderItem = $this->orderItemRepo->create($orderItem);

        $createdOrderItem = $createdOrderItem->toArray();
        $this->assertArrayHasKey('id', $createdOrderItem);
        $this->assertNotNull($createdOrderItem['id'], 'Created OrderItem must have id specified');
        $this->assertNotNull(OrderItem::find($createdOrderItem['id']), 'OrderItem with given id must be in DB');
        $this->assertModelData($orderItem, $createdOrderItem);
    }

    /**
     * @test read
     */
    public function test_read_order_item()
    {
        $orderItem = factory(OrderItem::class)->create();

        $dbOrderItem = $this->orderItemRepo->find($orderItem->id);

        $dbOrderItem = $dbOrderItem->toArray();
        $this->assertModelData($orderItem->toArray(), $dbOrderItem);
    }

    /**
     * @test update
     */
    public function test_update_order_item()
    {
        $orderItem = factory(OrderItem::class)->create();
        $fakeOrderItem = factory(OrderItem::class)->make()->toArray();

        $updatedOrderItem = $this->orderItemRepo->update($fakeOrderItem, $orderItem->id);

        $this->assertModelData($fakeOrderItem, $updatedOrderItem->toArray());
        $dbOrderItem = $this->orderItemRepo->find($orderItem->id);
        $this->assertModelData($fakeOrderItem, $dbOrderItem->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_order_item()
    {
        $orderItem = factory(OrderItem::class)->create();

        $resp = $this->orderItemRepo->delete($orderItem->id);

        $this->assertTrue($resp);
        $this->assertNull(OrderItem::find($orderItem->id), 'OrderItem should not exist in DB');
    }
}
