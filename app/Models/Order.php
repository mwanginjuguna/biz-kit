<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'order_number',
        'address',
        'discount_id',
        'shipping_address_id',
        'subtotal',
        'total',
        'status',
        'is_paid',
        'tracking_number',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'total' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'is_paid' => 'boolean'
    ];

    /**
     * Get the order items associated with this order.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_items');
    }

    /**
     * Scope a query to only include orders with a specific status.
     */
    public function scopeStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    public function scopeGetYearOrders(Builder $query, int $year): Builder
    {
        return $query->whereYear('created_at', $year);
    }
}
