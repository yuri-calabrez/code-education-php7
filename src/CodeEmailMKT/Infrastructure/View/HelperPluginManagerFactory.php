<?php
/**
 * Created by PhpStorm.
 * User: Yuri
 * Date: 23/11/2016
 * Time: 22:15
 */

namespace CodeEmailMKT\Infrastructure\View;

use Interop\Container\ContainerInterface;
use Zend\View\HelperPluginManager;
use Zend\View\Renderer\PhpRenderer;

class HelperPluginManagerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');
        $viewHelpers = $config['view_helpers'];
        $manager = new HelperPluginManager($container, $viewHelpers);
        $phpRenderer = new PhpRenderer();
        $phpRenderer->setHelperPluginManager($manager);

        return $manager;
    }
}