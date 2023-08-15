<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'bank_id',
         'total_amount',
          'status',
           'address',
        'proof_of_payment',
         'notes'
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }


    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }



    public function banks()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }
}
