<?php namespace Tests\Repositories;

use App\Models\DeliverablePostCode;
use App\Repositories\DeliverablePostCodeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DeliverablePostCodeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DeliverablePostCodeRepository
     */
    protected $deliverablePostCodeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->deliverablePostCodeRepo = \App::make(DeliverablePostCodeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_deliverable_post_code()
    {
        $deliverablePostCode = factory(DeliverablePostCode::class)->make()->toArray();

        $createdDeliverablePostCode = $this->deliverablePostCodeRepo->create($deliverablePostCode);

        $createdDeliverablePostCode = $createdDeliverablePostCode->toArray();
        $this->assertArrayHasKey('id', $createdDeliverablePostCode);
        $this->assertNotNull($createdDeliverablePostCode['id'], 'Created DeliverablePostCode must have id specified');
        $this->assertNotNull(DeliverablePostCode::find($createdDeliverablePostCode['id']), 'DeliverablePostCode with given id must be in DB');
        $this->assertModelData($deliverablePostCode, $createdDeliverablePostCode);
    }

    /**
     * @test read
     */
    public function test_read_deliverable_post_code()
    {
        $deliverablePostCode = factory(DeliverablePostCode::class)->create();

        $dbDeliverablePostCode = $this->deliverablePostCodeRepo->find($deliverablePostCode->id);

        $dbDeliverablePostCode = $dbDeliverablePostCode->toArray();
        $this->assertModelData($deliverablePostCode->toArray(), $dbDeliverablePostCode);
    }

    /**
     * @test update
     */
    public function test_update_deliverable_post_code()
    {
        $deliverablePostCode = factory(DeliverablePostCode::class)->create();
        $fakeDeliverablePostCode = factory(DeliverablePostCode::class)->make()->toArray();

        $updatedDeliverablePostCode = $this->deliverablePostCodeRepo->update($fakeDeliverablePostCode, $deliverablePostCode->id);

        $this->assertModelData($fakeDeliverablePostCode, $updatedDeliverablePostCode->toArray());
        $dbDeliverablePostCode = $this->deliverablePostCodeRepo->find($deliverablePostCode->id);
        $this->assertModelData($fakeDeliverablePostCode, $dbDeliverablePostCode->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_deliverable_post_code()
    {
        $deliverablePostCode = factory(DeliverablePostCode::class)->create();

        $resp = $this->deliverablePostCodeRepo->delete($deliverablePostCode->id);

        $this->assertTrue($resp);
        $this->assertNull(DeliverablePostCode::find($deliverablePostCode->id), 'DeliverablePostCode should not exist in DB');
    }
}
