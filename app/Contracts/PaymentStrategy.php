<?php

namespace App\Contracts;

interface PaymentStrategy
{
    public function pay(float $amount): bool;
}
?>