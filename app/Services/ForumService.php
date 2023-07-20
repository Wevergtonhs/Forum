<?php

namespace App\Services;


use App\Repositories\ForumRepositoryInterface;
use App\DTO\CreateForumDTO;
use App\DTO\UpdateForumDTO;
use stdClass;

class ForumService {

    public function __construct(
        protected ForumRepositoryInterface $repository,
    ) {}

    public function paginate(
        int $page = 1, 
        $totalPerPage = 10, 
        string $filter = null
        ) 
    {
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter
        );
    }

    public function getAll(string $filter = null): array 
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function create(CreateForumDTO $dto): stdClass|null 
    {
        return $this->repository->create($dto);
    }

    public function update(UpdateForumDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        // return $this->repository->delete($id);
    }
}