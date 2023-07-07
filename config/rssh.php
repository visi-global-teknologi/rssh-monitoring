<?php

return [
    'seeder' => [
        'connection_status' => [
            'disconnect' => 'disconnect',
            'connected' => 'connected',
            'request_terminate' => 'request terminate',
            'pid_server_terminated' => 'pid server terminated',
            'plink_terminated' => 'plink terminated',
        ],
        'user' => [
            'name' => 'azil',
            'email' => 'azil@visiglobalteknologi.co.id',
            'password' => '12345678',
        ],
        'client' => [
            'name' => 'bukaka',
        ],
        'device' => [
            'name' => 'bukaka point 1',
            'description' => 'bukaka point 1',
        ],
    ],
    'device' => [
        'status' => [
            'no' => 'no',
            'yes' => 'yes',
        ],
    ],
    'client' => [
        'status' => [
            'no' => 'no',
            'yes' => 'yes',
        ],
    ],
];
