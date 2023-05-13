<?php

namespace App\Repositories\SQL;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\IModelRepository;

abstract class AbstractModelRepository implements IModelRepository
{
    public function __construct(protected Model $model)
    {
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function store(array $data): object
    {
        return $this->model->create($data);
    }

    public function find(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function update(int $id, array $data): bool
    {
        return $this->model->find($id)->update($data);
    }

    public function destroy(int $id): bool
    {
        return $this->model->find($id)->delete();
    }

    public function withRelations(array $relations)
    {
        return  $this->model->with($relations);
    }

    public function paginate(int $perPage = 10): object
    {
        $this->model = $this->model->paginate($perPage);
        return $this;
    }
}
