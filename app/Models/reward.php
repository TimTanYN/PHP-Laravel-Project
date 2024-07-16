<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;
    
    protected $fillable = ['code','name','type','description','discount'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
}
