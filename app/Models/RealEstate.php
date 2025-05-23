<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealEstate extends Model
{
    /** @use HasFactory<\Database\Factories\RealEstateFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'real_state_type',
        'street',
        'external_number',
        'internal_number',
        'neighborhood',
        'city',
        'country',
        'rooms',
        'bathrooms',
        'comments',
    ];
}
