<?php

namespace App\Repositories;

use App\DTO\CreateForumDTO;
use App\DTO\UpdateForumDTO;
use App\Repositories\PaginateInterface;
use stdClass;

interface ForumRepositoryInterface 
{
    public function paginate(int $page = 1, $totalPerPage = 10, string $filter = null) : PaginateInterface;
    public function getAll(string $filter = null) : array;
    public function findOne(string $id) : stdClass|null;
    public function create(CreateForumDTO $dto) : stdClass;
    public function update(UpdateForumDTO $dto) : stdClass|null;
    public function delete(string $id) : void;
}
