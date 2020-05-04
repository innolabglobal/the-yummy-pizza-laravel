<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrderItemAPIRequest;
use App\Http\Requests\API\UpdateOrderItemAPIRequest;
use App\Models\OrderItem;
use App\Repositories\OrderItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OrderItemController
 * @package App\Http\Controllers\API
 */

class OrderItemAPIController extends AppBaseController
{
    /** @var  OrderItemRepository */
    private $orderItemRepository;

    public function __construct(OrderItemRepository $orderItemRepo)
    {
        $this->orderItemRepository = $orderItemRepo;
    }

    /**
     * Display a listing of the OrderItem.
     * GET|HEAD /orderItems
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $orderItems = $this->orderItemRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($orderItems->toArray(), 'Order Items retrieved successfully');
    }

    /**
     * Store a newly created OrderItem in storage.
     * POST /orderItems
     *
     * @param CreateOrderItemAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderItemAPIRequest $request)
    {
        $input = $request->all();

        $orderItem = $this->orderItemRepository->create($input);

        return $this->sendResponse($orderItem->toArray(), 'Order Item saved successfully');
    }

    /**
     * Display the specified OrderItem.
     * GET|HEAD /orderItems/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OrderItem $orderItem */
        $orderItem = $this->orderItemRepository->find($id);

        if (empty($orderItem)) {
            return $this->sendError('Order Item not found');
        }

        return $this->sendResponse($orderItem->toArray(), 'Order Item retrieved successfully');
    }

    /**
     * Update the specified OrderItem in storage.
     * PUT/PATCH /orderItems/{id}
     *
     * @param int $id
     * @param UpdateOrderItemAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderItemAPIRequest $request)
    {
        $input = $request->all();

        /** @var OrderItem $orderItem */
        $orderItem = $this->orderItemRepository->find($id);

        if (empty($orderItem)) {
            return $this->sendError('Order Item not found');
        }

        $orderItem = $this->orderItemRepository->update($input, $id);

        return $this->sendResponse($orderItem->toArray(), 'OrderItem updated successfully');
    }

    /**
     * Remove the specified OrderItem from storage.
     * DELETE /orderItems/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OrderItem $orderItem */
        $orderItem = $this->orderItemRepository->find($id);

        if (empty($orderItem)) {
            return $this->sendError('Order Item not found');
        }

        $orderItem->delete();

        return $this->sendSuccess('Order Item deleted successfully');
    }
}
