<?php namespace Tests\Repositories;

use App\Models\Menu;
use App\Repositories\MenuRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MenuRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MenuRepository
     */
    protected $menuRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->menuRepo = \App::make(MenuRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_menu()
    {
        $menu = factory(Menu::class)->make()->toArray();

        $createdmenu = $this->menuRepo->create($menu);

        $createdmenu = $createdmenu->toArray();
        $this->assertArrayHasKey('id', $createdmenu);
        $this->assertNotNull($createdmenu['id'], 'Created menu must have id specified');
        $this->assertNotNull(Menu::find($createdmenu['id']), 'menu with given id must be in DB');
        $this->assertModelData($menu, $createdmenu);
    }

    /**
     * @test read
     */
    public function test_read_menu()
    {
        $menu = factory(Menu::class)->create();

        $dbmenu = $this->menuRepo->find($menu->id);

        $dbmenu = $dbmenu->toArray();
        $this->assertModelData($menu->toArray(), $dbmenu);
    }

    /**
     * @test update
     */
    public function test_update_menu()
    {
        $menu = factory(Menu::class)->create();
        $fakemenu = factory(Menu::class)->make()->toArray();

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
        $menu = factory(Menu::class)->create();

        $resp = $this->menuRepo->delete($menu->id);

        $this->assertTrue($resp);
        $this->assertNull(Menu::find($menu->id), 'menu should not exist in DB');
    }
}
