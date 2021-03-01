<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'trend', 'best_rated',  'mid_slider',  'hot_deal', 'main_slider',
        'video_link', 'discount', 'size', 'color',
        'image_three', 'image_two', 'image_one', 'status', 'price', 'quantity',
        'description', 'name', 'brand_id', 'subcategory_id', 'category_id'

    ];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function getStatus()
    {
        return $this->status == 1 ? "Active":"InActive";
    }
}
