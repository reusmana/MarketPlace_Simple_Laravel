<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'qty'
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product'); // belong to- yaitu product dimiliki banyak cart
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
