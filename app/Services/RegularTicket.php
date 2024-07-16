<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

// app/Services/RegularTicket.php

namespace app\Services;

use app\Contracts\TicketInterface;

class RegularTicket implements TicketInterface
{
    public function getPrice(): float
    {
        return 10.0;
    }

    public function getDescription(): string
    {
        return 'Regular Ticket';
    }
}

// app/Services/PremiumTicket.php

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
}

// app/Services/DiscountedTicket.php

namespace app\Services;

use app\Contracts\TicketInterface;

class DiscountedTicket implements TicketInterface
{
    public function getPrice(): float
    {
        return 7.0;
    }

    public function getDescription(): string
    {
        return 'Discounted Ticket';
    }
}
