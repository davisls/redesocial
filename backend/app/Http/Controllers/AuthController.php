<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\AuthServices;
use App\Interfaces\AuthInterface;
use App\Http\Requests\RegisterRequest;
use Exception;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthInterface $authService) {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request) {
        try {
            $user = $this->authService->register($request);
            return response()->json([
                'status' => 'success',
                'error' => false,
                'data' => [
                    'message' => 'users created successfully',
                    'status' => 'authorized',
                    'user' => $user
                ]
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'status' => 'error',
                'error' => true,
                'data' => [
                    'message' => $ex->getMessage(),
                    'code' => $ex->getCode(),
                    'status' => 'unauthorized'
                ]
            ], $ex->getCode());
        }
    }

    public function login(Request $request) {
        try {
            $token = $this->authService->login($request);
            return response()->json([
                'status' => 'success',
                'error' => false,
                'data' => [
                    'message' => 'users logged successfully',
                    'status' => 'authorized',
                    'token' => $token
                ]
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'status' => 'error',
                'error' => true,
                'data' => [
                    'message' => $ex->getMessage(),
                    'code' => $ex->getCode(),
                    'status' => 'unauthorized'
                ]
            ], $ex->getCode());
        }
    }
}
