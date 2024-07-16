<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;
    protected $primaryKey = 'showtimeId';
    
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movieId');
    }
    
    public $timestamps = false;
    protected $fillable = ['movieId','hallId','startTime','endTime','date'];
}
