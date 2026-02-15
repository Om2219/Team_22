<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'stock',
        'low_stock'
    ];


    public function product() {
        return $this-> belongTo(Product::class);
    }

}
