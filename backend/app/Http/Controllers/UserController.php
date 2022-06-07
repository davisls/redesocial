<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;
use App\Interfaces\UserInterface;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserInterface $userService) {
        $this->userService = $userService;
    }

    public function index() {
        try {
            $users = $this->userService->index();
            return response()->json([
                'status' => 'success',
                'error' => false,
                'data' => [
                    'message' => 'users below',
                    'status' => 'authorized',
                    'user' => $users
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
