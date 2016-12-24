<?php

use CodeEmailMKT\Application\Action\Customer\{CustomerListPageAction,
    CustomerCreatePageAction, CustomerUpdatePageAction, CustomerRemovePageAction};
use CodeEmailMKT\Application\Action\Customer\Factory as Customer;
use CodeEmailMKT\Application\Action\Tag\{TagListPageAction, TagCreatePageAction,
    TagUpdatePageAction, TagRemovePageAction};
use CodeEmailMKT\Application\Action\Tag\Factory as Tag;
use CodeEmailMKT\Application\Action;

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\AuraRouter::class,
        ],
        'factories' => [
            Action\LoginPageAction::class => Action\LoginPageFactory::class,
            Action\LogoutAction::class => Action\LogoutFactory::class,
            CustomerListPageAction::class => Customer\CustomerListPageFactory::class,
            CustomerCreatePageAction::class => Customer\CustomerCreatePageFactory::class,
            CustomerUpdatePageAction::class => Customer\CustomerUpdatePageFactory::class,
            CustomerRemovePageAction::class => Customer\CustomerRemovePageFactory::class,
            TagListPageAction::class => Tag\TagListPageFactory::class,
            TagCreatePageAction::class => Tag\TagCreatePageFactory::class,
            TagUpdatePageAction::class => Tag\TagUpdatePageFactory::class,
            TagRemovePageAction::class => Tag\TagRemovePageFactory::class
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => CustomerListPageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'auth.login',
            'path' => '/auth/login',
            'middleware' => Action\LoginPageAction::class,
            'allowed_methods' => ['GET', 'POST'],
        ],
        [
            'name' => 'auth.logout',
            'path' => '/auth/logout',
            'middleware' => Action\LogoutAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'customer.list',
            'path' => '/admin/customers',
            'middleware' => CustomerListPageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'customer.create',
            'path' => '/admin/customer/create',
            'middleware' => CustomerCreatePageAction::class,
            'allowed_methods' => ['GET', 'POST'],
        ],
        [
            'name' => 'customer.update',
            'path' => '/admin/customer/update/{id}',
            'middleware' => CustomerUpdatePageAction::class,
            'allowed_methods' => ['GET', 'PUT'],
            'options' => [
                'tokens' => [
                    'id' => '\d+'
                ]
            ]
        ],
        [
            'name' => 'customer.remove',
            'path' => '/admin/customer/{id}/delete',
            'middleware' => CustomerRemovePageAction::class,
            'allowed_methods' => ['GET', 'DELETE'],
            'options' => [
                'tokens' => [
                    'id' => '\d+'
                ]
            ]
        ],
        [
            'name' => 'tag.list',
            'path' => '/admin/tags',
            'middleware' => TagListPageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'tag.create',
            'path' => '/admin/tag/create',
            'middleware' => TagCreatePageAction::class,
            'allowed_methods' => ['GET', 'POST'],
        ],
        [
            'name' => 'tag.update',
            'path' => '/admin/tag/update/{id}',
            'middleware' => TagUpdatePageAction::class,
            'allowed_methods' => ['GET', 'PUT'],
            'options' => [
                'tokens' => [
                    'id' => '\d+'
                ]
            ]
        ],
        [
            'name' => 'tag.remove',
            'path' => '/admin/tag/{id}/delete',
            'middleware' => TagRemovePageAction::class,
            'allowed_methods' => ['GET', 'DELETE'],
            'options' => [
                'tokens' => [
                    'id' => '\d+'
                ]
            ]
        ]
    ],
];
