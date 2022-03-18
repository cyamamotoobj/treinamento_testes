<?php

namespace App\Exercises\Exercise4\Repositories\Interfaces;

interface CartItemRepositoryInterface extends BaseRepositoryInterface {

     public function listByUserId(int $userId);
    
}