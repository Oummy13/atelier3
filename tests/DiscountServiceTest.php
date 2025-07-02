<?php
declare(strict_types=1);

namespace App\Tests;

use App\DiscountService;
use PHPUnit\Framework\TestCase;

class DiscountServiceTest extends TestCase
{
    public function testThrowsExceptionForInvalidPercentage(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Percentage must be between 0 and 100.');

        $service = new DiscountService();
        $service->applyDiscount(100, -10);
    }
}
