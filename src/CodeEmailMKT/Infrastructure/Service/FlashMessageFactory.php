<?php


namespace CodeEmailMKT\Infrastructure\Service;


use Interop\Container\ContainerInterface;
use Zend\Mvc\Controller\Plugin\FlashMessenger;

class FlashMessageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $flashMessenger = new FlashMessenger();
        return new FlashMessage($flashMessenger);
    }
}