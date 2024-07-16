<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

// app/Collections/MovieCollection.php

namespace App\Collections;

use App\Iterators\MovieDatabaseIterator;
use IteratorAggregate;

class MovieCollection implements IteratorAggregate
{
    public function getIterator(): MovieDatabaseIterator
    {
        return new MovieDatabaseIterator();
    }
}
