<?php
/**
 * Created by PhpStorm.
 * User: orungrau
 * Date: 14/01/2018
 * Time: 04:29
 */

$app->get('/', 'HomeController:index')->add('TestMiddleware');