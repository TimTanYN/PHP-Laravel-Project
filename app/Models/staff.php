<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasFactory;
    
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false; 
    
    protected $fillable = ['first_name', 'last_name', 'email'];
    protected $guard = 'staff';
    protected $primaryKey = 'staff_id';
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
