<?php
namespace App\Services\Payment;

use App\Contracts\PaymentStrategy;

class PaymentContext
{
    private PaymentStrategy $paymentStrategy;

    public function setPaymentStrategy(PaymentStrategy $paymentStrategy): void
    {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function executePayment(float $amount): bool
    {
        return $this->paymentStrategy->pay($amount);
    }
}