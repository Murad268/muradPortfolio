<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;

class Work extends Model
{
    use HasFactory, SortableTrait, ImageTrait;

    protected $guarded = [];
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
}
