<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    /**
     * A product can be in many orders.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}

