<?php

require_once __DIR__ . '/env.php';

function getConnection()
{
    return new PDO(
        env('DB_URL'),
        env('DB_USER'),
        env('DB_PASSWORD'),
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
}