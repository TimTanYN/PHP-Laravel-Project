<?php
namespace App\Reward;
use App\Reward\Reward;
class FreeTicketReward extends Reward
{
    protected $price;
    
    public function getDescription(): string
    {
        return 'It is a free ticket';
    }
    
    public function getTotalPrice():int
    {
        $totalPrice = 100 * 0;
                
        return $totalPrice;
    }
}

