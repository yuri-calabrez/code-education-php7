<?php
/**
 * Created by PhpStorm.
 * User: Yuri
 * Date: 23/11/2016
 * Time: 22:15
 */

namespace CodeEmailMKT\Infrastructure\Service;


use Aura\Session\Session;
use Interop\Container\ContainerInterface;

class FlashMessageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $session = $container->get(Session::class);
        return new FlashMessage($session);
    }
}