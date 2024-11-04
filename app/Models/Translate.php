<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Translate extends Model
{
    use HasFactory, HasTranslations, ImageTrait;
    protected $guarded = [];
    public $translatable = ['value'];
}
