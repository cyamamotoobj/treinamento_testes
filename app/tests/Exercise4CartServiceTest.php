<?php

use PHPUnit\Framework\TestCase;
use App\Exercises\Exercise4\Repositories\Interfaces\UserRepositoryInterface;
use App\Exercises\Exercise4\Repositories\Interfaces\ProductRepositoryInterface;
use App\Exercises\Exercise4\Repositories\Interfaces\CartItemRepositoryInterface;
use App\Exercises\Exercise4\Services\CartService;

class Exercise4CartServiceTest extends TestCase
{

    /**
     * @covers CartService::addToCart
     */
    public function testAddToCart()
    {
        $cartItemRepositoryMock = $this->getMockBuilder(CartItemRepositoryInterface::class)->getMock();
        $cartItemRepositoryMock->method('create')
            ->willReturn([
                'id' => 1,
                'user_id' => 1,
                'product_id' => 1,
                'product_name' => 'Produto 1',
                'unit_value' => 15.99,
                'amount' => 1
            ]);

        $userRepositoryMock = $this->getMockBuilder(UserRepositoryInterface::class)->getMock();
        $userRepositoryMock->method('findById')->willReturn(['id' => 1, 'name' => 'João da Silva', 'zip_code' => '86420000']);

        $productRepositoryMock = $this->getMockBuilder(ProductRepositoryInterface::class)->getMock();
        $productRepositoryMock->method('findById')->willReturn(['id' => 1, 'name' => 'Produto 1', 'value' => 15.99]);

        $cart = new CartService($cartItemRepositoryMock, $userRepositoryMock, $productRepositoryMock);

        self::assertTrue($cart->addToCart(1, 1, 1));
        self::assertFalse($cart->addToCart(1, 1, 0));
    }

    /**
     * @covers CartService::removeFromCart
     */
    public function testRemoveCartItemFromCart()
    {
        $cartItemRepositoryMock = $this->getMockBuilder(CartItemRepositoryInterface::class)->getMock();
        $cartItemRepositoryMock->method('delete')->willReturn(true);

        $userRepositoryMock = $this->getMockBuilder(UserRepositoryInterface::class)->getMock();
        $productRepositoryMock = $this->getMockBuilder(ProductRepositoryInterface::class)->getMock();

        $cart = new CartService($cartItemRepositoryMock, $userRepositoryMock, $productRepositoryMock);

        self::assertTrue($cart->removeFromCart(1));
    }

    /**
     * @covers CartService::updateAmount
     */
    public function testUpdateAmount()
    {
        $cartItemRepositoryMock = $this->getMockBuilder(CartItemRepositoryInterface::class)->getMock();

        $cartItemRepositoryMock->method('delete')->willReturn(true);
        
        $cartItemRepositoryMock->method('findById')
            ->willReturn([
                'id' => 1,
                'user_id' => 1,
                'product_id' => 1,
                'product_name' => 'Produto 1',
                'unit_value' => 15.99,
                'amount' => 1
            ]);

        $cartItemRepositoryMock->method('update')
            ->willReturn([
                'id' => 1,
                'user_id' => 1,
                'product_id' => 1,
                'product_name' => 'Produto 1',
                'unit_value' => 15.99,
                'amount' => 10
            ]);

        $userRepositoryMock = $this->getMockBuilder(UserRepositoryInterface::class)->getMock();
        $productRepositoryMock = $this->getMockBuilder(ProductRepositoryInterface::class)->getMock();

        $cart = new CartService($cartItemRepositoryMock, $userRepositoryMock, $productRepositoryMock);

        self::assertTrue($cart->updateAmount(1,10));
        self::assertTrue($cart->updateAmount(1,0));
    }
}