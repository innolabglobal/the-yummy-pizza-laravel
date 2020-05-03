<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\menu;

class menuApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_menu()
    {
        $menu = factory(menu::class)->make()->toArray();

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
        $menu = factory(menu::class)->create();

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
        $menu = factory(menu::class)->create();
        $editedmenu = factory(menu::class)->make()->toArray();

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
        $menu = factory(menu::class)->create();

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
