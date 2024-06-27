<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'product_reviews')->withPivot('review', 'rating');
    }
}
