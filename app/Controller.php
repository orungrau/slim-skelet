<?php
/**
 * Created by PhpStorm.
 * User: orungrau
 * Date: 14/01/2018
 * Time: 03:59
 */

namespace App;


class Controller
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function __get($property)
    {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
    }
}