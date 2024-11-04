<?php



namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations; //

class AiGallery extends Model
{
    use HasFactory, HasTranslations, ImageTrait;

    protected $table = 'ai_gallery';

    public $translatable = ['title'];

    protected $fillable = ['image', 'title'];
}
