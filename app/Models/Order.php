<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','name','subtotal','discount','tax','total','phone','locality',
        'address','city','state','country','landmark','zip','type',
        'status','is_shipping_different','delivered_date',
        'canceled_date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function Shipping()
    {
        return $this->hasOne(Shipping::class);
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
