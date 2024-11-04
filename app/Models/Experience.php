<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

class Experience extends Model
{
    use HasFactory, HasTranslations, SortableTrait;
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
    protected $guarded = [];
    public $translatable = [
        'text',

    ];
}
