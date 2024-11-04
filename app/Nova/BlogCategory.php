<?php
namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class BlogCategory extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\BlogCategory::class;

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

            NovaTabTranslatable::make([
                Text::make('Title', 'title')->sortable()->nullable(),
                Text::make('SEO Title', 'seo_title')->nullable(),
                Textarea::make('SEO Keywords', 'seo_keywords')->nullable(),
                Textarea::make('SEO Description', 'seo_description')->nullable(),

            ]),
            Textarea::make('SEO Links', 'seo_links')->nullable(),
            Textarea::make('SEO Scripts', 'seo_scripts')->nullable(),

            Boolean::make('Status')->sortable()->trueValue(true)->falseValue(false)->nullable(),
        ];
    }
}
