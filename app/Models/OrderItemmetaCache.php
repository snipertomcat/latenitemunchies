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

    protected $relations = [];

    public function orderItemCache()
    {
        //
        $this->belongsTo('App\Models\OrderItemCache', 'order_item_id', 'order_item_id');
    }

    /**
     * Maps the values in the item meta rows under the 'meta_key' and 'meta_values' columns to
     * an actual model instance to make them easily acceptable.
     */
    public function mapMetaValues()
    {
        return [
            $this->meta_id,
            $this->meta_key,
            $this->order_item_id,
            $this->meta_value
        ];
    }

    public function __set($key, $value)
    {
        parent::__set($key, $value);

        $this->{$key} = $value;
    }
}
