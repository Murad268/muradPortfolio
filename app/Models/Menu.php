<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Menu extends Model
{
    use HasFactory, HasTranslations, SortableTrait, ImageTrait;
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
    public $translatable = ['name', 'link', 'seo_title', 'meta_keywords', 'meta_description'];
    protected $guarded = [];
}
