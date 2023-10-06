<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'travel_id',
        'name',
        'starting_date',
        'ending_date',
        'price',
    ];

    public function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value / 100
        );
    }
}
