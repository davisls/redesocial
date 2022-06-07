<?php

namespace App\Interfaces;

use App\Http\Requests\RegisterRequest;

interface AuthInterface {
    public function login($request);
    public function register(RegisterRequest $request);
}
