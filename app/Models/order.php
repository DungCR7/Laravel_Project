<?php

namespace App\Models;
use App\Models\Product;
use App\Models\Custommer;
use App\Models\orderdetail ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'custommer_id',     
        'total',
        'status'
       

    ];
  
    public function orderdetail(){
        return $this->hasMany(orderdetail::class,'order_id','id');
    }
    public function Custommer(){
        return $this->belongsTo(Custommer::class ,'custommer_id','id');
    }
}
