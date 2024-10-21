<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'coupon_code','type','value','expiry_date','status'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
