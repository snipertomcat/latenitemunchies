<?php

namespace App\Models\Virtual;


use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $fillable = [
        'rate_id',
        'label',
        'compound',
        'tax_amount',
        'shipping_tax_amount'
    ];
}