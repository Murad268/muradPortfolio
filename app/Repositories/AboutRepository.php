<?php

namespace App\Repositories;

use App\Models\About;

class AboutRepository extends AbstractRepository
{
    protected $modelClass = About::class;

    public function getFirstText()
    {
        return $this->modelClass::first()->first_text;
    }
}
