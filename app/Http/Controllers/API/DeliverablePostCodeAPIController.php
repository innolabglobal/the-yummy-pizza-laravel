<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDeliverablePostCodeAPIRequest;
use App\Http\Requests\API\UpdateDeliverablePostCodeAPIRequest;
use App\Models\DeliverablePostCode;
use App\Repositories\DeliverablePostCodeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DeliverablePostCodeController
 * @package App\Http\Controllers\API
 */

class DeliverablePostCodeAPIController extends AppBaseController
{
    /** @var  DeliverablePostCodeRepository */
    private $deliverablePostCodeRepository;

    public function __construct(DeliverablePostCodeRepository $deliverablePostCodeRepo)
    {
        $this->deliverablePostCodeRepository = $deliverablePostCodeRepo;
    }

    /**
     * Display a listing of the DeliverablePostCode.
     * GET|HEAD /deliverablePostCodes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $deliverablePostCodes = $this->deliverablePostCodeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($deliverablePostCodes->toArray(), 'Deliverable Post Codes retrieved successfully');
    }

    /**
     * Store a newly created DeliverablePostCode in storage.
     * POST /deliverablePostCodes
     *
     * @param CreateDeliverablePostCodeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDeliverablePostCodeAPIRequest $request)
    {
        $input = $request->all();

        $deliverablePostCode = $this->deliverablePostCodeRepository->create($input);

        return $this->sendResponse($deliverablePostCode->toArray(), 'Deliverable Post Code saved successfully');
    }

    /**
     * Display the specified DeliverablePostCode.
     * GET|HEAD /deliverablePostCodes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DeliverablePostCode $deliverablePostCode */
        $deliverablePostCode = $this->deliverablePostCodeRepository->find($id);

        if (empty($deliverablePostCode)) {
            return $this->sendError('Deliverable Post Code not found');
        }

        return $this->sendResponse($deliverablePostCode->toArray(), 'Deliverable Post Code retrieved successfully');
    }

    /**
     * Update the specified DeliverablePostCode in storage.
     * PUT/PATCH /deliverablePostCodes/{id}
     *
     * @param int $id
     * @param UpdateDeliverablePostCodeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeliverablePostCodeAPIRequest $request)
    {
        $input = $request->all();

        /** @var DeliverablePostCode $deliverablePostCode */
        $deliverablePostCode = $this->deliverablePostCodeRepository->find($id);

        if (empty($deliverablePostCode)) {
            return $this->sendError('Deliverable Post Code not found');
        }

        $deliverablePostCode = $this->deliverablePostCodeRepository->update($input, $id);

        return $this->sendResponse($deliverablePostCode->toArray(), 'DeliverablePostCode updated successfully');
    }

    /**
     * Remove the specified DeliverablePostCode from storage.
     * DELETE /deliverablePostCodes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DeliverablePostCode $deliverablePostCode */
        $deliverablePostCode = $this->deliverablePostCodeRepository->find($id);

        if (empty($deliverablePostCode)) {
            return $this->sendError('Deliverable Post Code not found');
        }

        $deliverablePostCode->delete();

        return $this->sendSuccess('Deliverable Post Code deleted successfully');
    }
}
