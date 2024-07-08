<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['categorie', 'status', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
