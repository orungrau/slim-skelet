<?php
/**
 * Created by PhpStorm.
 * User: orungrau
 * Date: 14/01/2018
 * Time: 04:53
 */

namespace App;


class Middleware
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }
}