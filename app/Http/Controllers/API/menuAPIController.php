<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemenuAPIRequest;
use App\Http\Requests\API\UpdatemenuAPIRequest;
use App\Models\menu;
use App\Repositories\menuRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class menuController
 * @package App\Http\Controllers\API
 */

class menuAPIController extends AppBaseController
{
    /** @var  menuRepository */
    private $menuRepository;

    public function __construct(menuRepository $menuRepo)
    {
        $this->menuRepository = $menuRepo;
    }

    /**
     * Display a listing of the menu.
     * GET|HEAD /menus
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $menus = $this->menuRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($menus->toArray(), 'Menus retrieved successfully');
    }

    /**
     * Store a newly created menu in storage.
     * POST /menus
     *
     * @param CreatemenuAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatemenuAPIRequest $request)
    {
        $input = $request->all();

        $menu = $this->menuRepository->create($input);

        return $this->sendResponse($menu->toArray(), 'Menu saved successfully');
    }

    /**
     * Display the specified menu.
     * GET|HEAD /menus/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var menu $menu */
        $menu = $this->menuRepository->find($id);

        if (empty($menu)) {
            return $this->sendError('Menu not found');
        }

        return $this->sendResponse($menu->toArray(), 'Menu retrieved successfully');
    }

    /**
     * Update the specified menu in storage.
     * PUT/PATCH /menus/{id}
     *
     * @param int $id
     * @param UpdatemenuAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemenuAPIRequest $request)
    {
        $input = $request->all();

        /** @var menu $menu */
        $menu = $this->menuRepository->find($id);

        if (empty($menu)) {
            return $this->sendError('Menu not found');
        }

        $menu = $this->menuRepository->update($input, $id);

        return $this->sendResponse($menu->toArray(), 'menu updated successfully');
    }

    /**
     * Remove the specified menu from storage.
     * DELETE /menus/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var menu $menu */
        $menu = $this->menuRepository->find($id);

        if (empty($menu)) {
            return $this->sendError('Menu not found');
        }

        $menu->delete();

        return $this->sendSuccess('Menu deleted successfully');
    }
}
