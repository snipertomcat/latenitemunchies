<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderItemmetaCache
 */
class OrderItemmetaCache extends Model
{
    protected $table = 'order_itemmeta_cache';

    public $timestamps = true;

    protected $fillable = [
        'meta_id',
        'order_item_id',
        'meta_key',
        'meta_value'
    ];

    protected $guarded = [];

        
}