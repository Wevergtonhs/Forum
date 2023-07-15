<?php

namespace App\Repositories;

use App\Repositories\ForumRepositoryInterface;
use App\DTO\CreateForumDTO;
use App\DTO\UpdateForumDTO;
use App\Models\Forum;
use stdClass;

class ForumEloquentORM implements ForumRepositoryInterface {

    public function __construct(
        protected Forum $model
    ) {}

    public function getAll(string $filter = null) : array
    {
        return $this->model
            ->where(function($query) use($filter) {
                if($filter){
                    $query->where('subject', 'like', "%{$filter}%");
                    $query->orWhere('body', 'like', "%{$filter}%");
                }
            })
            ->get()
            ->toArray();
    }

    public function findOne(string $id) : stdClass|null
    {
         $topic = $this->model->find($id);

         if (!$topic) {
            return null;
         }

         return (object) $topic->toArray();
    }

    public function create(CreateForumDTO $dto) : stdClass
    {
        $topic = $this->model->create(
            (array) $dto
        );

        return (object) $topic->toArray();
    }

    public function update(UpdateForumDTO $dto) : stdClass|null
    {
       $topic = $this->model->find($dto->id);

       if (!$topic) {
        return null;
       }

       $topic->update(
        (array )$dto
        );

        return (object) $topic->toArray();
    }

    public function delete(string $id) : void
    {
        $this->model->findOrFail($id)->delete();
    }

}