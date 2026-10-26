<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'table_session_id',
        'table_id',
        'customer_name',
        'access_token',
        'status',
        'cancellation_status',
        'cancellation_reason',
        'rejection_reason',
        'notes',
        'subtotal',
    ];

    protected $casts = [
        'subtotal' => 'integer',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(TableSession::class, 'table_session_id');
    }

    public function table(): BelongsTo
    {
        return $this->belongsTo(RestaurantTable::class, 'table_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function recalculateSubtotal(): int
    {
        $subtotal = (int) $this->items()->sum('subtotal');
        $this->update(['subtotal' => $subtotal]);

        if ($this->session) {
            $this->session->recalculateTotal();
        }

        return $subtotal;
    }
}
