<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'order_id', 'paypal_transaction_id', 'stripe_session_id', 'paypal_payer_id', 'paypal_facilitator_access_token_id', 'total_paid', 'user_name', 'payer_country_code', 'transaction_status', 'transaction_debug_id', 'transaction_message', 'transaction_name'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
