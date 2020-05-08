<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Menu;

class MenuApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, RefreshDatabase;

    /**
     * @test
     */
    public function test_create_menu()
    {
        $this->markTestSkipped('Disabled API Routes.');

        $menu = factory(Menu::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/menus', $menu
        );

        $this->assertApiResponse($menu);
    }

    /**
     * @test
     */
    public function test_read_menu()
    {
        $menu = factory(Menu::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/menus/'.$menu->id
        );

        $this->assertApiResponse($menu->toArray());
    }

    /**
     * @test
     */
    public function test_update_menu()
    {
        $this->markTestSkipped('Disabled API Routes.');

        $menu = factory(Menu::class)->create();
        $editedmenu = factory(Menu::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/menus/'.$menu->id,
            $editedmenu
        );

        $this->assertApiResponse($editedmenu);
    }

    /**
     * @test
     */
    public function test_delete_menu()
    {
        $this->markTestSkipped('Disabled API Routes.');

        $menu = factory(Menu::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/menus/'.$menu->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/menus/'.$menu->id
        );

        $this->response->assertStatus(404);
    }
}
