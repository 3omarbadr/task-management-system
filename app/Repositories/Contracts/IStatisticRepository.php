<?php

namespace App\Repositories\Contracts;


interface IStatisticRepository extends IModelRepository
{
    public function topStatistics(int $number);
}
