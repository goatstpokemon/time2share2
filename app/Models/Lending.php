<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    protected $fillable = [
        'lender_id',
        'borrower_id',
        'product_id',
        'returned',
    ];

    public function lender()
    {
        return $this->belongsTo(User::class, 'lender_id');
    }

    public function borrower()
    {
        return $this->belongsTo(User::class, 'borrower_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
