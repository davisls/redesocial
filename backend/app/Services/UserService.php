<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Interfaces\UserInterface;

class UserService implements UserInterface {

    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function index() {
        return $this->userRepository->index();
    }
}
