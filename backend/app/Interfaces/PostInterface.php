<?php

namespace App\Interfaces;

use App\Http\Requests\PostRequest;

interface PostInterface {
    public function store(PostRequest $request);
    public function search($id);
    public function like($id);
    public function unlike($id);
}
