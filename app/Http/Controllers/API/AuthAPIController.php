<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\LoginAPIRequest;
use App\Http\Requests\API\RegisterAPIRequest;
use App\User;
use Illuminate\Http\Request;
use Hash;
use Response;
use Illuminate\Validation\ValidationException;


/**
 * Class LoginController
 * @package App\Http\Controllers\API
 */
class AuthAPIController extends AppBaseController
{

    /**
     *  Login.
     * GET|HEAD /login
     *
     * @param LoginAPIRequest $request
     *
     * @return Response
     * @throws ValidationException
     */
    public function login (LoginAPIRequest $request)
    {
        $user = User::where('email', $request->email)->first();


        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'credentials' => ['The provided credentials are incorrect.'],
            ]);
        }


        return $this->sendResponse(
            array_merge($user->toArray(), ['token' => $user->createToken($user->email)->plainTextToken]),
            'Logged in successfully '
        );
    }

    /**
     *  Register,Create User.
     * GET|HEAD /register
     *
     * @param RegisterAPIRequest $request
     *
     * @return Response
     */
    public function register (RegisterAPIRequest $request)
    {
        $data = $request->all();
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $this->sendResponse(
            array_merge($user->toArray(), ['token' => $user->createToken($user->email)->plainTextToken]),
            'Registered successfully '
        );
    }

    public function logout (Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->tokens->each->delete();
        return $this->sendSuccess('Logged out successfully');
    }
}
