<?php

namespace App\Exercises\Exercise4\Services;

use App\Math\Calculate;

class CartCalculateService
{
    protected $cartItemRepository;

    protected $userRepository;

    protected $freightService;

    public function __construct($cartItemRepository, $userRepository, $freightService)
    {
        $this->cartItemRepository = $cartItemRepository;
        $this->userRepository = $userRepository;
        $this->freightService = $freightService;
    }


    public function cartTotalWithFreight(int $userId)
    {
        $user = $this->userRepository->findById($userId);

        $cartItems = $this->cartItemRepository->listByUserId($userId);

        $itemValues = [];

        foreach ($cartItems as $item) {
            $itemValues[] = $item['unit_value'] * $item['amount'];
        }

        $cartValue = round(Calculate::sum($itemValues),2);

        if ($cartValue >= 100) {
            $cartValue += $this->freightService->calculate($user['zip_code']);
        }

        return $cartValue;
    }
}


