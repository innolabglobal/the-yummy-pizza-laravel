<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Repositories\AddressRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AddressController extends AppBaseController
{
    /** @var  AddressRepository */
    private $addressRepository;

    public function __construct(AddressRepository $addressRepo)
    {
        $this->addressRepository = $addressRepo;
    }

    /**
     * Display a listing of the Address.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $addresses = $this->addressRepository->all();

        return view('addresses.index')
            ->with('addresses', $addresses);
    }

    /**
     * Show the form for creating a new Address.
     *
     * @return Response
     */
    public function create()
    {
        return view('addresses.create');
    }

    /**
     * Store a newly created Address in storage.
     *
     * @param CreateAddressRequest $request
     *
     * @return Response
     */
    public function store(CreateAddressRequest $request)
    {
        $input = $request->all();

        $address = $this->addressRepository->create($input);

        Flash::success('Address saved successfully.');

        return redirect(route('addresses.index'));
    }

    /**
     * Display the specified Address.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('addresses.index'));
        }

        return view('addresses.show')->with('address', $address);
    }

    /**
     * Show the form for editing the specified Address.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('addresses.index'));
        }

        return view('addresses.edit')->with('address', $address);
    }

    /**
     * Update the specified Address in storage.
     *
     * @param int $id
     * @param UpdateAddressRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAddressRequest $request)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('addresses.index'));
        }

        $address = $this->addressRepository->update($request->all(), $id);

        Flash::success('Address updated successfully.');

        return redirect(route('addresses.index'));
    }

    /**
     * Remove the specified Address from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('addresses.index'));
        }

        $this->addressRepository->delete($id);

        Flash::success('Address deleted successfully.');

        return redirect(route('addresses.index'));
    }
}
