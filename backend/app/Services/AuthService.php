<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Exception;

class AuthService implements AuthInterface {

    private $authRepository;

    public function __construct(authRepository $authRepository) {
        $this->authRepository = $authRepository;
    }

    public function login($request){
        if(Auth::attempt($request->all()))
            return $request->user()->createToken('token')->plainTextToken;

        throw new Exception('Wrong credential provided.', 401);
    }

    public function register(RegisterRequest $request) {
        $user = $this->authRepository->create($request);

        if(!$user)
            throw new Exception('Wrong data provided.', 401);

        return $user;
    }
}
