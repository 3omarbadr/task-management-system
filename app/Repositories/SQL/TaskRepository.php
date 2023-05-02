<?php

namespace App\Repositories\SQL;


use App\Models\Task;
use App\Repositories\SQL\AbstractModelRepository;
use App\Repositories\Contracts\ITaskRepository;

class TaskRepository extends AbstractModelRepository implements ITaskRepository
{
    /**
     * @param Task $model
     */
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }
}
