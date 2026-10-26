<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'table_session_id',
        'payment_method',
        'total_amount',
        'amount_paid',
        'change_amount',
        'status',
        'paid_at',
        'cashier_notes',
    ];

    protected $casts = [
        'total_amount' => 'integer',
        'amount_paid' => 'integer',
        'change_amount' => 'integer',
        'paid_at' => 'datetime',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(TableSession::class, 'table_session_id');
    }
}
