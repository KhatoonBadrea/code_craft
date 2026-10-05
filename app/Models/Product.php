<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'quantity', 'available', 'category_id'])]

class Product extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
