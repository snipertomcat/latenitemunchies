<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    private $id;

    private $custData;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCustData()
    {
        return $this->custData;
    }

    /**
     * @param mixed $custData
     */
    public function setCustData($custData)
    {
        $this->custData = $custData;
    }


}
