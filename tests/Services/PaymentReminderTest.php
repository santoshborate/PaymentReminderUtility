<?php
declare(strict_types=1);

namespace PaymentReminderUtility\Tests\Services;

use PaymentReminderUtility\Services\PaymentReminder;
use PHPUnit\Framework\TestCase;

class PaymentReminderTest extends TestCase
{
    /** @var PaymentReminder */
    private $paymentRemonder;

    public function setUp(): void
    {
       $this->paymentRemonder = new PaymentReminder();
    }

    public function testGetPaymentDates(): void
    {
        $result = $this->paymentRemonder->getPaymentDates(1, 2019);
        $this->assertIsArray($result);
        $this->assertEquals(12 , count($result));
    }
}