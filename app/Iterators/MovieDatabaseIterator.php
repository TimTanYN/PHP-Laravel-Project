<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

// app/Iterators/MovieDatabaseIterator.php

namespace app\Iterators;

use App\Models\Movie;
use Iterator;

class MovieDatabaseIterator implements Iterator
{
    private int $currentIndex = 0;
    private array $movieIds;

    public function __construct()
    {
        $this->movieIds = Movie::pluck('movieId')->toArray();
    }

    public function current(): ?Movie
    {
        return Movie::find($this->movieIds[$this->currentIndex]);
    }

    public function key(): int
    {
        return $this->currentIndex;
    }

    public function next(): void
    {
        ++$this->currentIndex;
    }

    public function rewind(): void
    {
        $this->currentIndex = 0;
    }

    public function valid(): bool
    {
        return isset($this->movieIds[$this->currentIndex]);
    }
}
