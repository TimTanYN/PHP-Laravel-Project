<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $primaryKey = 'movieId';
    
    public function showtimes()
    {
        return $this->hasMany(Showtime::class, 'movieId');
    }
}
