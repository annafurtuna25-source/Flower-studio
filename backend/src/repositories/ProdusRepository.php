<?php

class ProdusRepository
{
    private array $produse;

    public function __construct()
    {
        require __DIR__ . '/../../../src/lib/produse_mock.php';

        $this->produse = $produse;
    }

    public function findAll(): array
    {
        return $this->produse;
    }

    public function findById(int $id): ?array
    {
        foreach ($this->produse as $produs) {
            if ((int) $produs['id_produs'] === $id) {
                return $produs;
            }
        }

        return null;
    }
}