<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'supermarket_id',
    ];

    public function supermarket() {
        return $this->belongsTo(Supermarket::class, 'supermarket_id', 'id');
    }
}
