<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supermarket extends Model
{
    protected $fillabe = [
        'name'
    ];

    public function products() {
        return $this->hasMany(Products::class);
    }
}
