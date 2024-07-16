<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
// app/Factories/TicketFactory.php

namespace App\Factories;

use app\Contracts\TicketInterface;
use App\Services\Regular;
use App\Services\PremiumTicket;
use app\Services\DiscountedTicket;

class TicketFactory
{
    public static function create(string $ticketType): TicketInterface
    {
        switch (strtolower($ticketType)) {
            case 'regular':
                return new Regular();
            case 'premium':
                return new PremiumTicket();
            case 'discounted':
                return new DiscountedTicket();
            default:
                throw new \InvalidArgumentException("Invalid ticket type: {$ticketType}");
        }
    }
}

