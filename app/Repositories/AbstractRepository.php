<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
abstract class AbstractRepository
{
    protected $modelClass = Model::class;
    protected function newModel()
    {
        return new $this->modelClass;
    }
    public function count() {
        return $this->modelClass::count();
    }
    protected function tableExists()
    {
        return Schema::hasTable($this->newModel()->getTable());
    }

    public function first()
    {
        if ($this->tableExists()) {
            return $this->newModel()->first();
        }

        return null; // və ya uyğun bir default dəyər
    }

    public function all($orderByColumn = null, $orderDirection = 'asc')
    {
        if (!$this->tableExists()) {
            return collect(); // Boş bir kolleksiya qaytarın
        }

        $model = $this->newModel();
        $query = $model->newQuery();

        if ($orderByColumn && Schema::hasColumn($model->getTable(), $orderByColumn)) {
            $query->orderBy($orderByColumn, $orderDirection);
        }

        return $query->get();
    }

    public function all_active($orderByColumn = null, $orderDirection = 'asc')
    {
        $model = $this->newModel();
        $query = $model->newQuery();

        if ($orderByColumn && \Schema::hasColumn($model->getTable(), $orderByColumn)) {
            $query->where('status', true)->orderBy($orderByColumn, $orderDirection);
        }

        return $query->where('status', true)->get();
    }
    public function all_active_with($relations=[],$orderByColumn = null, $orderDirection = 'asc')
    {
        $model = $this->newModel();
        $query = $model->newQuery();

        if ($orderByColumn && \Schema::hasColumn($model->getTable(), $orderByColumn)) {
            $query->where('status', true)->orderBy($orderByColumn, $orderDirection);
        }

        return $query->where('status', true)->with($relations)->get();
    }

    public function paginate_active($limit, $orderByColumn = null, $orderDirection = 'asc')
    {
        $model = $this->newModel();
        $query = $model->newQuery();

        if ($orderByColumn && \Schema::hasColumn($model->getTable(), $orderByColumn)) {
            $query->where('status', true)->orderBy($orderByColumn, $orderDirection);
        }

        return $query->where('status', true)->paginate($limit);
    }


    public function find($id)
    {
        return $this->modelClass::find($id);
    }
    public function getBySlug($slug, $relation=[])
    {
        return $this->modelClass::where('slug', "like", "%$slug%")->with($relation)->first();
    }

    public function search($q, $relation=[])
    {
        return $this->modelClass::where('title', "like", "%$q%")->orWhere('colored_subtitle', "like", "%$q%")->orWhere('text', "like", "%$q%")->with($relation)->get();
    }


    public function search_paginate($q, $relation=[], $limit)
    {
        return $this->modelClass::where('title', "like", "%$q%")->orWhere('colored_subtitle', "like", "%$q%")->orWhere('text', "like", "%$q%")->with($relation)->paginate($limit);
    }
}
