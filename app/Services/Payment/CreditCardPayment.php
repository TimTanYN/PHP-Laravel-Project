<?php
namespace App\Services\Payment;

use App\Contracts\PaymentStrategy;

class CreditCardPayment implements PaymentStrategy
{
    public function pay(float $amount): bool
    {
        // Implement credit card payment logic here
        return true;
    }
}