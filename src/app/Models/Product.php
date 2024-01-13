<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function accesses()
    {
        return $this->hasMany(ProductAccess::class);
    }

    public function recommendations() {
        return $this->hasMany(ProductRecommendation::class);
    }
}
