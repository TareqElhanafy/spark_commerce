<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','logo'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

}
