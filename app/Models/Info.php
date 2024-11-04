<?php
namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Info extends Model
{
    use HasFactory, HasTranslations, ImageTrait;

    public $translatable = [
        'hero_title',
        'hero_description',
        'copyright_text',
        'about_text',
        'hamburger_menu_about_text',
        'address',
        'about_section_title',
        'subtext_portfolio',
        'subtext_blogs',
        'get_in_touch_title',
        'get_in_touch_description',
        'education_subtext',
        "services_subtext"
    ];

    protected $guearded = [];
}
