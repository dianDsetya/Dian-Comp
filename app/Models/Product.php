<?php

namespace App\Models;

use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Hashidable;

    protected $fillable = [
        'name',
        'slug',
        'brand',
        'processor',
        'ram',
        'price',
        'description',
        'image',
        'views'
    ];

    public function getImageUrlAttribute()
    {
        // Langsung ke folder product di public
        return $this->image ? asset('product/' . $this->image) : asset('images/default-product.jpg');
    }

    public function getRouteKeyName()
    {
        return 'hashid';
    }
}
