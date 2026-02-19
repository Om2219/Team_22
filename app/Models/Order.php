<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItems;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'order_ref',
        'total',
        'address_line_1',
        'address_line_2',
        'postcode',
        'city',
        'card_number',
        'expiry_month',
        'expiry_year',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
