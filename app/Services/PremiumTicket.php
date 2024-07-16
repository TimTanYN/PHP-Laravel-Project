<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

namespace App\Services;

use App\Contracts\TicketInterface;

class PremiumTicket implements TicketInterface
{
    public function getPrice(): float
    {
        return 15.0;
    }

    public function getDescription(): string
    {
        return 'Premium Ticket';
    }
    
    public function getTotalPrice(int $quantity): float
    {
        return $this->getPrice() * $quantity;
    }
}