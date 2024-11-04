<?php

namespace App\Repositories;


use App\Models\Team;

class TeamRepository extends AboutRepository
{
    protected $modelClass = Team::class;
}
