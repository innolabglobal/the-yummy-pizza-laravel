<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePriceOptionRequest;
use App\Http\Requests\UpdatePriceOptionRequest;
use App\Repositories\PriceOptionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PriceOptionController extends AppBaseController
{
    /** @var  PriceOptionRepository */
    private $priceOptionRepository;

    public function __construct(PriceOptionRepository $priceOptionRepo)
    {
        $this->priceOptionRepository = $priceOptionRepo;
    }

    /**
     * Display a listing of the PriceOption.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $priceOptions = $this->priceOptionRepository->paginate(10);

        return view('price_options.index')
            ->with('priceOptions', $priceOptions);
    }

    /**
     * Show the form for creating a new PriceOption.
     *
     * @return Response
     */
    public function create()
    {
        return view('price_options.create');
    }

    /**
     * Store a newly created PriceOption in storage.
     *
     * @param CreatePriceOptionRequest $request
     *
     * @return Response
     */
    public function store(CreatePriceOptionRequest $request)
    {
        $input = $request->all();

        $priceOption = $this->priceOptionRepository->create($input);

        Flash::success('Price Option saved successfully.');

        return redirect(route('priceOptions.index'));
    }

    /**
     * Display the specified PriceOption.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $priceOption = $this->priceOptionRepository->find($id);

        if (empty($priceOption)) {
            Flash::error('Price Option not found');

            return redirect(route('priceOptions.index'));
        }

        return view('price_options.show')->with('priceOption', $priceOption);
    }

    /**
     * Show the form for editing the specified PriceOption.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $priceOption = $this->priceOptionRepository->find($id);

        if (empty($priceOption)) {
            Flash::error('Price Option not found');

            return redirect(route('priceOptions.index'));
        }

        return view('price_options.edit')->with('priceOption', $priceOption);
    }

    /**
     * Update the specified PriceOption in storage.
     *
     * @param int $id
     * @param UpdatePriceOptionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePriceOptionRequest $request)
    {
        $priceOption = $this->priceOptionRepository->find($id);

        if (empty($priceOption)) {
            Flash::error('Price Option not found');

            return redirect(route('priceOptions.index'));
        }

        $priceOption = $this->priceOptionRepository->update($request->all(), $id);

        Flash::success('Price Option updated successfully.');

        return redirect(route('priceOptions.index'));
    }

    /**
     * Remove the specified PriceOption from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $priceOption = $this->priceOptionRepository->find($id);

        if (empty($priceOption)) {
            Flash::error('Price Option not found');

            return redirect(route('priceOptions.index'));
        }

        $this->priceOptionRepository->delete($id);

        Flash::success('Price Option deleted successfully.');

        return redirect(route('priceOptions.index'));
    }
}
