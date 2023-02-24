<?php

namespace App\Models;
use App\Models\order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'content',
        'price',
        'qty',
        'color',
        'size',
        'price_sale',
        'menu_id',
        'image',

    ];
    public function Comment(){
        return $this->hasMany(Comment::class ,'product_id  ','id');
    }
    public function orderdetail(){
        return $this->hasMany(orderdetail::class ,'product_id','id');
    }

    public function menu(){
        return $this->belongsTo(Menu::class ,'menu_id','id');
    }
    public function slider (){
        return $this->hasMany(Slider::class ,'product_id','id');
    }
    public function productdetail (){
        return $this->hasMany(Productdetail::class ,'product_id','id');
    }
}
