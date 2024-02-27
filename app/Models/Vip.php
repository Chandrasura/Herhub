<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vip extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'orders_per_day',
        'percentage_profit',
        'image',
        'description'
    ];
}
