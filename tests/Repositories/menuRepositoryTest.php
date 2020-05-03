<?php namespace Tests\Repositories;

use App\Models\menu;
use App\Repositories\menuRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class menuRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var menuRepository
     */
    protected $menuRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->menuRepo = \App::make(menuRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_menu()
    {
        $menu = factory(menu::class)->make()->toArray();

        $createdmenu = $this->menuRepo->create($menu);

        $createdmenu = $createdmenu->toArray();
        $this->assertArrayHasKey('id', $createdmenu);
        $this->assertNotNull($createdmenu['id'], 'Created menu must have id specified');
        $this->assertNotNull(menu::find($createdmenu['id']), 'menu with given id must be in DB');
        $this->assertModelData($menu, $createdmenu);
    }

    /**
     * @test read
     */
    public function test_read_menu()
    {
        $menu = factory(menu::class)->create();

        $dbmenu = $this->menuRepo->find($menu->id);

        $dbmenu = $dbmenu->toArray();
        $this->assertModelData($menu->toArray(), $dbmenu);
    }

    /**
     * @test update
     */
    public function test_update_menu()
    {
        $menu = factory(menu::class)->create();
        $fakemenu = factory(menu::class)->make()->toArray();

        $updatedmenu = $this->menuRepo->update($fakemenu, $menu->id);

        $this->assertModelData($fakemenu, $updatedmenu->toArray());
        $dbmenu = $this->menuRepo->find($menu->id);
        $this->assertModelData($fakemenu, $dbmenu->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_menu()
    {
        $menu = factory(menu::class)->create();

        $resp = $this->menuRepo->delete($menu->id);

        $this->assertTrue($resp);
        $this->assertNull(menu::find($menu->id), 'menu should not exist in DB');
    }
}
