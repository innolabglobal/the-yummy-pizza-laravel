<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePriceOptionAPIRequest;
use App\Http\Requests\API\UpdatePriceOptionAPIRequest;
use App\Models\PriceOption;
use App\Repositories\PriceOptionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PriceOptionController
 * @package App\Http\Controllers\API
 */

class PriceOptionAPIController extends AppBaseController
{
    /** @var  PriceOptionRepository */
    private $priceOptionRepository;

    public function __construct(PriceOptionRepository $priceOptionRepo)
    {
        $this->priceOptionRepository = $priceOptionRepo;
    }

    /**
     * Display a listing of the PriceOption.
     * GET|HEAD /priceOptions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $priceOptions = $this->priceOptionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($priceOptions->toArray(), 'Price Options retrieved successfully');
    }

    /**
     * Store a newly created PriceOption in storage.
     * POST /priceOptions
     *
     * @param CreatePriceOptionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePriceOptionAPIRequest $request)
    {
        $input = $request->all();

        $priceOption = $this->priceOptionRepository->create($input);

        return $this->sendResponse($priceOption->toArray(), 'Price Option saved successfully');
    }

    /**
     * Display the specified PriceOption.
     * GET|HEAD /priceOptions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PriceOption $priceOption */
        $priceOption = $this->priceOptionRepository->find($id);

        if (empty($priceOption)) {
            return $this->sendError('Price Option not found');
        }

        return $this->sendResponse($priceOption->toArray(), 'Price Option retrieved successfully');
    }

    /**
     * Update the specified PriceOption in storage.
     * PUT/PATCH /priceOptions/{id}
     *
     * @param int $id
     * @param UpdatePriceOptionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePriceOptionAPIRequest $request)
    {
        $input = $request->all();

        /** @var PriceOption $priceOption */
        $priceOption = $this->priceOptionRepository->find($id);

        if (empty($priceOption)) {
            return $this->sendError('Price Option not found');
        }

        $priceOption = $this->priceOptionRepository->update($input, $id);

        return $this->sendResponse($priceOption->toArray(), 'PriceOption updated successfully');
    }

    /**
     * Remove the specified PriceOption from storage.
     * DELETE /priceOptions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PriceOption $priceOption */
        $priceOption = $this->priceOptionRepository->find($id);

        if (empty($priceOption)) {
            return $this->sendError('Price Option not found');
        }

        $priceOption->delete();

        return $this->sendSuccess('Price Option deleted successfully');
    }
}
