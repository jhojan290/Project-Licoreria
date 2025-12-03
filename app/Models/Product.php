<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'brand', 
        'category', 
        'stock', 
        'price', 
        'volume',
        'alcohol_percentage',
        'description', 
        'image_path'

    ];
}
