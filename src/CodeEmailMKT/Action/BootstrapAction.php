<?php

namespace CodeEmailMKT\Action;

use CodeEmailMKT\Service\BootstrapInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class BootstrapAction
{


    /**
     * @var BootstrapInterface
     */
    private $bootstrapInterface;

    public function __construct(BootstrapInterface $bootstrapInterface)
    {

        $this->bootstrapInterface = $bootstrapInterface;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $this->bootstrapInterface->create();
        return $next($request, $response);
    }
}
