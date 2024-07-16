<?php
namespace App\Reward;
abstract class Reward
{
    abstract public function getDescription(): string;
}