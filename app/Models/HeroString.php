<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

class HeroString extends Model
{
    use HasFactory, HasTranslations, SortableTrait, ImageTrait;
    public $translatable = ['text'];
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
    protected $guarded = [];
}
