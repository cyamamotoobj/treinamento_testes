<?php

use PHPUnit\Framework\TestCase;
use App\Exercises\Exercise4\Repositories\Interfaces\UserRepositoryInterface;
use App\Exercises\Exercise4\Repositories\Interfaces\CartItemRepositoryInterface;
use App\Exercises\Exercise4\Services\Interfaces\FreightServiceInterface;
use App\Exercises\Exercise4\Services\CartCalculateService;

class Exercise4CartCalculateServiceTest extends TestCase
{

    /**
     * @covers CartCalculateService::cartTotalWithFreight
     */
    public function testCartTotalWithFreight()
    {
        $cartItemRepositoryMock = $this->getMockBuilder(CartItemRepositoryInterface::class)->getMock();
        $cartItemRepositoryMock->method('listByUserId')
            ->willReturn([
                [
                    'id' => 1,
                    'user_id' => 1,
                    'product_id' => 1,
                    'product_name' => 'Produto 1',
                    'unit_value' => 15.99,
                    'amount' => 4
                ],
                [
                    'id' => 2,
                    'user_id' => 1,
                    'product_id' => 2,
                    'product_name' => 'Produto 2',
                    'unit_value' => 5.99,
                    'amount' => 10
                ],
            ]);

        $userRepositoryMock = $this->getMockBuilder(UserRepositoryInterface::class)->getMock();
        $userRepositoryMock->method('findById')
            ->willReturn(['id' => 1, 'name' => 'João da Silva', 'zip_code' => '86420000']);

        $freightServiceMock = $this->getMockBuilder(FreightServiceInterface::class)->getMock();
        $freightServiceMock->method('calculate')
            ->willReturn(20.00);

        $calculation = new CartCalculateService($cartItemRepositoryMock, $userRepositoryMock, $freightServiceMock);

        self::assertEquals(143.86,$calculation->cartTotalWithFreight(1));
    }

    /**
     * @covers CartCalculateService::cartTotalWithFreight
     */
    public function testCartTotalWithoutFreight()
    {
        $cartItemRepositoryMock = $this->getMockBuilder(CartItemRepositoryInterface::class)->getMock();
        $cartItemRepositoryMock->method('listByUserId')
            ->willReturn([
                [
                    'id' => 1,
                    'user_id' => 1,
                    'product_id' => 1,
                    'product_name' => 'Produto 1',
                    'unit_value' => 15.99,
                    'amount' => 4
                ]
            ]);

        $userRepositoryMock = $this->getMockBuilder(UserRepositoryInterface::class)->getMock();
        $userRepositoryMock->method('findById')
            ->willReturn(['id' => 1, 'name' => 'João da Silva', 'zip_code' => '86420000']);

        $freightServiceMock = $this->getMockBuilder(FreightServiceInterface::class)->getMock();
        $freightServiceMock->method('calculate')->willReturn(20.00);

        $calculation = new CartCalculateService($cartItemRepositoryMock, $userRepositoryMock, $freightServiceMock);

        self::assertEquals(63.96,$calculation->cartTotalWithFreight(1));
    }

    /**
     * @covers CartCalculateService::cartTotalWithFreight
     */
    public function testCartTotalEmpty()
    {
        $cartItemRepositoryMock = $this->getMockBuilder(CartItemRepositoryInterface::class)->getMock();
        $cartItemRepositoryMock->method('listByUserId')->willReturn([]);

        $userRepositoryMock = $this->getMockBuilder(UserRepositoryInterface::class)->getMock();
        $userRepositoryMock->method('findById')
            ->willReturn(['id' => 1, 'name' => 'João da Silva', 'zip_code' => '86420000']);

        $freightServiceMock = $this->getMockBuilder(FreightServiceInterface::class)->getMock();
        $freightServiceMock->method('calculate')->willReturn(20.00);

        $calculation = new CartCalculateService($cartItemRepositoryMock, $userRepositoryMock, $freightServiceMock);

        self::assertEquals(0,$calculation->cartTotalWithFreight(1));
    }
}