<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'description', 'product_image', 'rentable', 'return_date', 'rental_started'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
