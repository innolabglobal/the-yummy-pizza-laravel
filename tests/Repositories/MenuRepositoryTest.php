<?php namespace Tests\Repositories;

use App\Models\Menu;
use App\Repositories\MenuRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MenuRepositoryTest extends TestCase
{
    use ApiTestTrait, RefreshDatabase;

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

        $createdMenu = $this->menuRepo->create($menu);

        $createdMenu = $createdMenu->toArray();
        $this->assertArrayHasKey('id', $createdMenu);
        $this->assertNotNull($createdMenu['id'], 'Created menu must have id specified');
        $this->assertNotNull(Menu::find($createdMenu['id']), 'menu with given id must be in DB');
        $this->assertModelData($menu, $createdMenu);
    }

    /**
     * @test read
     */
    public function test_read_menu()
    {
        $menu = factory(Menu::class)->create();

        $dbMenu = $this->menuRepo->find($menu->id);

        $dbMenu = $dbMenu->toArray();
        $this->assertModelData($menu->toArray(), $dbMenu);
    }

    /**
     * @test update
     */
    public function test_update_menu()
    {
        $menu = factory(Menu::class)->create();
        $fakeMenu = factory(Menu::class)->make()->toArray();

        $updatedMenu = $this->menuRepo->update($fakeMenu, $menu->id);

        $this->assertModelData($fakeMenu, $updatedMenu->toArray());
        $dbMenu = $this->menuRepo->find($menu->id);
        $this->assertModelData($fakeMenu, $dbMenu->toArray());
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
