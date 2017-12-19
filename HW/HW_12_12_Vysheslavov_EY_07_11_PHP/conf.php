<?php declare(strict_types=1);

return [
    'roots' => [
        'img' => './uploads/img/',
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