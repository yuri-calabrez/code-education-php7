<?php

use Zend\View;
use \CodeEmailMKT\Infrastructure;
use CodeEmailMKT\Application\Form;

$forms = [
    'dependencies' => [
        'aliases' => [

        ],
        'invokables' => [

        ],
        'factories' => [
            View\HelperPluginManager::class => Infrastructure\View\HelperPluginManagerFactory::class,
            Form\CustomerForm::class => Form\Factory\CustomerFormFactory::class
        ]
    ],
    'view_helpers' => [
        'aliases' => [

        ],
        'invokables' => [

        ],
        'factories' => [

        ]
    ]
];

$configProviderForm = (new \Zend\Form\ConfigProvider())->__invoke();

return Zend\Stdlib\ArrayUtils::merge($configProviderForm, $forms);