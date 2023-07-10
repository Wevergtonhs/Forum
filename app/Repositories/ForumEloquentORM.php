<?php

use App\Repositories\ForumRepositoryInterface;

class ForumEloquentORM implements ForumRepositoryInterface {

    public function getAll(string $filter = null) : array
    {
        
    }

    public function findOne(string $id) : stdClass|null
    {
        
    }

    public function create(CreateForumDTO $dto) : stdClass
    {
        
    }

    public function update(UpdateForumDTO $dto) : stdClass|null
    {
        
    }

    public function delete(string $id) : void
    {
        
    }

}