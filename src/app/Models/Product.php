<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function updateRecommendation() {

        $id = $this->id();
        $ip_addresses = $this->accesses->pluck('ip');

        $products = ProductAccess::where('ip', $ip_addresses)->where('product_id', '!=', $id)->get();
        $access_counts = $products->groupBy('product_id')
            ->map(function($products) {
                return $products->count();
            })->filter(function($product_count) {
                return ($product_count >= 3);
            })->sortDesc();

        $this->recommendations()->delete();
        foreach ($access_counts as $product_id => $access_count) {
            ProductRecommendation::create([
                'origin_product_id' => $id,
                'product_id' => $product_id,
                'access_count' => $access_count
            ]);
        }
        Product::create([
            'recommendation_updated_at' => Carbon::now()
        ]);

    }

    public function shouldUpdateRecommendation() {
        return (
            is_null($this->recommendation_updated_at) || Carbon::now()->diffInDays($this->recommendation_updated_at) >= 3
        );
    }
}
