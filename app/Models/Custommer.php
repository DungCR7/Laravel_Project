<?php

namespace App\Models;
use App\Models\order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custommer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'content',
        'address',
      
    ];
    public function order(){
        return $this->belongsTo(order::class ,'custommer_id','id');
    }
    
}
