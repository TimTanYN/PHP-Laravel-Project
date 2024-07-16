<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\CustomerGenderEnum;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
      public $timestamps = false;
    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    protected $fillable = ['customer_id','name', 'email', 'password', 'phone', 'gender'];
    protected $casts = [
        'gender' => CustomerGenderEnum::class
    ];
}
