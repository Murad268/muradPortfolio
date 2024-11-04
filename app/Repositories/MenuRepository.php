<?php

namespace App\Repositories;

use App\Models\Menu;

class MenuRepository extends Abstractrepository
{
    protected $modelClass = Menu::class;

    public function menuByUrl($url)
    {
        return $this->modelClass::where("link",'like', '%/'.$url."%")->first();
    }
    public function menuByCode($code)
    {
        return $this->modelClass::where("code", $code)

            ->first();
    }

}
