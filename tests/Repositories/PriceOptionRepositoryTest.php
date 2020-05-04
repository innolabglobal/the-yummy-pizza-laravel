<?php namespace Tests\Repositories;

use App\Models\PriceOption;
use App\Repositories\PriceOptionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PriceOptionRepositoryTest extends TestCase
{
    use ApiTestTrait, RefreshDatabase;

    /**
     * @var PriceOptionRepository
     */
    protected $priceOptionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->priceOptionRepo = \App::make(PriceOptionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_price_option()
    {
        $priceOption = factory(PriceOption::class)->make()->toArray();

        $createdPriceOption = $this->priceOptionRepo->create($priceOption);

        $createdPriceOption = $createdPriceOption->toArray();
        $this->assertArrayHasKey('id', $createdPriceOption);
        $this->assertNotNull($createdPriceOption['id'], 'Created PriceOption must have id specified');
        $this->assertNotNull(PriceOption::find($createdPriceOption['id']), 'PriceOption with given id must be in DB');
        $this->assertModelData($priceOption, $createdPriceOption);
    }

    /**
     * @test read
     */
    public function test_read_price_option()
    {
        $priceOption = factory(PriceOption::class)->create();

        $dbPriceOption = $this->priceOptionRepo->find($priceOption->id);

        $dbPriceOption = $dbPriceOption->toArray();
        $this->assertModelData($priceOption->toArray(), $dbPriceOption);
    }

    /**
     * @test update
     */
    public function test_update_price_option()
    {
        $priceOption = factory(PriceOption::class)->create();
        $fakePriceOption = factory(PriceOption::class)->make()->toArray();

        $updatedPriceOption = $this->priceOptionRepo->update($fakePriceOption, $priceOption->id);

        $this->assertModelData($fakePriceOption, $updatedPriceOption->toArray());
        $dbPriceOption = $this->priceOptionRepo->find($priceOption->id);
        $this->assertModelData($fakePriceOption, $dbPriceOption->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_price_option()
    {
        $priceOption = factory(PriceOption::class)->create();

        $resp = $this->priceOptionRepo->delete($priceOption->id);

        $this->assertTrue($resp);
        $this->assertNull(PriceOption::find($priceOption->id), 'PriceOption should not exist in DB');
    }
}
