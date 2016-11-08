<?php
/**
 * Created by: Jesse Griffin
 * Date: 11/3/2016
 */

namespace App\Models\Virtual;

interface VirtualInterface
{
    public function setVirtualObject($name, $obj);

    public function aggregates();

    public function addAggregate($name, $aggregate);

    public function getAggregate($name);

    public function getAggregates();
}