<?php
namespace App\Reward;
class RewardFactory
{
    public function createReward(string $type, int $value = 0): Reward
    {
        switch ($type) {
            case 'freeticket':
                return new FreeTicketReward();
            case 'discount':
                return new DiscountReward($value);
            default:
                throw new InvalidArgumentException("Invalid reward type: {$type}");
        }
    }
}