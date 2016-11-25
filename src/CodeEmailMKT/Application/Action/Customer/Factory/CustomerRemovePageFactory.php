<?php

namespace CodeEmailMKT\Application\Action\Customer\Factory;


use CodeEmailMKT\Application\Action\Customer\CustomerRemovePageAction;
use CodeEmailMKT\Domain\Persistence\CustomerRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class CustomerRemovePageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $template = $container->get(TemplateRendererInterface::class);
        $repository = $container->get(CustomerRepositoryInterface::class);
        $router = $container->get(RouterInterface::class);
        return new CustomerRemovePageAction($repository, $template, $router);
    }
}
