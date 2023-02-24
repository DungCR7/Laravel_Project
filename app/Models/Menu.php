<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        
        'description',
        'content',
       

    ];
    public function product(){
        return $this->hasMany(Product::class ,'menu_id','id');
    }
}
