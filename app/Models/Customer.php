<?php
/**
 * Created by: Jesse Griffin
 * Date: 11/8/2016
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'first_name',
        'last_name',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'phone'
    ];
}