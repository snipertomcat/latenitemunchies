<?php

namespace App\Models\LNM;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table = 'wp_zs7hab2d9c_woocommerce_order_items';

    protected $connection = 'mysql_wordpress';

    protected $fillable = [
        'order_item_id',
        'order_item_name',
        'order_item_type',
        'order_id'
    ];

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);
        print_r($this);
    }
}
