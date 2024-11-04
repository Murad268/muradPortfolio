<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory, HasTranslations, ImageTrait;
    protected $casts = [
        'date' => 'datetime',

    ];

    public $translatable = [
        'title',
        'seo_title',
        'slug',
        'seo_keywords',
        'seo_description',
        'text',
        'tags',
    ];

    protected $fillable = [];

    protected static function booted()
    {
        static::saving(function ($project) {

            $locales = Lang::pluck('code') ?? ['az', 'ru'];
            if (empty($project->date)) {
                $project->date = now();
            }
            foreach ($locales as $locale) {
                $name = $project->getTranslation('title', $locale);
                $slug = Str::slug($name);

                $project->setTranslation('slug', $locale, $slug);
            }
        });
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function category()
    {
        return $this->hasOne(BlogCategory::class, 'id', 'category_id' );
    }
}
