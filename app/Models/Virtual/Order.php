<?php

/**
 * The purpose of this class is to hold key information about an order.
 * This information is derived from the database table itemmeta table of
 * the storefront and corresponds to the local the order_itemmeta_cache table.
 * The properties stored in each meta_key & meta_value field get selected and
 * saved directly as properties of this model. It is "virtual" because this entity
 * is not actually stored in the database.
 */

namespace App\Models\Virtual;

use Illuminate\Database\Eloquent\Model;

class Order extends Model implements VirtualInterface
{
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

    // The guarded properties will hold the actual OrderItemsCache object that corresponds to this particular order
    // as well as the tax amount (which will be calculated in the calculateTax method of this class:
    protected $guarded = [
        'orderItemsCache',
        'tax'
    ];

    protected $hidden = [
        'aggregates',
        'virtualObjects'
    ];

    public function setVirtualObject($name, $obj)
    {
        $this->makeHidden([
            'virtualObjects' => [
                $name => $obj
            ],
        ]);
    }

    public function aggregates()
    {
        $aggregates = $this->getAttributeValue('aggregates');
    }

    public function addAggregate($name, $aggregate)
    {
        $this->getAttribute('aggregates')[$name] = $aggregate;
    }

    public function getAggregate($name)
    {
        if (in_array($name, $this->getAttribute('aggregates'))) {
            return $this->getAttribute('aggregates')[$name];
        }
    }

    public function getAggregates()
    {
        return $this->getAttribute('aggregates');
    }
}