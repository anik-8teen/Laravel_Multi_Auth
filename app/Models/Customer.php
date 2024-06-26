<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        "customerName",
        "password",
        "dob",
        "email",
        "phone",
    ] ;
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function cinfo()
    {
        return $this->hasOne(Customerinfo::class);
    }
}
