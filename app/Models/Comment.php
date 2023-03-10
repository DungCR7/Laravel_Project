<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'content',
        'product_id ',
        'content',
       

    ];
    public function product(){
        return $this->belongsTo(Product::class ,'product_id ','id');
    }
}
