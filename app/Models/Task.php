<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'status', 'user_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function profit(){
        return $this->hasOne(Profit::class);
    }

}
