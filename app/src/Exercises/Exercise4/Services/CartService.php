<?php

namespace App\Exercises\Exercise4\Services;

class CartService
{
    protected $cartItemRepository;

    protected $userRepository;

    protected $productRepository;

    public function __construct($cartItemRepository, $userRepository, $productRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
    }

    public function addToCart(int $userId, int $productId, int $amount)
    {
        $user = $this->userRepository->findById($userId);
        $product = $this->productRepository->findById($productId);

        if (!empty($user) && !empty($product) && $amount > 0) {
            $cartItem = $this->cartItemRepository->create([
                'user_id' => $user['id'],
                'product_id' => $product['id'],
                'product_name' => $product['name'],
                'unit_value' => $product['value'],
                'amount' => $amount
            ]);
    
            if ($cartItem) {
                return true;
            }
        }

        return false;
    }

    public function removeFromCart(int $cartItemId)
    {
        return $this->cartItemRepository->delete($cartItemId);
    }

    public function updateAmount(int $cartItemId, int $newAmount) 
    {
        $cartItem = $this->cartItemRepository->findById($cartItemId);

        if ($newAmount < 1) {
            return $this->removeFromCart($cartItemId);
        }

        if (!is_null($cartItem)) {
            $cartItem['amount'] = $newAmount;

            $updatedCartItem = $this->cartItemRepository->update($cartItemId, $cartItem);

            if ($updatedCartItem) {
                return true;
            }
        }

        return false;
    }
}

