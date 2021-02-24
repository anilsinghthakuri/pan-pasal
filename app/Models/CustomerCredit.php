<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCredit extends Model
{
    use HasFactory;

    protected $table  = 'customer_credits';
    protected $priamryKey = 'credit_id';

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','customer_id');
    }
}
