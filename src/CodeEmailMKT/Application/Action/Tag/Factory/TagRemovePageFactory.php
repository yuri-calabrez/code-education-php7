<?php

namespace CodeEmailMKT\Application\Action\Tag\Factory;


use CodeEmailMKT\Application\Action\Tag\TagRemovePageAction;
use CodeEmailMKT\Application\Form\TagForm;
use CodeEmailMKT\Domain\Persistence\TagRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class TagRemovePageFactory
{
    public function __invoke(ContainerInterface $container) : TagRemovePageAction
    {
        $template = $container->get(TemplateRendererInterface::class);
        $repository = $container->get(TagRepositoryInterface::class);
        $router = $container->get(RouterInterface::class);
        $form = $container->get(TagForm::class);
        return new TagRemovePageAction($repository, $template, $router, $form);
    }
}
