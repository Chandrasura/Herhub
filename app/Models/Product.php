<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'vip_id',
        'image'
    ];

    public function vip(){
        return $this->belongsTo(Vip::class);
    }
}
