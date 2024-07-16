<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'order_id';
    protected $fillable = ['customer_id', 'created_at','updated_at', 'total', 'paymentMethod', 'status'];
  public $timestamps = false;
    
}
