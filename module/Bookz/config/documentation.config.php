<?php
return [
    'Bookz\\V1\\Rest\\Author\\Controller' => [
        'description' => 'Expect an author with his books',
        'entity' => [
            'description' => '',
            'GET' => [
                'description' => 'Get an author with his books',
            ],
        ],
    ],
    'Bookz\\V1\\Rest\\Book\\Controller' => [
        'description' => 'Expect a book with its author',
        'entity' => [
            'GET' => [
                'description' => 'Get a book with its author',
            ],
        ],
    ],
];
