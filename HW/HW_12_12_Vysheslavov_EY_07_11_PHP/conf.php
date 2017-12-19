<?php declare(strict_types=1);

return [
    'roots' => [
        // TODO refactor this
        'jpeg' => './uploads/img/',
        'JPEG' => './uploads/img/',
        'jpg' => './uploads/img/',
        'png' => './uploads/img/',
        'csv' => './upload/csv/',
        'pdf' => './uploads/pdf/'
    ],
    'env' => 'dev',
    'filesSize' => 2097152,
    'allowedTypes' => [
        'jpeg',
        'JPEG',
        'jpg',
        'png',
        'pdf',
        'csv'
    ]
];