<?php
use App\Reward;
class RewardFactories
{
    public function createReward(string $type, int $value): Reward
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
