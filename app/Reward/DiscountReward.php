<?php

namespace App\Reward;
use App\Reward\Reward;

class DiscountReward extends Reward
{
    protected $discountPercentage;

    public function __construct(int $discountPercentage)
    {
        $this->discountPercentage = $discountPercentage;
    }

    public function getDescription(): string
    {
        return "{$this->discountPercentage}% discount on movie ticket";
    }
    
    public function getTotalPrice() :float
    {
        $price = session()->get('Price');
        $discount = $price * $this->discountPercentage/100;
        $totalPrice = $price - $discount;
        
        return $totalPrice;
    }
}

