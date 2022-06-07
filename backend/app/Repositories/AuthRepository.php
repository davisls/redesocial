<?php

namespace App\Repositories;

use App\Models\User;

class AuthRepository extends BaseRepository {

    private $user;

    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function create($request)
    {
        return User::create([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
    }
}
