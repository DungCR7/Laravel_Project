<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    protected $fillable = [
        
        'order_id', 
        'price',    
        'qty',
        'product_id'
    ];
    use HasFactory;
}
