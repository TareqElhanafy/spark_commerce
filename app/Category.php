<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];


    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
