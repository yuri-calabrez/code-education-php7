<?php

use Zend\View;
use \CodeEmailMKT\Infrastructure;
use CodeEmailMKT\Application\Form\{CustomerForm, LoginForm};
use CodeEmailMKT\Application\Form\Factory\{CustomerFormFactory, LoginFormFactory};

$forms = [
    'dependencies' => [
        'aliases' => [

        ],
        'invokables' => [

        ],
        'factories' => [
            View\HelperPluginManager::class => Infrastructure\View\HelperPluginManagerFactory::class,
            LoginForm::class => LoginFormFactory::class,
            CustomerForm::class => CustomerFormFactory::class
        ]
    ],
    'view_helpers' => [
        'aliases' => [

        ],
        'invokables' => [

        ],
        'factories' => [
           'identity' => View\Helper\Service\IdentityFactory::class
        ]
    ]
];

$configProviderForm = (new \Zend\Form\ConfigProvider())->__invoke();

return Zend\Stdlib\ArrayUtils::merge($configProviderForm, $forms);