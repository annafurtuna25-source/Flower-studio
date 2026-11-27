<?php

require_once __DIR__ . '/../services/ProdusService.php';

class ProdusController
{
    private ProdusService $service;

    public function __construct()
    {
        $this->service = new ProdusService();
    }

    public function index(): void
    {
        $produse = $this->service->getAll();

        http_response_code(200);

        echo json_encode(
            $produse,
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );
    }

    public function show(int $id): void
    {
        $produs = $this->service->getById($id);

        if ($produs === null) {
            http_response_code(404);

            echo json_encode([
                'error' => 'Produsul nu exista'
            ]);

            return;
        }

        http_response_code(200);

        echo json_encode(
            $produs,
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );
    }
}