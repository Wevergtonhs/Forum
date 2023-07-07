<?php

namespace App\Services;

class ForumService {

    protected $repository;

    public function __contruct() {

    }

    public function getAll(string $filter = null): array 
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function create(
        string $subject,
        string $status,
        string $body,
    ): stdClass|null 
    {
        return $this->repository->create(
           $subject,
           $status,
           $body,
        );
    }

    public function update(
        string $id,
        string $subject,
        string $status,
        string $body,
    ): stdClass|null
    {
        return $this->repository->update(
           $id,
           $subject,
           $status,
           $body,
        );
    }

    public function delete(string $id): void
    {
        // return $this->repository->delete($id);
    }
}