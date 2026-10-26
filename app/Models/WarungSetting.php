<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarungSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'phone_whatsapp',
        'maps_url',
        'opening_time',
        'closing_time',
        'is_open',
    ];

    protected $casts = [
        'is_open' => 'boolean',
    ];
}
