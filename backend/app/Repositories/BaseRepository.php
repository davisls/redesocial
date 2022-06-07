<?php

namespace App\Repositories;

class BaseRepository {

    protected $object;

    public function __construct(object $object) {
        $this->object = $object;
    }

    public function index() {
        return $this->object->all();
    }

    public function findById($id) {
        return $this->object->find($id);
    }

    public function create($request) {
        return $this->object->create($request->all());
    }
}
