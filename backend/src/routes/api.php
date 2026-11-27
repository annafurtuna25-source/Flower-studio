<?php

require_once __DIR__ . '/../controllers/ProdusController.php';

function handleRequest($method, $path)
{
    // Verificarea starii serverului
    if ($method === 'GET' && $path === '/health') {
        http_response_code(200);

        echo json_encode([
            'status' => 'ok'
        ]);

        return;
    }

    // Lista tuturor produselor
    if ($method === 'GET' && $path === '/produse') {
        $controller = new ProdusController();

        $controller->index();

        return;
    }

    // Afisarea unui produs dupa ID
    if (
        $method === 'GET' &&
        preg_match('#^/produse/([0-9]+)$#', $path, $matches)
    ) {
        $controller = new ProdusController();

        $controller->show((int) $matches[1]);

        return;
    }

    // Endpoint inexistent
    http_response_code(404);

    echo json_encode([
        'error' => 'Endpoint inexistent'
    ]);
}