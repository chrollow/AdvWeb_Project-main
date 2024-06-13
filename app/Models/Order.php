<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'shipping_fee', 'status', 'date_placed', 'date_shipped'];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'order_has_products', 'order_id', 'product_id')->withPivot('quantity');
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function courier() {
        return $this->belongsTo(Courier::class);
    }
}
