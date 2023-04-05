<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'description', 'product', 'rentable', 'return_date', 'rental_started', 'rented_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
