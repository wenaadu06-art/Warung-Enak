<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TableSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_id',
        'session_code',
        'customer_name',
        'status',
        'total_amount',
        'opened_at',
        'closed_at',
    ];

    protected $casts = [
        'total_amount' => 'integer',
        'opened_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function table(): BelongsTo
    {
        return $this->belongsTo(RestaurantTable::class, 'table_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function validOrders(): HasMany
    {
        return $this->hasMany(Order::class)->whereNotIn('status', ['rejected', 'cancelled']);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function recalculateTotal(): int
    {
        $total = (int) $this->validOrders()->sum('subtotal');
        $this->update(['total_amount' => $total]);
        return $total;
    }
}
