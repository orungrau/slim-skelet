<?php
/**
 * Created by PhpStorm.
 * User: orungrau
 * Date: 14/01/2018
 * Time: 04:55
 */

namespace App\Middleware;


use App\Middleware;

class TestMiddleware extends Middleware
{
    /**
     * Example middleware invokable class
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {
        $response = $next($request, $response);
        return $response;
    }
}