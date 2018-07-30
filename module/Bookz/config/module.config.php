<?php
return [
    'router' => [
        'routes' => [
            'bookz.rest.doctrine.book' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/book[/:book_id]',
                    'defaults' => [
                        'controller' => 'Bookz\\V1\\Rest\\Book\\Controller',
                    ],
                ],
            ],
            'bookz.rest.doctrine.author' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/author[/:author_id]',
                    'defaults' => [
                        'controller' => 'Bookz\\V1\\Rest\\Author\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            1 => 'bookz.rest.doctrine.book',
            2 => 'bookz.rest.doctrine.author',
        ],
    ],
    'zf-rest' => [
        'Bookz\\V1\\Rest\\Book\\Controller' => [
            'listener' => \Bookz\V1\Rest\Book\BookResource::class,
            'route_name' => 'bookz.rest.doctrine.book',
            'route_identifier_name' => 'book_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'book',
            'entity_http_methods' => [
                0 => 'GET',
            ],
            'collection_http_methods' => [],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Application\Entity\Book::class,
            'collection_class' => \Bookz\V1\Rest\Book\BookCollection::class,
            'service_name' => 'Book',
        ],
        'Bookz\\V1\\Rest\\Author\\Controller' => [
            'listener' => \Bookz\V1\Rest\Author\AuthorResource::class,
            'route_name' => 'bookz.rest.doctrine.author',
            'route_identifier_name' => 'author_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'author',
            'entity_http_methods' => [
                0 => 'GET',
            ],
            'collection_http_methods' => [],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Application\Entity\Author::class,
            'collection_class' => \Bookz\V1\Rest\Author\AuthorCollection::class,
            'service_name' => 'Author',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Bookz\\V1\\Rest\\Book\\Controller' => 'HalJson',
            'Bookz\\V1\\Rest\\Author\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Bookz\\V1\\Rest\\Book\\Controller' => [
                0 => 'application/vnd.bookz.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Bookz\\V1\\Rest\\Author\\Controller' => [
                0 => 'application/vnd.bookz.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Bookz\\V1\\Rest\\Book\\Controller' => [
                0 => 'application/vnd.bookz.v1+json',
                1 => 'application/json',
            ],
            'Bookz\\V1\\Rest\\Author\\Controller' => [
                0 => 'application/vnd.bookz.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Application\Entity\Book::class => [
                'route_identifier_name' => 'book_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'bookz.rest.doctrine.book',
                'hydrator' => 'Bookz\\V1\\Rest\\Book\\BookHydrator',
            ],
            \Bookz\V1\Rest\Book\BookCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'bookz.rest.doctrine.book',
                'is_collection' => true,
            ],
            \Application\Entity\Author::class => [
                'route_identifier_name' => 'author_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'bookz.rest.doctrine.author',
                'hydrator' => 'Bookz\\V1\\Rest\\Author\\AuthorHydrator',
            ],
            \Bookz\V1\Rest\Author\AuthorCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'bookz.rest.doctrine.author',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'doctrine-connected' => [
            \Bookz\V1\Rest\Book\BookResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Bookz\\V1\\Rest\\Book\\BookHydrator',
            ],
            \Bookz\V1\Rest\Author\AuthorResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Bookz\\V1\\Rest\\Author\\AuthorHydrator',
            ],
        ],
    ],
    'doctrine-hydrator' => [
        'Bookz\\V1\\Rest\\Book\\BookHydrator' => [
            'entity_class' => \Application\Entity\Book::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [
                'author' => \ZF\Doctrine\Hydrator\Strategy\EntityLink::class,
            ],
            'use_generated_hydrator' => true,
        ],
        'Bookz\\V1\\Rest\\Author\\AuthorHydrator' => [
            'entity_class' => \Application\Entity\Author::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [
                'books' => \ZF\Doctrine\Hydrator\Strategy\CollectionExtract::class,
            ],
            'use_generated_hydrator' => true,
        ],
    ],
    'zf-content-validation' => [
        'Bookz\\V1\\Rest\\Book\\Controller' => [
            'input_filter' => 'Bookz\\V1\\Rest\\Book\\Validator',
        ],
        'Bookz\\V1\\Rest\\Author\\Controller' => [
            'input_filter' => 'Bookz\\V1\\Rest\\Author\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Bookz\\V1\\Rest\\Book\\Validator' => [],
        'Bookz\\V1\\Rest\\Author\\Validator' => [],
    ],
];
