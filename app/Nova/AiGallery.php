<?php

namespace App\Nova;

use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;
use Mostafaznv\NovaCkEditor\CkEditor;
use Kongulov\NovaTabTranslatable\NovaTabTranslatablee;

class AiGallery extends Resource
{
    public static $model = 'App\Models\AiGallery';

    public function fields(NovaRequest $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Image::make('Image')->disk('public'),

            NovaTabTranslatable::make([
                Text::make('Title', 'title')->sortable()->nullable(),
            ]),
        ];
    }
}
