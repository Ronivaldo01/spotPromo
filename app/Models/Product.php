<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'product', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
