<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $table = 'basket';     //sets the table name to basket: Laravel defaults to baskets, plural not singular

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'quantity'
    ];

    public function product() {
        return $this-> belongsTo(Product::class);
    }

}