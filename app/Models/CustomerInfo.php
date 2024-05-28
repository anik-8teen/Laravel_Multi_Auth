<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
    use HasFactory;
    protected $table="customer_infos";
    protected $fillable = [
        'fname',
        'gender',
        'address',
        'bio',
        'customer_id',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
