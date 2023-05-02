<?php

namespace App\Repositories\SQL;


use App\Models\Statistic;
use App\Repositories\SQL\AbstractModelRepository;
use App\Repositories\Contracts\IStatisticRepository;

class StatisticRepository extends AbstractModelRepository implements IStatisticRepository
{
    /**
     * @param Statistic $model
     */
    public function __construct(Statistic $model)
    {
        parent::__construct($model);
    }
}
