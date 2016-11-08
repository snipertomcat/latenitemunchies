<?php

namespace App\Models\Builder;

interface BuilderInterface
{
    /**
     * This method should fire off a private method with the name starting with build* (like buildOrder()).
     * This is the method through which clients will initiate the build process for that object.
     *
     * @return null
     */
    public function build();
}