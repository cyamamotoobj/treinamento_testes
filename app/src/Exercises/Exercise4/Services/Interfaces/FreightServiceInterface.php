<?php

namespace App\Exercises\Exercise4\Services\Interfaces;

interface FreightServiceInterface {
    
    public function calculate(string $zipCode);
    
}