<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

// app/Contracts/TicketInterface.php

namespace app\Contracts;

interface TicketInterface
{
    public function getPrice(): float;
    public function getDescription(): string;
    public function getTotalPrice(int $quantity): float;
}
