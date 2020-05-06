<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateOrderAPIRequest;
use App\Http\Requests\API\UpdateOrderAPIRequest;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;

/**
 * Class OrderController
 * @package App\Http\Controllers\API
 */
class OrderAPIController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;

    public function __construct (OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
    }

    /**
     * Display a listing of the Order.
     * GET|HEAD /orders
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index (Request $request)
    {
        $orders = $this->orderRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($orders->toArray(), 'Orders retrieved successfully');
    }

    /**
     * Store a newly created Order in storage.
     * POST /orders
     *
     * @param CreateOrderAPIRequest $request
     *
     * @return JsonResponse
     */
    public function store (CreateOrderAPIRequest $request)
    {
        $input = $request->all();

        $order = $this->orderRepository->create($input);

        return $this->sendResponse($order->toArray(), 'Order saved successfully');
    }

    /**
     * Display the specified Order.
     * GET|HEAD /orders/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show ($id)
    {
        /** @var Order $order */
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        return $this->sendResponse($order->toArray(), 'Order retrieved successfully');
    }

    /**
     * Update the specified Order in storage.
     * PUT/PATCH /orders/{id}
     *
     * @param int $id
     * @param UpdateOrderAPIRequest $request
     *
     * @return JsonResponse
     */
    public function update ($id, UpdateOrderAPIRequest $request)
    {
        $input = $request->all();

        /** @var Order $order */
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        $order = $this->orderRepository->update($input, $id);

        return $this->sendResponse($order->toArray(), 'Order updated successfully');
    }

    /**
     * Remove the specified Order from storage.
     * DELETE /orders/{id}
     *
     * @param int $id
     *
     * @return JsonResponse
     * @throws Exception
     *
     */
    public function destroy ($id)
    {
        /** @var Order $order */
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        $order->delete();

        return $this->sendSuccess('Order deleted successfully');
    }

    /**
     *  Place Order
     *  POST /place-orders
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function placeOrder (Request $request)
    {
        $userId = null;

        // TODO: this could be implemented in better way after more study
        if ($token = $request->bearerToken()) {
            $model = Sanctum::$personalAccessTokenModel;

            $accessToken = $model::findToken($token);
            $userId = $accessToken->tokenable_id;
        }
        
        $order = $this->orderRepository->storeOrderDetails($request->all(), $userId);

        return $this->sendResponse($order->toArray(), 'Order placed successfully');
    }

    public function getOrderHistory (Request $request)
    {
        $orders = $this->orderRepository->with('items.menu')->all(['user_id' => auth()->user()->id]);

        return $this->sendResponse($orders->toArray(), 'Orders history retrieved successfully');
    }

    public function getOrderHistoryDetails ($id)
    {
        $order = $this->orderRepository->with(['items.priceOption', 'items.menu'])->find($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }


        if ($order->user_id !== auth()->user()->id) {
            return $this->sendError('Unauthenticated');
        }

        return $this->sendResponse($order->toArray(), 'Order retrieved successfully');
    }
}
