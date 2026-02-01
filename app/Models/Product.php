<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product_image;
use App\Models\Category;
use App\Models\Stock;


class Product extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'name',
        'product_description',
        'price',
        'category_id'

    ];

    public function images() {
        return $this->hasMany(Product_image::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function stock() {
        return $this->hasOne(Stock::class);
    }

    public function reviews(){
        return $this->hasMany(\App\Models\Review::class);
    }


}
