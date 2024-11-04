<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

class BlogCategory extends Model
{
    use HasFactory, HasTranslations, SortableTrait;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
    public $translatable = [
        'title',
        'seo_title',
        'seo_keywords',
        'seo_description',
        'seo_links',
        'seo_scripts',
    ];

    protected $guarded = [];


    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }
}
