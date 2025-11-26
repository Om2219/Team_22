<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product_image;
use App\Models\Category;

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
        return $this->belongTo(Category::class);
    }


}
