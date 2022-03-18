<?php

namespace App\Exercises\Exercise4\Repositories\Interfaces;

interface BaseRepositoryInterface {
    
    public function findById(int $id);

    public function list();

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
    
}