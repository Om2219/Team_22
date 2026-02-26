<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'code',
    'type',
    'value',
    'min_spend',
    'expires_at',
    'active',
    'used_at',
];
}
