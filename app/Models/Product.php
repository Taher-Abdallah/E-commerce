<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'is_featured' => 'boolean',
        'images' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
