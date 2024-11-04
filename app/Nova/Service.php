<?php

namespace App\Nova;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Service extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Service::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Image::make('Image')->nullable(),

            NovaTabTranslatable::make([
                Text::make('Title', 'title')->nullable(),
                Textarea::make('Description', 'description')->nullable(),
            ]),

            Boolean::make('Status')->trueValue(true)->falseValue(false)->sortable(), // Status sahəsi

            Text::make('Created At')->onlyOnDetail(),
            Text::make('Updated At')->onlyOnDetail(),
        ];
    }
}
