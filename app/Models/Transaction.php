<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id'
    ];

    //membuat reationship
    public function detail(){ //hasmany punya banyak transactiondetail
        return $this->hasMany('App\Models\TransactionDetails');
    }
}
