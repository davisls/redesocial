<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository {

    private $user;

    public function __construct(User $user) {
        parent::__construct($user);
    }
}
