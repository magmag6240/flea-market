<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'seller_id',
        'buyer_id',
        'condition_id',
        'payment_id',
        'bland_name',
        'price',
        'item_detail',
        'comments',
        'recommendation_updated_at'
    ];

    public function seller()
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
        return $this->hasMany(ItemAccess::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function recommendations()
    {
        return $this->hasMany(ItemRecommendation::class);
    }

    public function updateRecommendation() {

        $id = $this->id();
        $ip_addresses = $this->accesses->pluck('ip');

        $items = ItemAccess::where('ip', $ip_addresses)->where('item_id', '!=', $id)->get();
        $access_counts = $items->groupBy('item_id')
            ->map(function($items) {
                return $items->count();
            })->filter(function($item_count) {
                return ($item_count >= 3);
            })->sortDesc();

        $this->recommendations()->delete();
        foreach ($access_counts as $item_id => $access_count) {
            ItemRecommendation::create([
                'origin_item_id' => $id,
                'item_id' => $item_id,
                'access_count' => $access_count
            ]);
        }
        Item::create([
            'recommendation_updated_at' => Carbon::now()
        ]);

    }

    public function shouldUpdateRecommendation() {
        return (
            is_null($this->recommendation_updated_at) || Carbon::now()->diffInDays($this->recommendation_updated_at) >= 3
        );
    }
}
