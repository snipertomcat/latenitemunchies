<?php
/**
 * Created by: Jesse Griffin
 * Date: 11/8/2016
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ItemMeta extends Model
{
    public $table = 'item_meta';

    // All fillable data is going to be the aggregate of all OrderItemmetaCache objects that make up all meta
    // data for one single line item:
    protected $fillable = [
        '_qty',
        '_tax_class',
        '_product_id',
        '_variation_id',
        '_line_subtotal',
        '_line_total',
        '_line_subtotal_tax',
        '_line_tax',
        '_line_tax_data'
    ];

}