<?php
namespace App\Services\Payment;

use App\Contracts\PaymentStrategy;

class PaypalPayment implements PaymentStrategy
{
    public function pay(float $amount): bool
    {
        // Implement PayPal payment logic here
        return true;
    }
}