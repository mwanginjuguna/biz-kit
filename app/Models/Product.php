<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'category',
        'brand',
        'stock_quantity',
        'return_policy',
        'shipped_from',
        'image',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Get the product image URL.
     */
    public function getImageUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->image);
    }

    /**
     * features
     */
    public function productFeatures(): HasMany
    {
        return $this->hasMany(ProductFeature::class);
    }

    /**
     * features
     */
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_items');
    }

    /**
     * Scope a query to only include active products.
     */
    public function scopeActive($query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('is_active', true);
    }
}
