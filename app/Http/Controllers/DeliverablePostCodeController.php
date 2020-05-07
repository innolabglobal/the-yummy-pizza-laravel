<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDeliverablePostCodeRequest;
use App\Http\Requests\UpdateDeliverablePostCodeRequest;
use App\Repositories\DeliverablePostCodeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DeliverablePostCodeController extends AppBaseController
{
    /** @var  DeliverablePostCodeRepository */
    private $deliverablePostCodeRepository;

    public function __construct(DeliverablePostCodeRepository $deliverablePostCodeRepo)
    {
        $this->deliverablePostCodeRepository = $deliverablePostCodeRepo;
    }

    /**
     * Display a listing of the DeliverablePostCode.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $deliverablePostCodes = $this->deliverablePostCodeRepository->all();

        return view('deliverable_post_codes.index')
            ->with('deliverablePostCodes', $deliverablePostCodes);
    }

    /**
     * Show the form for creating a new DeliverablePostCode.
     *
     * @return Response
     */
    public function create()
    {
        return view('deliverable_post_codes.create');
    }

    /**
     * Store a newly created DeliverablePostCode in storage.
     *
     * @param CreateDeliverablePostCodeRequest $request
     *
     * @return Response
     */
    public function store(CreateDeliverablePostCodeRequest $request)
    {
        $input = $request->all();

        $deliverablePostCode = $this->deliverablePostCodeRepository->create($input);

        Flash::success('Deliverable Post Code saved successfully.');

        return redirect(route('deliverablePostCodes.index'));
    }

    /**
     * Display the specified DeliverablePostCode.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deliverablePostCode = $this->deliverablePostCodeRepository->find($id);

        if (empty($deliverablePostCode)) {
            Flash::error('Deliverable Post Code not found');

            return redirect(route('deliverablePostCodes.index'));
        }

        return view('deliverable_post_codes.show')->with('deliverablePostCode', $deliverablePostCode);
    }

    /**
     * Show the form for editing the specified DeliverablePostCode.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deliverablePostCode = $this->deliverablePostCodeRepository->find($id);

        if (empty($deliverablePostCode)) {
            Flash::error('Deliverable Post Code not found');

            return redirect(route('deliverablePostCodes.index'));
        }

        return view('deliverable_post_codes.edit')->with('deliverablePostCode', $deliverablePostCode);
    }

    /**
     * Update the specified DeliverablePostCode in storage.
     *
     * @param int $id
     * @param UpdateDeliverablePostCodeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeliverablePostCodeRequest $request)
    {
        $deliverablePostCode = $this->deliverablePostCodeRepository->find($id);

        if (empty($deliverablePostCode)) {
            Flash::error('Deliverable Post Code not found');

            return redirect(route('deliverablePostCodes.index'));
        }

        $deliverablePostCode = $this->deliverablePostCodeRepository->update($request->all(), $id);

        Flash::success('Deliverable Post Code updated successfully.');

        return redirect(route('deliverablePostCodes.index'));
    }

    /**
     * Remove the specified DeliverablePostCode from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deliverablePostCode = $this->deliverablePostCodeRepository->find($id);

        if (empty($deliverablePostCode)) {
            Flash::error('Deliverable Post Code not found');

            return redirect(route('deliverablePostCodes.index'));
        }

        $this->deliverablePostCodeRepository->delete($id);

        Flash::success('Deliverable Post Code deleted successfully.');

        return redirect(route('deliverablePostCodes.index'));
    }
}
