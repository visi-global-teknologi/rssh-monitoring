<?php

return [
    'connection_status' => [
        'request_terminate' => 'request terminate'
    ],
    'seeder' => [
        'user' => [
            'name' => 'azil',
            'email' => 'azil@visiglobalteknologi.co.id',
            'password' => bcrypt('12345678'),
        ],
        'client' => [
            'name' => 'bukaka'
        ],
        'device' => [
            'name' => 'bukaka point 1',
            'description' => 'bukaka point 1'
        ]
    ]
];
