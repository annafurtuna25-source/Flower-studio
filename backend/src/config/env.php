<?php

function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new RuntimeException("Fisierul .env nu exista.");
    }

    $lines = file(
        $path,
        FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
    );

    foreach ($lines as $line) {
        $line = trim($line);

        if (str_starts_with($line, '#')) {
            continue;
        }

        if (!str_contains($line, '=')) {
            continue;
        }

        [$name, $value] = explode('=', $line, 2);

        $name = trim($name);
        $value = trim($value);
        $value = trim($value, "\"'");

        if (getenv($name) === false) {
            putenv("$name=$value");
            $_ENV[$name] = $value;
        }
    }
}

function env($key, $default = null)
{
    $value = getenv($key);

    return $value !== false ? $value : $default;
}

loadEnv(__DIR__ . '/../../.env');