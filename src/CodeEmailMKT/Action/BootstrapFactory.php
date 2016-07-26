<?php

namespace CodeEmailMKT\Action;

use CodeEmailMKT\Infrastructure\Bootstrap;
use Interop\Container\ContainerInterface;

class BootstrapFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $bootstrap = new Bootstrap();
        return new BootstrapAction($bootstrap);
    }
}
