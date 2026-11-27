<?php

require_once __DIR__ . '/../repositories/ProdusRepository.php';

class ProdusService
{
    private ProdusRepository $repository;

    public function __construct()
    {
        $this->repository = new ProdusRepository();
    }

    public function getAll(): array
    {
        return $this->repository->findAll();
    }

    public function getById(int $id): ?array
    {
        return $this->repository->findById($id);
    }
}