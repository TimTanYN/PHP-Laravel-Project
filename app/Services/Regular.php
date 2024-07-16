<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

namespace app\Services;

use App\Contracts\TicketInterface;

class Regular implements TicketInterface
{
    public function getPrice(): float
    {
        return 10.0;
    }

    public function getDescription(): string
    {
        return 'Regular Ticket';
    }
    
    public function getTotalPrice(int $quantity): float
    {
        return $this->getPrice() * $quantity;
    }

  

}